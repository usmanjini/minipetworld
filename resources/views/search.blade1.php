@extends('layouts.master')

@section('title', 'Home')

@section('content')

	    <div class="container">
		  <div class="apce-up">
		  	
		   <div class="container">
    @if(isset($product))
        <p> The Search results for your query <b> {{ $input }} </b> are :</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>View</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($product as $prod)
            <tr>
                <td>{{$prod->name}}</td>
                <td><a href="{{route('productbyid',$prod->id)}}">click Here</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        @else
        <h2>No Details found. Try to search again !</h2>
    @endif
</div>
				</div>
				<div class="clearfix"> </div>
		</div>
       
@endsection