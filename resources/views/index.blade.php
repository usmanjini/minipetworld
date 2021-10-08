@extends('layouts.master')

@section('title', 'Home')
@section('description', ' mini pet shop for selling pets and food with pet grossery.')
@section('keywords', ' pet food and pets online grossery store.')
 
@section('SpecificStyles')
@stop

@section('content')


      <div class="slider-area">
         <div class="slider-active owl-dot-style owl-carousel">

             @php $banners = \App\banner::all() @endphp
             @foreach($banners as $key => $banner)
            <div class="single-slider pt-100 pb-100 yellow-bg">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                        <div class="slider-content slider-animated-1 pt-114">
                           <h3 class="animated">{{$banner->caption}}</h3>
                           <h1 class="animated">Food & Vitamins <br>For all Pets</h1> 
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                        <div class="slider-single-img slider-animated-1"><img class="animated" src="{{ asset('images/banners/' . $banner->image)}}" alt=""></div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
      </div>



      <div class="food-category food-category-col pt-100 pb-60">
         <div class="container">
            <div class="row">

            @php $category = \App\Category::all() @endphp
            @foreach($category as $key => $cat)

             

               <div class="col-lg-4 col-md-4">
                  <div class="single-food-category cate-padding-1 text-center mb-30">
                     <a href="{{ route('categorypage' ,$cat->id) }}">
                     <div class="single-food-hover-2">

                       <img src="{{ asset('images/cats/' . $cat->image)}}" alt="">
                     </div></a>
                  
                     <div class="single-food-content">  
                         <h3>{{$cat->name}}</h3>   
                     </div>
                         
                  </div>
               </div>
              
            @endforeach

            </div>
         </div>
      </div>


      <div class="product-area pt-95 pb-70 gray-bg">
         <div class="container">

            <div class="section-title text-center mb-55">
               <h4>Most Populer</h4>
               <h2>Recent Products</h2>
            </div>
            <div class="row">

                @php $products = \App\Product::where('feature',1)->get() @endphp
                  @foreach($products as $key => $product)

               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                  <div class="product-wrapper mb-10">
                     <div class="product-img">
                        <a href="{{route('productbyid',$product->id)}}"><img src="{{ asset('images/products/' . $product->image) }}" alt=""></a>
                        <div class="product-action">
                           <a title="Add To Cart" href="#"><i class="ti-shopping-cart"></i></a></div>
                        <div class="product-action-wishlist"><a title="Wishlist" href="#"><i class="ti-heart"></i></a></div>
                     </div>
                     <div class="product-content">
                        <h4><a href="{{route('productbyid',$product->id)}}">{{$product->name}}</a></h4>
                        <div class="product-price"><span class="new">Rs {{$product->price}}</span> </div>
                     </div>
                  </div>
               </div>
               
               @endforeach
                
                
               
               
               
            </div>
         </div>
      </div>
      <div class="deal-area bg-img pt-95 pb-100">
         <div class="container">
            <div class="section-title text-center mb-50">
               <h4>Best Product</h4>
               <h2>Deal of the Week</h2>
            </div>
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="deal-img wow fadeInLeft"><a href="#"><img src="assets/img/banner/banner-2.png" alt=""></a></div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="deal-content">
                     <h3><a href="#">Name Your Product</a></h3>
                     <div class="deal-pro-price"><span class="deal-old-price">$16.00</span><span>$10.00</span></div>
                     <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                     <div class="timer timer-style">
                        <div data-countdown="2017/10/01"></div>
                     </div>
                     <div class="discount-btn mt-35"><a class="btn-style" href="#">SHOP NOW</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      
      <div class="testimonial-area pt-90 pb-70 bg-img" style="background-image:url(assets/img/banner/banner-1.jpg);">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 ml-auto mr-auto">
                  <div class="testimonial-wrap">
                     <div class="testimonial-text-slider text-center">
                        <div class="sin-testiText">
                           <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="sin-testiText">
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  ....</p>
                        </div>
                        <div class="sin-testiText">
                           <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="sin-testiText">
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  ....</p>
                        </div>
                     </div>
                     <div class="testimonial-image-slider text-center">
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/3.jpg" alt="">
                           <h3>Robiul Islam</h3>
                           <h5>Customer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/4.jpg" alt="">
                           <h3>Robiul Islam</h3>
                           <h5>Customer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/3.jpg" alt="">
                           <h3>F. H. Shuvo</h3>
                           <h5>Developer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/5.jpg" alt="">
                           <h3>T. T. Rayed</h3>
                           <h5>CEO</h5>
                        </div>
                     </div>
                     <div class="testimonial-shap"><img src="assets/img/icon-img/testi-shap.png" alt=""></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="service-area bg-img pt-100 pb-65">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="service-content text-center mb-30 service-color-1">
                     <img src="assets/img/icon-img/shipping.png" alt="">
                     <h4>FREE SHIPPING</h4>
                     <p>Free shipping on all order</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="service-content text-center mb-30 service-color-2">
                     <img src="assets/img/icon-img/support.png" alt="">
                     <h4>ONLINE SUPPORT</h4>
                     <p>Online support 24 hours a day</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="service-content text-center mb-30 service-color-3">
                     <img src="assets/img/icon-img/money.png" alt="">
                     <h4>MONEY RETURN</h4>
                     <p>Back guarantee under 5 days</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

       <div class="product-area pt-95 pb-70 gray-bg">
         <div class="container">

            <div class="section-title text-center mb-55">
               <h4>Most Latest</h4>
               <h2>New Products</h2>
            </div>
            <div class="row">

                @php $products = \App\Product::where('new_product',1)->get() @endphp
                  @foreach($products as $key => $product)

               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                  <div class="product-wrapper mb-10">
                     <div class="product-img">
                        <a href="{{route('productbyid',$product->id)}}"><img src="{{ asset('images/products/' . $product->image) }}" alt=""></a>
                        <div class="product-action">
                           <a title="Add To Cart" href="#"><i class="ti-shopping-cart"></i></a></div>
                        <div class="product-action-wishlist"><a title="Wishlist" href="#"><i class="ti-heart"></i></a></div>
                     </div>
                     <div class="product-content">
                        <h4><a href="{{route('productbyid',$product->id)}}">{{$product->name}}</a></h4>
                        <div class="product-price"><span class="new">Rs {{$product->price}}</span> </div>
                     </div>
                  </div>
               </div>
               
               @endforeach
                
                
               
               
               
            </div>
         </div>
      </div>


      <div class="blog-area pb-70">
         <div class="container">
            <div class="section-title text-center mb-60">
               <h4>Latest News</h4>
               <h2>From Our Blog</h2>
            </div>
            <div class="row">

                @php $blogs = \App\blog::all(); @endphp
              @if(count($blogs) > 0)

                @foreach ($blogs->reverse() as $blog)

               <div class="col-lg-4 col-md-6">
                  <div class="blog-wrapper mb-30 gray-bg">
                     <div class="blog-img hover-effect"><a href="{{ route('blog_post', $blog->slug) }}"><img alt="" src="{{ asset('images/blogs/' . $blog->image)}}"></a></div>
                     <div class="blog-content">
                        <div class="blog-meta">
                           <ul>
                               <li>By: <span>{{ $blog->title }}</span></li>
                              <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y ') }}</li>
                           </ul>
                        </div>
                        <h4><a href="{{ route('blog_post', $blog->slug) }}">{{ $blog->title }}</a></h4>
                     </div>
                  </div>
               </div>

                @endforeach

             @endif
 


            </div>
         </div>
      </div>
@endsection



@section('scripts')

@stop

