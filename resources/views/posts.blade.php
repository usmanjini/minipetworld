@extends('layouts.master')

@section('title', 'Home')

@section('content')
  
  <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Posts Page</h2>
               <ul>
                  <li><a href="{{route('home')}}">home</a></li>
                  <li class="active">Posts Page</li>
               </ul>
            </div>
         </div>
      </div>

     <div class="shop-area pt-100 pb-100 gray-bg">
         <div class="container">
            <div class="row flex-row-reverse">
               <div class="col-lg-9">
                  <div class="shop-topbar-wrapper">
                     <div class="product-sorting-wrapper">
                        <div class="product-show shorting-style">
                           <label>Shown in grid or list</label>
                           
                        </div>
                     </div>
                     <div class="grid-list-options">
                        <ul class="view-mode">
                           <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                           <li><a href="#product-list" data-view="product-list"><i class="ti-align-justify"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="grid-list-product-wrapper">
                     <div class="product-view product-grid">
                        <div class="row">

                           
                        	 @foreach($posts as $post)
                           <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                              <div class="product-wrapper mb-10">
                                 <div class="product-img">
                                    <a href="{{route('postbyid',$post->id)}}">
                                    <img src="{{ asset('images/posts/' . $post->image)}}" alt=""></a>

                                    <div class="product-action"> 
                                    <a title="Add To Cart" href="{{route('postbyid',$post->id)}}"><i class="ti-plus"></i></a>
                                    </div> 
                                 </div> 

                                 <div class="product-content">
                                    <h4><a href="{{route('postbyid',$post->id)}}">{{$post->name}}</a></h4>
                                    <h4><a href="{{route('postbyid',$post->id)}}">Post For: {{$post->petfor}}</a></h4>
                                    <div class="product-price"><span class="new">Rs{{$post->price}}</span></div>
                                 </div>
                                 <div class="product-list-content">
                                    <h4><a href="{{route('postbyid',$post->id)}}">{{$post->name}}</a></h4>
                                     <h4><a href="{{route('postbyid',$post->id)}}">Post For: {{$post->petfor}}</a></h4>
                                    <div class="product-price"><span class="new">Rs{{$post->price}}</span></div>
                                    <p>{{$post->description}}</p>
                                    <div class="product-list-action">
                                       <div class="product-list-action-left">
                                       	<a class="addtocart-btn" title="viw" href="{{route('postbyid',$post->id)}}"></i>View</a></div> 
                                    </div>
                                 </div>
                              </div>
                           </div>

                          @endforeach
                          
                        </div> 
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="shop-sidebar">
                    <!--  <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Search Products</h4>
                        <div class="shop-search mt-25 mb-50">
                           <form class="shop-search-form">
                           	<input type="text" placeholder="Find a product">
                           	<button type="submit"><i class="icon-magnifier"></i></button></form>
                        </div>
                     </div> -->

                     @php $petcategory = \App\Petcategory::all(); @endphp 
                     @foreach($petcategory as $petcat)
                     
                     <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">{{$petcat->name}}</h4>
                        <div class="shop-list-style mt-20">
                           <ul>
                              @php $petsubcategory=\App\petsubcategory::where('category_id',$petcat->id)->get(); @endphp
                              @foreach($petsubcategory as $petsubcat)
                              <li><a href="{{ route('postsbycat' ,$petsubcat->id) }}">{{$petsubcat->name}}</a></li> 
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