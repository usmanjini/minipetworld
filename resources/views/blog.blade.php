@extends('layouts.master')

@section('title', 'blogs')

@section('content')
<div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Blog</h2>
               <ul>
                  <li><a href="{{ route('home') }}">home</a></li>
                  <li class="active">Blog</li>
               </ul>
            </div>
         </div>
</div>

      <div class="shop-area pt-100 pb-100">

         <div class="container">
            <div class="row  ">
               <div class="col-lg-10 col-md-8">

               

                  <div class="blog-details-wrapper res-mrg-top">
                     <div class="single-blog-wrapper">
                        <div class="blog-img mb-30"><img src="{{ asset('images/blogs/' . $blog->image)}}" alt=""></div>
                        <div class="blog-details-content">
                           <h2>{{ $blog->title }}</h2>
                           <div class="blog-meta">
                              <ul>
                                 <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y ') }}</li> 
                              </ul>
                           </div>
                        </div>
                        <p style="text-align:justify;">{{ $blog->content }}</p>
                       
                        
                  </div>
               </div><br>
 
               
            </div>
         </div>
      </div>
     
@endsection