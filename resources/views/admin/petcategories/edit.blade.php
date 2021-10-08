@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Pet Category</h3>
                            <p class="text-subtitle text-muted">You can change or remain same the input fields.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('categories')}}">Category View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Pet Category</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"> 

 <form enctype="multipart/form-data" action="{{ route('petcategory_update' ,$category->id) }}"  method="post">
   @method('PUT')
  <div class="form-group">
    <label for="name">Pet Category Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" value="{{$category->name}}" placeholder="Enter Category Name">  
  </div>

  <div class="form-group">
    <label for="discription">Description</label>
    <textarea type="text" class="form-control" required="" id="description" name="description" placeholder="Enter Product Discription">{{$category->description}}
    </textarea>  
  </div>
    <div class="form-group">

    <label for="image">Image</label><br>
    <img src="{{ asset('images/petcats/' . $category->image)}}"  class="img-resposive"  width="100px" height="60px" >
    <input type="hidden" name="old_img" value="{{$category->image}}">
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