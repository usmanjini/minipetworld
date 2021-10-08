<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Page;
use App\Event;
use App\blog;
use App\Center;
use App\user;
use App\Product;
use App\subcategory;
use App\catlougue;
use App\Post;
use App\order;
use App\Postimage; 
use App\Petcategory;
use App\petsubcategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Cart;
use PDF;
use Carbon;
use Mail;
 
use App\media;
use App\Mail\inquiryEmail;
use App\Mail\CareerMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // $check = Auth::user()->name;
      // dd($check);
        return view('index'); 
    }
    
    public function password_hash($pass){
        return Hash::make($pass);
    }

    public function contact(){
        return view('contact');
    } 

     public function searchs(){
        return view('search');
    } 

     public function post_search(Request $request){ 


          $name = $request->name;
          $color = $request->color;
          $age = $request->age;
          $petfor = $request->petfor;
          $category = $request->category;

        //  if (!is_null($var)) { 
        //   $var = $request->name;
        //   dd($var);die();
        // }

           // Search for a Posts based on their name.
        if (!is_null($name)) { 
             $posts = Post::where('name',$name)->orderBy('sequence','asc')->paginate(12); 
              return view('posts',compact('posts','posts'));              
        }

            // Search for a Posts based on their color.
        if (!is_null($color)) { 
             $posts = Post::where('color',$color)->orderBy('sequence','asc')->paginate(12); 
              return view('posts',compact('posts','posts')); 
        }

            // Search for a Posts based on their age.
        if (!is_null($age)) { 
             $posts = Post::where('age',$age)->orderBy('sequence','asc')->paginate(12); 
              return view('posts',compact('posts','posts')); 
        }

            // Search for a Posts based on their petfor.
        if (!is_null($petfor)) {  
             $posts = Post::where('petfor',$petfor)->orderBy('sequence','asc')->paginate(12); 
              return view('posts',compact('posts','posts')); 
        } 

            // Search for a Posts based on their category.
        if (!is_null($category)) {   
            $posts = Post::where('petcategory_id',$category)->orderBy('sequence','asc')->paginate(12);
              return view('posts',compact('posts','posts'));
        }
 
    }


      public function product_search(Request $request){ 


          $name = $request->name;
          $min_price = $request->min_price;
          $max_price = $request->max_price;  
          $category = $request->category;

        //  if (!is_null($var)) { 
        //   $var = $request->name;
        //   dd($var);die();
        // }

           // Search for a Posts based on their name.
        if (!is_null($name)) { 
             $products = product::where('name',$name)->orderBy('sequence','asc')->paginate(12);  
              return view('product',compact('products','products'));              
        }

            // Search for a Posts based on their color.
        if (!is_null($min_price) && !is_null($max_price)) { 
               $products = product::where('price','>=',$min_price)->where('price','<=',$max_price)->orderBy('sequence','asc')->paginate(12);  
              return view('product',compact('products','products'));  
        }

            // Search for a Posts based on their age.
        if (!is_null($category)) { 
              $products = product::where('category_id',$category)->orderBy('sequence','asc')->paginate(12);  
              return view('product',compact('products','products'));  
        }
 
    }


      public function post_by_subcategory($id){ 

      $posts = Post::where('sub_petcategory_id',$id)->where('status', 'Complete')->orderBy('sequence','asc')->paginate(12);
        $catname = petsubcategory::select('name')->where('id',$id)->first();
        return view('posts',compact('posts','posts')); 
    }

    public function postbyid($id){
        $post = Post::find($id);
        return view('post',compact('post')); 
    } 

     public function clinic(){
        return view('clinic');
    } 

     public function alluser(){
        return view('admin.alluser');
    } 

     public function alladmin(){
        return view('admin.alladmin');
    } 

    // public function pages($id){ 
    //     $page=Page::find($id);
    //     $data=About::where('id',$id)->get()->sortBy('sequence');
    //     return view('pages',compact("page",$data)); 
    // }
 
    public function about(){
        return view('about');
    }
 
    public function SendMail(Request $request){
        $Name = $request->name;
        $Email = $request->email;
        $Subject = $request->subject;
        $Message = $request->message;
    
        Mail::raw($Message, function($message) use ($request)
         {
             $message->from($request->email, $request->name);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject($request->subject);
          
         });
         return redirect()->route('contact')->with('message', 'Message Sent Sucessfully');
    }

    public function SendcareerMail(Request $request){ 
              $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request ->email,
            'title' => $request ->title,
            'company' => $request ->company,
            'address' => $request ->address,
            'city' => $request ->city,
            'zip' => $request ->zip, 
            'upload' => $request ->upload, 
            'bodyMessage' => $request->message 
        );  
         Mail::send('Careermail',$data, function($message) use ($data)
         {  
             $message->from($data['email'], $data['name']);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject( $data['title']); 
         });
         return redirect()->route('career')->with('message', 'Request Sent Sucessfully');
    }

    public function SendFeedbackMail(Request $request){ 
              $data1 = array(
            'cst_service' => $request->cst_service,   
            'sal_rep' => $request->sal_rep,
            'pro_sect' => $request->pro_sect,
            'pricing' => $request->pricing,
            'pro_performance' => $request->pro_performance,
            'compared' => $request->compared,
            'name' => $request->name,
            'email' => $request ->email,
            'title' => $request ->title,
            'company' => $request ->company,
            'address' => $request ->address,
            'city' => $request ->city,
            'state' => $request ->state,
            'zip' => $request ->zip,
            'phone' => $request->phone,
            'country' => $request ->country, 
            'fax' => $request->fax,
            'bodyMessage' => $request->message   
        );  

              
         Mail::send('FeedbackMail',$data1, function($message) use ($data1)
         {  
             $message->from($data1['email'], $data1['name']);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject( $data1['title']);  
         });
         return redirect()->route('feedback')->with('message', 'Request Sent Sucessfully');
    }

    /*public function about(){
        return view('about');
    }*/
     public function admin_login(){
        return view('admin.admin_login');
    }

    public function category($id){
        $category = Category::find($id);
        $data = subcategory::where('category_id',$id)->get()->sortBy('sequence');
        // $data = Category::find($id)->subcategory;
        return view('category',compact('data','category')); 
    }
    // public function about($id){
    //      $about=About::all()->sortBy('sequence');
    //     return view('admin.about.allabout',compact("about",$about)); 
    // }
    
    public function productsbycat($id){
        // $products = subcategory::find($id)->products;
      $products = product::where('sub_category_id',$id)->orderBy('sequence','asc')->paginate(12);
        $catname = subcategory::select('name')->where('id',$id)->first();
        return view('product',compact('products','catname')); 
    }

    public function categorypage($id){ 

       // $subcat = subcategory::select('id')->where('category_id',$id)->first();
       $products = product::where('category_id',$id)->orderBy('sequence','asc')->paginate(12);
       $catname = subcategory::select('name')->where('category_id',$id)->first(); 
        return view('categorypage',compact('products','catname'));  
    }

    public function newsevents(){
        $events = Event::all()->sortBy('sequence');
        return view('events',compact('events'));
    }

     public function newscenters(){
        $centers = Center::all()->sortBy('sequence');
        return view('centers',compact('centers'));
    }

    // public function productbyid($id){
    //     $product = Product::find($id);
    //     $sizes = Product::find($id)->sizes;
    //     $images = Product::find($id)->images;
    //     return view('singleproduct',compact('product','sizes','images'));
    // }
    
    public function productbyid($id){
        $product = Product::find($id);
        return view('singleproduct',compact('product')); 
    } 

    public function downloadcatlog(Request $request){
      $catlog = catlougue::select('file','password')->where('id',$request->id)->first();
      if(Hash::check($request->password, $catlog->password))
        {
        $pdfready = 'images/pdf/'.$catlog->file;  
        return response()->download($pdfready);  
        }
    }
    
    public function download()
    {
     $catlog = catlougue::select('file')->where('id',3)->where('password','cardic1234')->first();
     $pdfready = 'images/pdf/'.$catlog->file;  
      return response()->download($pdfready);
  }
  
  public function add_to_cart(Request $request){
    $data = $request->data;
    $arrayLength = count($data);
    try {
      for ($i = 0; $i < $arrayLength; $i++) {
      // return $data[$i][1];
      // $products = array($data[$i][0], $data[$i][1] , $data[$i][3],'0.00','size' => $data[$i][2]);
     Cart::add($data[$i][0],  $data[$i][1] , $data[$i][3] , '0.00', ['size' => $data[$i][2]]); 
    }
     $cart = Cart::content();
      return $cart;

    } 
    catch (\Exception $e) {
      return $e->getMessage();
    }

    
    
    // Cart::add($products);

   
      // $data = Cart::content();
      // return $products;




    // return $request;die;
   // return  array_merge($request->id,$request->name,$request->qty,$request->size,$request->check);die;
      // $id = $request->id;
      // $name = $request->name;
      // $size = $request->size;
      // $qty = $request->qty;
      
      
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
        //     return $cartItem->id === $request->id;
        // });
        // if (!$duplicates->isEmpty()) {
        //     Cart::search(function ($cartItem, $rowId) use ($request) {
        //      Cart::update($rowId,$request->qty);
        // });
           
        // }
        
      // Cart::add($id,  $name , $qty , '0.00', ['size' => $size]);
          //   return $data;
      // return redirect()->route('productbyid',$id)->with('message', 'Cart Item Added');
     
      
  }
  
  public function get_cart_data(){
      $data = Cart::content();  
      return $data; 
  }
  
  public function search (Request $request){
    $input = $request->search;
    
    $product = Product::where('name','LIKE','%'.$input.'%')->get();
    
        
//     $product = Product::where('name','like','%'.$input.'%')
//   ->orWhereHas('subcategory', function ($query) use ($input) {
//         $query->where('name', 'like', '%'.$input.'%');
//     })
//     ->orderBy('id');
    
    // $product = Product::whereHas('category', function($query) use($input) {
    // $query->where('name', 'like', '%'.$input.'%');
    // })->whereHas('subcategory', function($query) use($input) {
    // $query->where('name', 'like', '%'.$input.'%');
    // })->orWhere('name','LIKE','%'.$input.'%')->get();
    
    if(count($product)){
        return view('search' , compact("input","product"));
    }
    else{
   return view('search');   
  }
}


 public function inquiry(){
     $data = Cart::content();  
     return view('inquiry');
 }
public function cart(){
    return view('cart');
}

  public function checkout(Request $request){
      
           $products = Cart::content();
           $sender_name = $request->sender_name;
           $company_name = $request->company;
           $email = $request->email;
           $address = $request->address;
           $dev_address = $request->dev_address;
           $phone = $request->phone;
           $msg = $request->msg;
            // $data = ['title' => 'Welcome to HDTuto.com'];
            // $pdf = PDF::loadView('myPDF', $data);
            $mytime = Carbon\Carbon::now();
              
            
            $output = ' <img src="http://www.cardic.com.pk/images/logo.png">
            <h3>Sender Details</h3> 
            <p><strong>Date Time</strong>'.$mytime->toDateTimeString().'</p>
            <p><strong>Sender Name : </strong>'.$sender_name.'</p>
            <p><strong>Company Name : </strong>'.$company_name.'</p>
            <p><strong>Email : </strong>'.$email.'</p>
            <p><strong>Address : </strong>'.$address.'</p>
            <p><strong>Delivery Address : </strong>'.$dev_address.'</p>
            <p><strong>Phone : </strong>'.$phone.'</p>
            <p><strong>Instructions/Message : </strong>'.$msg.'</p>
            <hr>
     <h3 >Product Details</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Id</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Size</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Qty</th>
   </tr>
     ';  
     foreach($products as $product)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$product->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->options->size.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->qty.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     //  return $output;
     $pdf = \App::make('dompdf.wrapper');
     $pdf = $pdf->loadHTML($output);
    //  return $pdf->stream();
    
     $data = array(
    'name' => $sender_name,   
    'Company Name'=> $company_name,
    'email' => $email,
    'Phone #' => $phone,
    'pdf' => $pdf);
   
    file_put_contents("checkout.pdf", $pdf->output());
    // $getpdf = PDF::loadv('checkout.pdf',$pdf);
    
    $result = Mail::send('mail', $data, function($message) use ($data){

        // $pdf = PDF::loadFile('http://www.cardic.com.pk/checkout.pdf');

        $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject('Product Invoice');

        $message->from($data['email'],$data['name']);

        // $message->attach($data['pdf']->output());
        // $message->attachData($pdf,'checkout.pdf');

      $message->attach("checkout.pdf");
    });
    // File::delete("checkout.pdf");
    Cart::destroy();
    return redirect()->route('cart')->with('message', 'Inquiry Sent Sucessfully');
          // var_dump($result );  
  }
  
  
  public function removecart($rowid){
      Cart::remove($rowid);
     return redirect()->route('cart')->with('message', 'Cart Item Removed'); 
 
}
public function new_arrival(){
    $new_product= Product::where('new_product', 1)->get();
    return view('new_product',compact('new_product'));
}


    public function blog_posts()
    {
        $blogs = blog::all()->sortBy('sequence');
        return view('blogs',compact("blogs"));
    }
    public function blog_post($slug)
    {
      $blog = blog::where('slug', $slug)->first();
      return view('blog',compact("blog"));
    }

      public function allorders()
    {
        $orders = order::all()->sortBy('sequence');
        return view('admin.order.allorders',compact("orders"));
    }


     public function destroy_admin($id)
    {    

        $users = user::find($id);
        $users->delete();
        return redirect()->route('alladmin');
    }

     
    public function sort_admin(Request $request){
        // return $request;
        $page = $request->data;
        $i = 0;
        foreach ($page as  $id) {
            $page = user::find($id);
            $page->sequence  = $i;
            $page->update();
            $i++;
        }


    } 

     public function destroy_user($id)
    {    

        $users = user::find($id);
        $users->delete();
        return redirect()->route('alluser');
    }

    public function destroy_order($id)
    {    

        $orders = order::find($id);
        $orders->delete();
        return redirect()->route('orders');
    }

     
    public function sort_user(Request $request){
        // return $request;
        $user = $request->data;
        $i = 0;
        foreach ($user as  $id) {
            $user = user::find($id);
            $user->sequence  = $i;
            $user->update();
            $i++;
        }


    } 


}



