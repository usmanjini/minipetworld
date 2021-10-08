@extends('layouts.master')

@section('title', 'checkout')

@section('content')
 
 <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Checkout Page</h2>
               <ul>
                  <li><a href="{route('home')}">home</a></li>
                  <li class="active">Checkout Page</li>
               </ul>
            </div>
         </div>
  </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


      
      <!-- shopping-cart-area start -->
      <div class="checkout-area pt-95 pb-70">
         <div class="container">
            <h3 class="page-title">checkout</h3>
            <div class="row">
               <div class="col-lg-10">
                  <div class="checkout-wrapper"> 
                        
                        <div class="panel panel-default"> 
                           <div id="payment-1" class="panel-collapse collapse show">
                              <div class="panel-body">
                                 <div class="billing-information-wrapper">
                                   
                                    <form  enctype="multipart/form-data" action="{{route('order')}}" method="Post"   >

                              <div class="row">
                                     <div class="col-lg-9">
                                         <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->


                                <label>Your Name *</label>
                                <input type="text" name="name" class="form-control" required>
  
                                <label>Company Name (Optional)</label>
                                <input type="text" name="company_name" class="form-control">

                                <label>Country *</label>
                                <input type="text" name="country" class="form-control" required>

                                <label>Your address *</label>
                                <input type="text" name="address" class="form-control" placeholder="House number and Street name" required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" name="city" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State *</label>
                                        <input type="text" name="state" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" name="postcode" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" name="phone" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" name="email" class="form-control" required>


                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different
                                        address?</label>
                                </div>  --}}

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" name="message" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">

                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                            $subtotalprice = 0;
                                            $totalprice = 0;
                                            $total_items=0;
                                                
                                            $user_id = Auth::user()->id;
                                            $cart = \App\cart::where('user_id', $user_id)->get(); @endphp
                                            @foreach ($cart as $key => $cart)

                                                @php $cartitem = \App\product::where('id', $cart->product_id)->get() @endphp
                                                @foreach ($cartitem as $key => $cartitem) 

                                                    <tr>
                                                        <td><a  >{{$cartitem->name}}</a></td>
                                                        <td style="text-align: center;">{{$cart->qnty}}</td>
                                                        <td>Rs {{$cart->qnty * $cartitem->price}}</td>
                                                    </tr>
                                                    @php $subtotalprice += ($cart->qnty * $cartitem->price);
                                                         $total_items += $cart->qnty;
                                                         @endphp
                                                    @endforeach
                                                @endforeach

                                                    <tr class="summary-subtotal">
                                                        <td>Subtotal:</td>
                                                        <td style="text-align:center;">{{$total_items}}</td>
                                                        <td>Rs {{$subtotalprice}}</td>
                                                    </tr><!-- End .summary-subtotal -->
 
                                                    <tr>
                                                        <td>Shipping:</td>
                                                        <td>Free shipping</td>
                                                    </tr>

                                                    <tr class="summary-total">
                                                        <td>Total:</td>
                                                        <td>Rs {{$totalprice += $subtotalprice}}</td>
                                                    </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary --> 

                                    </div><!-- End .accordion -->

                                     <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                        Cash on delivery
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                          
                                        </div><!-- End .card -->
 
                                    <input type="hidden" name="total_items" id ="total_items" value="{{$totalprice}}">

                                    <input type="hidden" name="user_id" id ="user_id" value="{{$user_id}}">

                                    {{ csrf_field() }}

                                  
                                     
                            
                                    <div class="billing-back-btn"> 
                                       <div class="billing-btn">
                                        <button type="submit">Place Order</button>
                                    </div>
                                    </div>

                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->

                        </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                  
                  </div>
                      
                           
                          
          </div>
       </div>
    </div>
            
 

@endsection


 