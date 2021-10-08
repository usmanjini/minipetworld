@extends('layouts.master')

@section('title', 'blogs')

@section('content')
<div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(assets/img/banner/banner-2.jpg);">
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
      <div class="blog-area pt-100 pb-100 clearfix">
         <div class="container">
            <div class="row">

               @php $blogs = \App\blog::all(); @endphp 
              @if(count($blogs) > 0)

                @foreach ($blogs->reverse() as $blog)

               <div class="col-lg-6 col-md-6">
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