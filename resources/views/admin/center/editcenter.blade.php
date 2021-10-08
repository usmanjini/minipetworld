@extends('admin.adminmaster')

@section('title', 'Edit Center')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Centers</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing Center.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('centerss')}}">Center view</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Center</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Center</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('update_center' ,$center->id) }}"  method="post">
                                  @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" required="" value="{{$center->name}}" id="title" name="title"class="form-control" placeholder="Enter Center Name">
                                    </div>

                                      <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control" required="" value="{{$center->phone}}" id="phone" name="phone"class="form-control" placeholder="Enter Phone No">
                                    </div>

                                    <div class="form-group">
                                      <label for="discription">Description</label> 
                                      <textarea class="form-control" type="text"  id="description"  name="description" placeholder="Enter Product Discription" placeholder="Enter Product Discription" required rows="3">{{$center->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text" class="form-control" value="{{$center->location}}" id="location" required="" name="location" placeholder="Enter Location">  
                                    </div>

                                   
                                     <div class="form-group">
                                       <label for="formFile" class="form-label">Center Image</label><br>
                                       <input type="hidden" name="old_img" value="{{$center->image}}">
                                       <img src="{{ asset('images/' . $center->image)}}"  class="img-resposive"  width="100px" height="100px" >
                                       <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    {{ csrf_field() }}
                                     <button type="submit" class="btn btn-primary">Submit</button>

                                     </div>

                                  </form>

                                 
                            </div>
                        </div>
                    </div>
                </section> 
 </div> 
 
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	
@endsection