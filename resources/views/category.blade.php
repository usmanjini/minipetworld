@extends('layouts.master')

@section('title', 'Home')

@section('content')

 
 
<div class="container-fluid">
    <div class="bg-grey space-bottom">
      <div class="container ">
        <div class="row ">
          <div class="col-md-12 space-up cat-info">
            <h3>{{$category->name}}</h3>
            <p>{{$category->description}}</p> 
          </div>
        </div>
      </div>
          
    </div>
  
 


<div class="container-fluid"> 

  <div class="row text-center  sub-cat">

           @foreach($data as $subcat)
 
              @if($subcat->sequence%2==1)
             
             <div class="col-lg-6 prod" >
              <div class="prod-container img-hover-zoom" style="padding-bottom: 60px;">
                <a href="{{ route('productsbycat' ,$subcat->id) }}"><img src="{{ asset('images/cats/' . $subcat->image)}}" class="img-fluid" style="border-radius: 20px;">
                <div class="middle" > 
                <div class="text" ><img  src="{{asset('assets/images/arrow-btn.png')}}" class="img-fluid"></div>
                </div>
                </a> 
              </div> 
            </div> 
            <div class="col-lg-6" style="float: right; text-align:left;">
              <span style="color:darkgray; font-size:5em; font-style: bold; font-weight: 400px;">{{$subcat->name}}</span>
              <div style="text-align: justify;"><p style="color:black" >
              {{$subcat->description}}</p>
            </div>
            </div>
        

             @else

          
            <div class="col-lg-6" style="text-align:left;">
              <span style="color:darkgray; font-size:5em; font-style: bold; font-weight: 400px;">{{$subcat->name}}</span>
              <div style="text-align: justify;"><p style="color:black" >
              {{$subcat->description}}</p>
            </div>
            </div>
            <div class="col-lg-6 prod" style="float: right;" >
              <div class="prod-container img-hover-zoom" style="padding-bottom: 60px;">
                <a href="{{ route('productsbycat' ,$subcat->id) }}"><img src="{{ asset('images/cats/' . $subcat->image)}}" class="img-fluid" style="border-radius: 20px;">
                <div class="middle" > 
                <div class="text" ><img  src="{{asset('assets/images/arrow-btn.png')}}" class="img-fluid"></div>
                </div>
                </a> 
              </div> 
            </div> 
         
           @endif
          
 
            @endforeach
            
  </div>

 



</div> 






    </div>    
@endsection