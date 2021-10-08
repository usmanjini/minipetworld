@extends('admin.adminmaster')

@section('title', 'Edit Event')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Event</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editing Event.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('eventss')}}">Event view</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Event</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Event</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('update_event' ,$event->id) }}"  method="post">
                                  @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" required="" value="{{$event->title}}" id="title" name="title"class="form-control" placeholder="Enter Even title">
                                    </div>

                                    <div class="form-group">
                                      <label for="discription">Description</label> 
                                      <textarea class="form-control" type="text"  id="description"  name="description" placeholder="Enter Product Discription" placeholder="Enter Product Discription" required rows="3">{{$event->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text" class="form-control" value="{{$event->location}}" id="location" required="" name="location" placeholder="Enter Location">  
                                    </div>

                                    <div class="form-group">
                                      <label for="datetime">Date Time</label>
                                      <input type="datetime-local" class="form-control" id="datetime" value="{{ \Carbon\Carbon::parse($event->datetime)->format('Y-m-d\TH:i')}}" required="" name="datetime" placeholder="Enter datetime">  
                                    </div>
                                     <div class="form-group">
                                       <label for="formFile" class="form-label">Event Image</label><br>
                                       <input type="hidden" name="old_img" value="{{$event->image}}">
                                       <img src="{{ asset('images/' . $event->image)}}"  class="img-resposive"  width="100px" height="100px" >
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