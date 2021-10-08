@extends('layouts.master')

@section('title', 'Media')

@section('content')
<div class="container-fluid">
	<div class="bg-grey">
      <div class="container ">
        <div class="row ">
          <div class="col-md-12  cat-info" style="padding-top: 10px">
            <h3 style="text-transform: uppercase;">Cardic Media</h3>
         </div>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row space-bottom space-up">
        @foreach($mediafiles as $media)
         <div class="col-md-4"> 
         
         <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{substr($media->link, 18)}}" allowfullscreen></iframe>
          </div>
          <p>{{$media->title}}</p>
          </div>
        @endforeach
     </div>
 </div>
</div>

@endsection