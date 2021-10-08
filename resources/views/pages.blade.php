@extends('layouts.master')

@section('title', 'page')

@section('content')

<div>
        <img src="{{asset('assets/images/feedback.jpg')}}"  width="100%">
 </div>

<div class="container-fluid">
  <div class="container">
    @if(session()->has('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
            @endif
          <br/>
          <div class="row space-bottom">
            <div class="col-md-6">
               
               
              <h1 class="space-up">{{$page->page_name}}</h1>
              <div style="width:300px;border-bottom:1px solid #DD0B2F;margin-top:15px; line-height: 24px;"></div>
              <p style="text-align:justify;">
                {{$page->description}}
              </p>
            </div>

            <div class="col-md-6">
             <img src="{{ asset('images/page/' . $page->image)}}"  width="100%" height="400px">
            </div>
          
          </div>
</div>
</div>
@endsection