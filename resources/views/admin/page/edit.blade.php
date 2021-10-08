@extends('admin.adminmaster')

@section('title', 'page')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Page</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding New Page.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('page')}}">Page</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Page</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

 <form enctype="multipart/form-data" action="{{ route('page_update' ,$page->id) }}"  method="post">
   @method('PUT')
  <div class="form-group">
    <label for="name">Page Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" value="{{$page->name}}" placeholder="Enter Page Name">  
  </div>

  <div class="form-group">
    <label for="discription">Description</label>
    <textarea type="text" class="form-control" required="" id="description" name="description" placeholder="Enter Page Discription">{{$page->description}}
    </textarea>  
  </div>
    <div class="form-group">

    <label for="image">Image</label><br>
    <img src="{{ asset('images/page/' . $page->image)}}"  class="img-resposive"  width="100px" height="60px" >
    <input type="hidden" name="old_img" value="{{$page->image}}">
    <input type="file" class="form-control"  id="image" name="image">  
  </div>
    {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                           </div>
                        </div>
                    </div>
                </section> 
 </div> 

@endsection