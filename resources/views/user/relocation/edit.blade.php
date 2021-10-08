@extends('user.usermaster')

@section('title', 'Edit Center')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Relocation</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing Relocation.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('relocation')}}">Relocation view</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Relocation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Relocation</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('update_relocation' ,$relocation->id) }}"  method="post">
                                  @method('PUT')

                                     <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" required="" id="name" name="name"class="form-control" value="{{$relocation->name}}" placeholder="Enter Your Name">
                                    </div>

                                     <div class="form-group">
                                        <label for="petname">Pet Name</label>
                                        <input type="text" class="form-control" required="" id="petname" value="{{$relocation->petname}}" name="petname"class="form-control" placeholder="Enter Pet Name ">
                                    </div>

                                     <div class="form-group">
                                        <label for="age">Pet Age</label>
                                        <input type="text" class="form-control" required="" id="age" name="age" value="{{$relocation->petage}}" class="form-control" placeholder="Enter Pet title">
                                    </div>

                                     <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" value="{{$relocation->phone}}" class="form-control" required="" id="phone" name="phone"class="form-control" placeholder="Enter You Phone No">
                                    </div>

                                     <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text"  value="{{$relocation->city}}" class="form-control" required="" id="name" name="city"class="form-control" placeholder="Enter Your City Name">
                                    </div>

                                    

                                    <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text"  value="{{$relocation->location}}" class="form-control" id="location" required="" name="location" placeholder="Enter Location">  
                                    </div>


                                     <div class="form-group">
                                      <label for="relocation">ReLocation</label>
                                      <input type="text" value="{{$relocation->relocation}}" class="form-control" id="relocation" required="" name="relocation" placeholder="Enter relocation">  
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