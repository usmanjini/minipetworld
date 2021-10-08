@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Banner</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding the banner.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('banners')}}">Banner View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Banner</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('banner_update' ,$banner->id) }}"  method="post">
                                   @method('PUT')
                                    <div class="form-group">
                                        <label for="basicInput">Caption In English</label>
                                        <input type="text" class="form-control" required="" id="caption" value="{{$banner->caption}}" name="caption"class="form-control" placeholder="Enter Caption In English">
                                    </div>
 

                                     <div class="form-group">
                                       <label for="formFile" class="form-label">Add Banner Image</label><br>
                                       <img src="{{ asset('images/banners/' . $banner->image)}}"  class="img-resposive"  width="150px" height="100px" >
                                       <input type="hidden" name="old_img" value="{{$banner->image}}">
                                       <input type="file" class="form-control"  id="image" name="image">  
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
@endsection