@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Blog</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding the banner.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Blogs</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="blog/store"  method="post">

                                    <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" required="" id="title" name="title" placeholder="Enter Blog Title">  
                                    </div> 

                                     <div class="form-group">
                                      <label for="image">Image</label>
                                      <input type="file" class="form-control" required="" id="image" name="image"> 
                                    </div>


                                     <div class="form-group">
                                      <label for="discription">Content</label> 
                                      <textarea class="form-control" type="text"  id="editor1"  name="editor1" placeholder="Enter Center Discription" placeholder="Enter Center Discription" required rows="3"></textarea>
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