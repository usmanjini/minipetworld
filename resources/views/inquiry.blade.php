@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container">
    <h3 class="wthree_text_info space" style="text-align: left;">Your Cart Items<span></span></h3>

<div class="bs-docs-example">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Size</th>
							<th>Qty</th>
						</tr>
					</thead>
					<tbody>
					    @foreach(Cart::content() as $prod)
						<tr>
							<td>{{$prod->name}}</td>
							<td>{{$prod->options->size}}</td>
							<td>{{$prod->qty}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				
			<form class="form-horizontal space" action="{{route('checkout')}}" method="post">
			    @csrf
                <div class="form-group">
                      <label class="control-label col-sm-2" for="sender_name">Sender Name</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="sender_name" id="sender_name" required="" placeholder="Enter Your Name">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="company">Company Name</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="company" id="company" required="" placeholder="Enter Company Name">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="Email">Email</label>
                      <div class="col-sm-10">
                         <input type="email" class="form-control" name="email" id="sender_name" required="" placeholder="Enter Email">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="address">Address</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="address" id="address" required="" placeholder="Enter Address">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="dev_address">Delivery Address</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="dev_address" id="dev_address" required="" placeholder="Enter Delivery Address">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="phone">Phone #</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="phone" id="phone" required="" placeholder="Enter Phone #">
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-sm-2" for="msg" required="">Message/ Instruction</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="msg"></textarea>
                         
                      </div>
                </div>
                
     
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        	<input class="btn btn-primary" type="submit" style="padding:10px 10px;color:white" value="Check Out">
      <!--<button type="submit" class="btn btn-default">Submit</button>-->
    </div>
  </div>
</form>
			
</div>
</div>


@endsection
