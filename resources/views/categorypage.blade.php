@extends('layouts.master')

@section('title', 'category')

@section('content')

 <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Shop Page</h2>
               <ul>
                  <li><a href="{{route('home')}}">home</a></li>
                  <li class="active">Shop Page</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="shop-area pt-100 pb-100 gray-bg">
         <div class="container">
            <div class="row flex-row-reverse">
               <div class="col-lg-9">
                  
                  <div class="grid-list-product-wrapper">
                     <div class="product-view product-grid">
                        <div class="row">
            
                     @foreach($products as $product)

                           <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">

                              <div class="product-wrapper mb-10">
                
                                 <div class="product-img">
                                    <a href="{{route('productbyid',$product->id)}}"><img src="{{ asset('images/products/' . $product->image)}}" alt=""></a>
                                    <div class="product-action"> 
                                        <form action="{{route('add_to_cart')}}" method="Post"> 
                                              <input type="hidden" name="product_id" id ="id" value="{{$product->id}}">
                                              <input type="hidden" name="Product_name" id="name" value="{{$product->name}}">  
                                              <input type="hidden" name="product_quantity" id="name" value="1"> 
                                              <input type="hidden" name="_token" id="token" value="{{ Session::token() }}"> 
                               
                                              <a title="Add To Cart" > <button type="submit" style="border-radius: 5px; background-color: white;"  class="btn-product btn-cart"><i class="ti-shopping-cart"></i></button></a>  
                                        </form>  

                                      
                                    </div>
                                    
                                 </div>
                 
                                 <div class="product-content">
                                    <h4><a href="{{route('productbyid',$product->id)}}">{{$product->name}}</a></h4>
                                    <div class="product-price"><span class="new">Rs {{$product->price}}</span> </div>
                                 </div> 
                              </div>
                           </div> 

                         @endforeach
               
                             <!--  <div class="product-wrapper mb-10">
                                 <div class="product-img">
                                    <a href="product-details.html"><img src="assets/img/product/product-4.jpg" alt=""></a>
                                    <div class="product-action"><a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a><a title="Add To Cart" href="#"><i class="ti-shopping-cart"></i></a></div>
                                    <div class="product-action-wishlist"><a title="Wishlist" href="#"><i class="ti-heart"></i></a></div>
                                 </div>
                                 <div class="product-content">
                                    <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                                    <div class="product-price"><span class="new">$20.00</span><span class="old">$50.00</span></div>
                                 </div> 
                              </div> -->

                           </div>
                        </div> 
                     </div>
                  </div>
                
               <div class="col-lg-3">
                  <div class="shop-sidebar"> 
                     @php $category = \App\Category::all(); @endphp 
                     @foreach($category as $cat)

                     <div class="shop-widget mt-50"> 

                        <h4 class="shop-sidebar-title">{{$cat->name}}</h4>

                        <div class="shop-list-style mt-20">
                           <ul>
                     @php $subcategory=\App\subcategory::where('category_id',$cat->id)->get(); @endphp
                     @foreach($subcategory as $subcat)
                              <li><a href="{{ route('productsbycat' ,$subcat->id) }}">{{$subcat->name}}</a></li>
                    @endforeach
                           </ul>
                        </div>
                     </div>

                     @endforeach
                      
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
    
     

@endsection