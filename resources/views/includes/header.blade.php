<header class="header-area">
         <div class="header-top theme-bg">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="welcome-area">
                        <p>Welcome To our Mini Pet World</p>
                     </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-12">
                     <div class="account-curr-lang-wrap f-right">
                      
                         <div class="welcome-area"> 
                        <p style="color: white;"><i class="ti-mobile"></i>  Mobile: 012 345 678</p>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom transparent-bar">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                     <div class="logo pt-39"><a href="{{route('home')}}"><img alt="" src="{{ asset('assets/img/logo/logo.png')}}"></a></div>
                  </div>
                  <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                     <div class="main-menu text-center">
                        <nav>
                           <ul>
                              <li>
                                 <a href="{{ route('home') }}">HOME</a> 
                              </li>
                              <li class="mega-menu-position">
                                 <a href="#">Shop</a>
                                 <ul class="mega-menu">
                                    
                                     @php
                                     $category = \App\Category::all()
                                     @endphp 
                                     @foreach($category as $cat)

                                    <li> 
                                       <ul>

                                          <li class="mega-menu-title">{{$cat->name}}</li>
                                          @php
                                         $subcategory = \App\subcategory::where('category_id',$cat->id)->get()
                                         @endphp
                                         @foreach($subcategory as $subcat)
                                          <li><a href="{{ route('productsbycat' ,$subcat->id) }}">{{$subcat->name}}</a></li>
                                             @endforeach
                                       </ul>
                                    </li>
                                    @endforeach
                                    
                                    <li>
                                       <ul>
                                          <li><a href="#"><img alt="" src="assets/img/banner/menu-img-4.jpg"></a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>

                              <li class="mega-menu-position">
                                 <a href="#">Posts</a>
                                 <ul class="mega-menu">
                                    
                                     @php
                                     $petcategory = \App\Petcategory::all()
                                     @endphp 
                                     @foreach($petcategory as $cat)

                                    <li> 
                                       <ul>

                                          <li class="mega-menu-title">{{$cat->name}}</li>
                                          @php
                  $petsubcategory = \App\petsubcategory::where('category_id',$cat->id)->get()
                   @endphp
                   @foreach($petsubcategory as $subcat)
                                          <li><a href="{{ route('postsbycat' ,$subcat->id) }}">{{$subcat->name}}</a></li>
                                             @endforeach
                                       </ul>
                                    </li>
                                    @endforeach
                                    
                                    <li>
                                       <ul>
                                          <li><a href="#"><img alt="" src="assets/img/banner/menu-img-4.jpg"></a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                               
                              <li>
                                 <a href="{{ route('blog_posts') }}">Blog</a> 
                              </li>
                              <li>
                                 <a href="{{ route('clinic') }}">Vet Clinic</a> 
                              </li>
                              <li><a href="{{ route('about') }}">ABOUT</a></li>
                              <li><a href="{{ route('contact') }}">contact us</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                     <div class="search-login-cart-wrapper">

                        <div class="header-search same-style">
                           <button > <a href="{{route('searchs')}}"><i class="icon-magnifier s-open"></i></i></a></button> 
                        </div>

                        <div class="header-login same-style"><a href="{{route('login')}}"><i class="icon-user icons"></i></a></div>

                        @php 
                        use Illuminate\Support\Facades\Auth;
                        use App\Http\Controllers\CartController; 
                        @endphp  

                        <div class="header-cart same-style">

                           @php 
                            $total=0;
                             
                            if(auth::user()){  
                            $user_id = Auth::user()->id;
                            $total = \App\cart::where('user_id',$user_id)->count();
                            }   

                            @endphp
 
 

                           <button class="icon-cart"><a href="{{route('cart')}}"><i class="icon-handbag"></i><span class="count-style">{{$total}}</span></a></button>

                            <!-- @if(Auth::user())
                           <div class="shopping-cart-content">
                              <ul>
                      

                                  @php 
                              $totalprice=0;

                              $user_id = Auth::user()->id;
                              $cart = \App\cart::where('user_id',$user_id)->get() @endphp
                              @foreach($cart as $key => $cart)  

                              @php $cartitem = \App\product::where('id', $cart->product_id)->get() @endphp
                              @foreach($cartitem as $key => $cartitem)

                                 <li class="single-shopping-cart">
                                    <div class="shopping-cart-img"><a href="#"><img alt="" src="{{asset('images/products/'.$cartitem->image)}}"></a></div>
                                    <div class="shopping-cart-title">
                                       <h4><a href="#">{{$cartitem->name}} </a></h4>
                                       <h6>Qty: {{$cart->qnty}}</h6>
                                       <span>Rs {{  $cartitem->price}} = Rs {{ $cart->qnty * $cartitem->price}} </span>
                                    </div>
                                    <div class="shopping-cart-delete"><a href="{{route('removecart',$cart->id)}}"><i class="ti-close"></i></a></div>
                                 </li>

                                    @php $totalprice += ($cart->qnty * $cartitem->price) ;  @endphp

                                        @endforeach 
                                        @endforeach 
                                 
                              </ul>
                              <div class="shopping-cart-total"> 
                                 <h4>Total : <span class="shop-total">${{$totalprice}}</span></h4>
                              </div>
                              <div class="shopping-cart-btn"><a href="{{route('cart')}}">view cart</a><a href="checkout.html">checkout</a></div>
                           </div> 
                           @endif -->
                           
                        </div>
                        

                     </div>
                  </div>
                  <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                     <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                           <ul class="menu-overflow">
                              <li>
                                 <a href="{{ route('home') }}">HOME</a> 
                              </li>
                              
                              <li>
                                 <a href="#">Shop</a>
                                 <ul>
                                     @php
                                     $category = \App\Category::all()
                                     @endphp 
                                     @foreach($category as $cat)

                                    <li> 
                                       <a href="#">{{$cat->name}}</a> 
                                       <ul>
                                          @php $subcategory = \App\subcategory::where('category_id',$cat->id)->get()
                                           @endphp
                                           @foreach($subcategory as $subcat)
                                          <li><a href="#">{{$subcat->name}}</a></li> @endforeach

                                       </ul>

                                    </li>
                                    @endforeach
 
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">blog</a> 
                              </li>
                              <li><a href="{{ route('contact') }}">Contact us </a></li>
                              <li><a href="{{ route('about') }}">About us </a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>