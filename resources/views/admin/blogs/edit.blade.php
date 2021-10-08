@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Blog</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Editting the Blog.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('blogs')}}">Blog View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Blog</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="{{ route('blog_update' ,$blog->id) }}"  method="post" >
                                   @method('PUT')
                                    <div class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" required="" id="title" value="{{$blog->title}}" name="title" class="form-control" placeholder="Enter Caption In English">
                                    </div> 

                                     <div class="form-group">
                                      <label for="discription">Content</label> 
                                      <textarea class="form-control" type="text"  id="editor1"  name="editor1" placeholder="Enter Product Discription" placeholder="Enter Product Discription" required rows="3">{{$blog->content}}</textarea>
                                    </div>
 
                                     <div class="form-group">
                                       <label for="formFile" class="form-label">Add Banner Image</label><br>
                                       <img src="{{ asset('images/blogs/' . $blog->image)}}"  class="img-resposive"  width="150px" height="100px" >
                                       <input type="hidden" name="old_img" value="{{$blog->image}}">
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