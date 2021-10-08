@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Pet SubCategory</h3>
                            <p class="text-subtitle text-muted">You can change or remain same the input fields.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('petcategories')}}">Pet Category View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Pet SubCategory</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Pet SubCategory</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"> 

 <form enctype="multipart/form-data" action="{{ route('update_petsubcat' ,$subcategry->id) }}"  method="post">
   @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" value="{{$subcategry->name}}" placeholder="Enter Category Name">  
  </div>
<input type="hidden" value="{{$catid}}" name="catid">
    <div class="form-group">

    <label for="image">Image</label><br>
    <img src="{{ asset('images/petcats/' . $subcategry->image)}}"  class="img-resposive"  width="100px" height="60px" >
    <input type="hidden" name="old_img" value="{{$subcategry->image}}">
    <input type="file" class="form-control"  id="image" name="image">  
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" required="" id="descriptions" name="descriptions" placeholder="Enter Sub Category Discription" roe="3">
      {{$subcategry->description}}
    </textarea>
    <input type="hidden" value="{{$subcategry->description}}" name="description"> 
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