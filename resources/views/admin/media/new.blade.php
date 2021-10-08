@extends('admin.adminmaster')
@section('title', 'Home')
@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Media</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for Adding the Media.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Media</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Media links</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form enctype="multipart/form-data" action="media/store"  method="post">

                                    <div class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" required="" id="title" name="title"class="form-control" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Enter Link</label>
                                        <input type="text" class="form-control" required="" id="link" name="link" placeholder="https://vimeo.com/.....">
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