<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart as AppCart;  
use App\Http\Controllers\DateTime\DateTime;
use PDF;  
use Carbon;
use session;
use Stripe\Stripe;
use Stripe\Charge;
use App\order;
use App\cart;
use App\order_item;
use Hamcrest\Collection\IsEmptyTraversable;
use Mail;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Isset_;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

      // $userdata = Auth::user();
      // $request->session()->put('user',$userdata);

 
 
      public function add_to_cart(Request $request){
 
        // $value=$request->input('name');
        // dd($value);

        // $value=Auth::user()->name;
        // $id=Auth::user()->id;
        // dd($id);
         
         if(Auth::user()){
            
            $cart = new Cart;
            $cart->user_id=auth::user()->id;
            $cart->product_id=$request->product_id; 
            $cart->qnty= $request->product_quantity;  
            $cart->save();
            return redirect()->back(); 
         }
         else{
            return redirect('/login');
         } 
      }

      public function update_cart(Request $request, $id){ 

        // $value=$request->input('quantity');
        //     dd($value);die();
         
         
         if(Auth::user()){

            
            $cart = Cart::find($id);
            $cart->user_id=auth::user()->id;
            $cart->product_id=$request->Product_id; 
            $cart->qnty= $request->quantity;  
            $cart->update();
            return redirect('cart');
         }
         else{
            return redirect('/login');
         }
      }

      public function removecart($id) { 
        Cart::destroy($id);
        return redirect()->back()->with('message', 'Cart Item Removed'); 
    }

      static public function cartitem(){  
        $user_id=auth::user()->id;   
        return Cart::where('user_id',$user_id)->count(); 
     }  

     public function cartview() {
        return view('cart');
    }

    public function orderview() {
        return view('orderview');
    }

    public function checkoutview() {
        return view('checkout');
    }

    // public function order(Request $request){
        
    //     $Order = new Order; 
        
    //     $digits = 4;
    //     $Order->order_no= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    //     $Order->name = $request->name;
    //     $Order->company = $request->company_name;
    //     $Order->email = $request->email;
    //     $Order->country = $request->country;
    //     $Order->city = $request->city;
    //     $Order->state = $request->state;
    //     $Order->postal_code = $request->postcode;
    //     $Order->address = $request->address;
    //     $Order->phone = $request->phone;

    //     if ($request->message) {
    //         $Order->message = $request->message;
    //     } else {
    //         $Order->message = "N/A";
    //     }
 
    //     $date= Carbon\Carbon::now(); 
    //     $Order->order_on = $date->toDateTimeString();
    //     $Order->payment_method =  "stripe";
    //     $Order->total_items = $request->total_items;
        
    //     $Order->shipped_on = $date->toDateTimeString();
    //     $Order->customer_id = $request->user_id;

    //     $Order->save();
        
    //     return redirect()->route('orderview');
    // }
        
    public function order(Request $request){

        // $value=$request->input('stripeToken');
        // dd($value);
 
        

              
        $Order = new Order; 
        
        $digits = 4;
        $Order->order_no= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $Order->name = $request->name;
        $Order->company = $request->company_name;
        $Order->email = $request->email;
        $Order->country = $request->country;
        $Order->city = $request->city;
        $Order->state = $request->state;
        $Order->postal_code = $request->postcode;
        $Order->address = $request->address;
        $Order->phone = $request->phone;

        if ($request->message) {
            $Order->message = $request->message;
        } else {
            $Order->message = "N/A";
        }
 
        $date= Carbon\Carbon::now(); 
        $Order->order_on = $date->toDateTimeString();
        $Order->payment_method =  "on cash";
        $Order->total_items = $request->total_items;
        
        $Order->shipped_on = $date->toDateTimeString();
        $Order->customer_id = $request->user_id;

        $Order->save();

         
        Cart::where('user_id', $request->user_id)->delete(); 
        return redirect()->route('orderview');

        
        
    }

    //  public function update_cart(Request $request){ 
    //   $row = Cart::get($request->rowId);
    //   Cart::update($request->rowId, $request->qty);
    //   return  $row;
    //  }
  
      public function get_cart_data(){
          $data = Cart::content();  
          $total = ["total" => Cart::subtotal()]; 
          $ret['data'] = $data;
          $ret['total'] = $total; 
          return $data;
      }

      public function inquiry(){
          $data = Cart::content();  
          return view('inquiry');
      } 
     
    //   public function removecart($rowid){
    //       Cart::remove($rowid);
    //       return redirect()->route('cart')->with('message', 'Cart Item Removed'); 
    //   }
      public function checkout(Request $request){
          
          $products = Cart::content();
          $sender_name = $request->name;
          $email = $request->email;
          $address = $request->address;
          $phone = $request->phone;
          $city = $request->city;
          $province = $request->province;
          $postal_code = $request->postal_code;
          
          if($request->message){
              $msg = $request->message;
          }else{
              $msg = "N/A";
          }
          
          $mytime = Carbon\Carbon::now();
  
          $digits = 4;
          $order_no= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
         
          $subtot =str_replace( ',', '',$request->total_amount) + str_replace( ',', '',  $request->shipping_charges);
          // dd(str_replace( ',', '',$request->total_amount) + str_replace( ',', '',  $request->shipping_charges) );die;
  
          $output = '<h3 style="text-align:center;text-decoration: underline;  text-transform: uppercase;">Sale Invoice</h3> 
          <table style=" width: 100%;border-collapse: collapse;"><tr><td style="text-align:center"><img src="https://www.sway.store/assets/theme/images/basic/logo.png">
          <p style="color:red;text-align:center">Sweet Up A Storm!</p><h1 style="color:red;text-align:center">THANK YOU<br> FOR YOUR PURCHASE</h1></td><td>
          <div style="font-size:16px;font-weight:bold"><p>Pakistan’s First Fitness & CrossFit Store <br>Contact #  03093337929</p>  <p>Email: shop@sway.store</p>
          <p>URL: www.sway.store </p><p>Bankers: JS bank limited</p><p>Address: Opposite of Askari Islamic bank ,<br> Paris Road 51310 Sialkot - Pakistan</p></div></td</tr></table> 
          <table width="100%" style="border-collapse: collapse; border: 0px;">
          <tr>
            <td style="border: 1px solid; padding:12px;">Invoice No. '.$order_no.'</td>
            <td style="border: 1px solid; padding:12px;">SW- </td>
            <td style="border: 1px solid; padding:12px;">Date: '.$mytime->toDateTimeString().'</td>
            <td style="border: 1px solid; padding:12px;">Order No '.$order_no.'</td>
          </tr>
          <tr>
          <td style="border: 1px solid; padding:12px;">Ship To: '.$sender_name.'</td>
          <td style="border: 1px solid; padding:12px;">CONTACT No:'.$phone.'</td>
          <td style="border: 1px solid; padding:12px;">Address : <p><strong>Country : </strong> Pakistan<strong><br>City : </strong>'.$city.'<strong><br>Province : </strong>'.$province.'<br><strong>Address : </strong>'.$address.'</p>
          </td>
          <td style="border: 1px solid; padding:12px;">Email: '.$email.'</td>>
          </tr>
          <tr><td style="border: 1px solid; padding:12px;">Ship Via: M&P</td><td style="border: 1px solid; padding:12px;">NO OF PARCELS: 1</td> <td style="border: 1px solid; padding:12px;">SW-</td><td style="border: 1px solid; padding:12px;">Gate PASS: </td></tr>
          </table>
          <hr>
  
          <table width="100%" style="border-collapse: collapse; border: 0px;">
          <tr>
          <th style="border: 1px solid; padding:12px;" width="20%">sr#</th>
          <th style="border: 1px solid; padding:12px;" width="15%">Qty</th>
          <th style="border: 1px solid; padding:12px;" width="30%">DESCRIPTION OF GOODS</th>
          <th style="border: 1px solid; padding:12px;" width="15%">Color</th>
          <th style="border: 1px solid; padding:12px;" width="15%">weight</th>
          <th style="border: 1px solid; padding:12px;" width="15%">Unit Price</th>
          <th style="border: 1px solid; padding:12px;" width="15%">Total Price</th>
          </tr>
          ';  
          $key = 1;
          foreach($products as $product)
          {
          
              
              $output .= '
              <tr>
              <td style="border: 1px solid; padding:12px;">'.$key++.'</td>
              <td style="border: 1px solid; padding:12px;">'.$product->qty.'</td>
              <td style="border: 1px solid; padding:12px;">'.$product->name.'</td>
              <td style="border: 1px solid; padding:12px;">'.$product->options->color.'</td>
              <td style="border: 1px solid; padding:12px;">'.$product->options->weight.'</td>
              
              <td style="border: 1px solid; padding:12px;">'.$product->price.'</td>
              <td style="border: 1px solid; padding:12px;">'.(int)$request->price * (int)$request->qty.'</td>
              </tr>
              ';
          }
          $output .= '<tr style="width:100%"><td style="border: 1px solid; padding:12px;"></td>
          <td style="border: 1px solid; padding:12px;"></td>
          <td style="border: 1px solid; padding:12px;"></td>
          <td style="border: 1px solid; padding:12px;"></td>
          <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;">Shipping Charges</td>
                 <td style="border: 1px solid; padding:12px;">'.$request->shipping_charges .'</td></tr>
  
                 <tr style="width:100%"><td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;">Total</td>
                 <td style="border: 1px solid; padding:12px;">'.$request->total_amount .'</td></tr>
  
                 <tr style="width:100%"><td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;"></td>
                 <td style="border: 1px solid; padding:12px;">Sub Total</td>
                 <td style="border: 1px solid; padding:12px;">'.$subtot.'</td></tr>
                </table>';
                       
       //  return $output;
          $pdf = \App::make('dompdf.wrapper');
          $pdf = $pdf->loadHTML($output);
      //  return $pdf->stream();
         
          $data = array(
              'name' => $sender_name,   
              'email' => $email,
              'Phone #' => $phone,
              'pdf' => $pdf);
        
          file_put_contents("checkout.pdf", $pdf->output());
  
          $order = new order;
          $order->order_no = $order_no;
          $order->name = $sender_name;
          $order->email = $email;
          $order->country = "Pakistan";
          $order->city = $city;
          $order->province = $province;
          $order->address = $address;
          $order->postal_code = $postal_code;
          $order->phone = $phone;
          $order->notes = $msg;
          $order->total_amount = $request->total_amount;
          $order->status = "pending";
          $order->order_pdf = "empty" ;
          $order->payment_method 	 = $request->payment_method;
          $order->shipping_charges = $request->shipping_charges;
          $order->total_weight = $request->total_weight;
          $order->sub_total = (int)$request->total_amount;
          $order->total_items = Cart::count();
          
          $order->save();
          $id = $order->id;
          foreach($products as $prod)
          {
              $order_item = new order_item;
              $order_item->product_id = $prod->id;
              $order_item->name = $prod->name;
              $order_item->price = $prod->price;
              $order_item->qty = $prod->qty;
              $order_item->color = $prod->options->color;
              $order_item->image = $prod->options->image;
              $order_item->weight = $prod->options->weight;
  
              
              $order_item->order_id = $order->id;
              $order_item->save();
          }
           
          
  
          $file_name = $order->id.'.pdf';
  
          file_put_contents("inquiry/".$file_name, $pdf->output());
  
          $update_order = order::find($order->id);
          $update_order->order_pdf = $file_name;
          $update_order->update();
  
            $order_items = order_item::where('order_id',$id)->get();
              
              $data = ["order" => $order , "items" => $order_items];
              $result = Mail::send('mail', [ 'order' => $order , "items" => $order_items], function($message)  use ($order){
              $message->to($order->email,$order->name)->cc('shop@sway.store')->subject('Order Confirmation');
              $message->from('shop@sway.store','sway');
              });
  
          Cart::destroy();
          return view('ordersuccess');
      }
}
