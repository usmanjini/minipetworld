@extends('layouts.master')

@section('title', 'blogs')

@section('content')
<div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Search Page</h2>
               <ul>
                  <li><a href="{{ route('home') }}">home</a></li>
                  <li class="active">Search Page</li>
               </ul>
            </div>
         </div>
</div>

      <div class="shop-area pt-100 pb-100">

      <div class="container-fluid">

          <div class="row">


             <div style="padding-left: 8%;" class="col-lg-6 col-md-6">

              <h2>Search the posts</h2>
               <form  action="posts/search" enctype="multipart/form-data" method="post">
             
              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="petfor">Post</label>
                <select class="form-control" id="petfor"  name="petfor">
                  <option value="">Select Post</option>
                  <option value="Sell" >Sell</option> 
                  <option value="Breed">Breed</option> 
                </select>
              </div> 

               <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="category">Category</label> 
                <select class="form-control" id="category" name="category"> 
                   <option value="">Select Category</option>
                  @php $category = \App\Petcategory::all() @endphp
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach 

                </select>
              </div> 


              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="name">Name</label>
                <input  type="text" class="form-control"  id="name" name="name" placeholder="Enter Pet Name">  
              </div>  


              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="color">Color</label>
                <input  type="text" class="form-control"  id="color" name="color" placeholder="Enter Pet Color">  
              </div> 


              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="age">Age</label>
                <input  type="text" class="form-control"  id="age" name="age" placeholder="Enter Pet Age">  
              </div> 
   
               {{ csrf_field() }}

              <button style="margin: 3%;" type="submit" class="btn btn-primary">Search</button>
            </form>

             </div>


              <div style="padding-left: 8%;" class="col-lg-6 col-md-6">
                <h2>Search the product</h2>

               <form  action="products/search" enctype="multipart/form-data" method="post">
              
              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="category">Category</label> 
                <select class="form-control" id="category" name="category"> 
                  <option value="">Select Category</option> 
                  @php $category = \App\Category::all(); @endphp
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option> 
                  @endforeach  
                </select>
              </div> 
 

               <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="name">Name</label>
                <input  type="text" class="form-control"  id="name" name="name" placeholder="Enter Product Name">  
              </div> 
 

              <div class="col-md-6" style="padding-bottom: 10px;">
                <label for="price">Price</label>
                <input  type="number" class="form-control"  id="min_price" name="min_price" placeholder=" Product Minimum price">  <br>
                <input  type="number" class="form-control"  id="max_price" name="max_price" placeholder=" Product Maximum price">
              </div> 

               {{ csrf_field() }}

              <button style="margin: 3%;" type="submit" class="btn btn-primary">Search</button>
            </form>

             </div>


          </div>
      </div>
     
@endsection