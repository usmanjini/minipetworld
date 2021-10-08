@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Page</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding New Page.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('page')}}">page</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Page</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

 
 <form enctype="multipart/form-data" action="page/store"  method="post">
  <div class="form-group">
    <label for="name">Page Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" placeholder="Enter Product Name">  
  </div>

  <div class="form-group">
    <label for="discription">Description</label> 
    <textarea class="form-control" type="text"  id="description"  name="description" placeholder="Enter Page Discription" placeholder="Enter Page Discription" required rows="3"></textarea>
  </div> 
 
    <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" required="" id="image" name="image">  
  </div>
    {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
                          </div>
                        </div>
                    </div>
                </section> 
 </div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
@endsection