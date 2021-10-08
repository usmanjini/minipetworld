@extends('layouts.master')

@section('title', 'Home')

@section('content')


<div class="container-fluid">
    <div class="bg-grey ">
      <div class="container ">
        <div class="row ">
         
          <div class="col-md-12 cat-info" style="padding-top: 1%">
            <h3 style="text-transform: uppercase;">New Products</h3>
      
      
    </div>
        </div>
      </div>
          
  </div> 
  
 
<div class="container-fluid">
<div class="row"> 
    <!-- side menu ends -->
  </div>
  <div class="col-md-12">
    <div class="row text-center space-up space-bottom">
            @foreach($new_product as $product)
            <div class="col-md-3">
                <div class="prod-container">
                <a href="{{route('productbyid',$product->id)}}">
                 <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid">
                <div class="middle">
                <div class="text"><img src="{{asset('assets/images/arrow-btn.png')}}" class="img-fluid"></div>
                </div>
                </a>
              </div>
                 <!-- <small>330-336</small> -->
                <p>{{$product->name}}</p>
            </div>
            @endforeach
             
         
  </div>
  
  </div>
  
</div> 
  
</div> 
    </div>   	
@endsection