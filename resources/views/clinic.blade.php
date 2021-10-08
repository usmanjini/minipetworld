@extends('layouts.master')

@section('title', 'clinic')

@section('content')
<div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Vet Clinics</h2>
               <ul>
                  <li><a href="{{ route('home') }}">home</a></li>
                  <li class="active">Vet Clinics</li>
               </ul>
            </div>
         </div>
</div>

     <div class="blog-area pt-100 pb-100 clearfix">
         <div class="container">
            <div class="row">

               @php $centers = \App\center::all(); @endphp
              @if(count($centers) > 0)

                @foreach ($centers as $center)

               <div class="col-lg-6 col-md-6">
                  <div class="blog-wrapper mb-30 gray-bg">
                     <div class="blog-img hover-effect"><a href="#"><img alt="" src="{{ asset('images/' . $center->image) }}"></a></div>
                     <div class="blog-content">
                        <div class="blog-meta">
                           <ul>
                              <li><h2><span>{{ $center->name }}</span></h2></li> 
                           </ul>
                        </div>
                         <h4><a href="{{ $center->location }}">Address :  {{ $center->name }}</a></h4>
                         <h4>Phone No :  {{ $center->phone }}</h4>
                        <h5><a href="#">{{ $center->description }}</a></h5>
                     </div>
                  </div>
               </div>
               @endforeach

             @endif
             
            </div>
         
         </div>
      </div>
     
@endsection