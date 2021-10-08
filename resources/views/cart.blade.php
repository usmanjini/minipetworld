@extends('layouts.master')

@section('title', 'cart')

@section('content')
<div class="container">
<!-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif -->
 <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Cart Page</h2>
               <ul>
                  <li><a href="{route('home')}">home</a></li>
                  <li class="active">Cart Page</li>
               </ul>
            </div>
         </div>
      </div>

         @if(session()->has('message'))
            <div class="alert alert-success">
               {{ session()->get('message') }}
            </div>
         @endif

         @php 
           use Illuminate\Support\Facades\Auth;
           use App\Http\Controllers\CartController; 
         @endphp

      <!-- shopping-cart-area start -->
      <div class="cart-main-area pt-95 pb-100">
         <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            
                     <div class="table-content table-responsive">
                        <table>
                           <thead>
                              <tr>
                                 <th>Image</th>
                                 <th>Product Name</th>
                                 <th>Until Price</th>
                                 <th>Qty</th>
                                 <th>Subtotal</th>
                                 <th>Update</th>
                                 <th>Delete</th>
                              </tr>
                           </thead>
                           <tbody>

                              @php 
                              $totalprice=0;

                              $user_id = Auth::user()->id;
                              $cart = \App\cart::where('user_id',$user_id)->get() @endphp
                              @foreach($cart as $key => $cart)  

                              @php $cartitem = \App\product::where('id', $cart->product_id)->get() @endphp
                              @foreach($cartitem as $key => $cartitem)

                              <tr>

                                  

                                 <td class="product-thumbnail">
                                    <a href="#"><img src="{{asset('images/products/'.$cartitem->image)}}" alt="{{$cartitem->name}}"></a>
                                 </td>

                                 <td class="product-name"><a href="#">{{$cartitem->name}}</a></td>

                                 <td class="product-price-cart"><span class="amount">Rs {{$cartitem->price}}</span></td>

                                 <form action="{{ route('update_cart' , $cart->id) }}" method="Post">

                                 <input type="hidden" name="Product_id" id ="id" value="{{$cartitem->id}}">
                                 
                                 <input type="hidden" name="Product_name" id="name" value="{{$cartitem->name}}">  
                              
                                 <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                                  
                                 <td class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input type="number" id="quantity" name="quantity" class="cart-plus-minus-box" value="{{$cart->qnty}}"  min="1" max="10" step="1" data-decimals="0" > 
                                    </div>
                                 </td>

                                 <td class="product-subtotal">Rs {{  $cartitem->price}} = Rs {{ $cart->qnty * $cartitem->price}}</td>
 
                                 <td class="remove-col"> 
                                 <button type="submit"  class="btn btn-outline-dark-2">
                                 <span>UPDATE CART</span><i class="icon-refresh"></i></button>  
                                 </td>  

                                  <td class="product-remove">
                                    <a href="{{route('removecart',$cart->id)}}"><i class="ti-trash"></i></a></td>
                                  
                              </form> 


                              </tr>
                              
                              @php $totalprice += ($cart->qnty * $cartitem->price);  @endphp
                              @endforeach
                              @endforeach
                               
                           </tbody>
                        </table>
                     </div>
                     
                 
                  <div class="row">
                      

                     <div class="col-lg-6 col-md-12">
                        <div class="grand-totall"> 
                           <h5>Grand Total:  Rs {{$totalprice}} </h5>
                           <a href="{{route('checkout')}}">Proceed To Checkout</a>
                           <p>Checkout with Multiple Addresses</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>


@endsection
