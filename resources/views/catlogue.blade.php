@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
  <div class="bg-grey ">
      <div class="container ">
        <div class="row ">
          <div class="col-md-12 cat-info" style="padding-top: 10px">
            <h3>RESOURCES</h3>
            <p>All catalogs and introductory booklets can be loaded directly, but for security purposes, these resources are password protected. We are happy to send you a password via email. Email us at info@cardic.com.pk</p>
      
    </div>
        </div>
      </div>
          
  </div>
  </div>
<div class="container"> 

   <div class="row space-up  space-bottom">
    
      @foreach($catlogs as $catlog)
     <div class="col-md-3">
      <h3>{{$catlog->name}}</h3>
      <img src="{{ asset('images/pdf/' . $catlog->image)}}" class="img-fluid"> 
      <a href="#" data-toggle="modal" data-target="#myModal{{$catlog->id}}" class="btn btn-primary mb-2 space-up">DOWNLOAD PDF</a>
           <div class="modal fade" id="myModal{{$catlog->id}}" tabindex="-1" role="dialog">
                  <div class="modal-dialog ">
                        <!-- Modal content-->
                        <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                              </div>
                                    <div class="modal-body">
                                    <div class="col-md-8">
                                    <h3>Download Now</h3>
                                    
                                     <form action="{{route('downloadcatlog')}}"  id="download" method="post">
                                          <div class="styled-input agile-styled-input-top">
                                                <input type="hidden" id="catid" name="id" value="{{$catlog->id}}">
                                                <input type="password" name="password" id="password" required="">
                                                <label>Password</label>
                                                <span></span>
                                                {{ csrf_field() }}
                                          </div>
                                          
                                          <input type="submit"  class="btn btn-primary mb-2" value="Click Here">
                                    </form>
                                    

                                    </div>
                                    <div class="col-md-4">
                                          <img src="{{ asset('images/pdf/' . $catlog->image)}}" class="img-fluid">
                                    </div>
                              </div>
                        </div>
                        <!-- //Modal content-->
                  </div>
            </div>
     </div>
     @endforeach 
    </div> 
  </div>
</div>
@endsection