@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
  <div class="bg-grey">
      <div class="container ">
        <div class="row ">
          <div class="col-md-12  cat-info" style="padding-top: 10px">
            <h3>NEWS & EVENTS</h3>
            <p>Stay updated with latest upcoming information about Cardic’s news and events.</p>
      
         </div>
        </div>
      </div>
          
  </div>
  </div>
	<div class="container"> 
		  <div class="row space-bottom" >
		  	@foreach($events as $event)
		  	<div class="col-md-4 space-up">
		  		<a href="#" data-toggle="modal" data-target="#myModal{{$event->id}}" style="color: black;text-decoration: none;">
		  		<img src="{{ asset('images/' . $event->image)}}"  class="img-fluid">
		  		 <p >{{$event->title}}</p>
		  	    </a>
		  	<div class="modal fade" id="myModal{{$event->id}}" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" style="max-width: 580px;"> 
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h3>{{$event->title}}</h3>
						<small> {{\Carbon\Carbon::parse($event->date_time)->format('d M Y ')}} | {{$event->location}}</small>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
						<div class="modal-body">
						<div class="row text-center">
                         <div class="col-md-12"> 
                         <img src="{{ asset('images/' . $event->image)}}" class="img-resposive"  alt=" ">
						 <p>{{ $event->description}}</p>
                        <p></p>
                        <p></p>
                         </div>
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



 

@endsection