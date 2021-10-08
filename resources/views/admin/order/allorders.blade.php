@extends('admin.adminmaster')

@section('title', 'Home')

@section('SpecificStyles')
<link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/simple-datatables/style.css')}}">
@stop

@section('content')


<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Orders View</h3>
                            <p class="text-subtitle text-muted">For View Order detail and description.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Orders View</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
 

             
                <section class="section">
                    <div class="card">

                       <div>
                       @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong></div>
                      @endif
                       </div>

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Sort</th>
                                        <th>Order No</th> 
                                        <th>Name</th> 
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>State</th>
										<th>City</th>
                                        <th>Postel Code</th>
                                        <th>Address</th>
                                        <th>Order Date</th>
                                        <th>Payment Method</th>
                                        <th>Total Items</th>
                                        <th>Status</th>
                                        <th>Customer id</th>
										<th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="PostSortable">
                                
                                @foreach($orders as $key => $order)
                                
                                    <tr id="{{$order->id}}">
									<td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td>									
                                    <td>{{ $order->order_no}}</td>
                                    <td>{{ $order->name}}</td>
									<td>{{ $order->company}}</td>
									<td>{{ $order->email}}</td>
									<td>{{ $order->country}}</td>
									<td>{{ $order->state}}</td>
									<td>{{ $order->city}}</td>
									<td>{{ $order->postal_code}}</td>
									<td>{{ $order->address}}</td>
									<td>{{ $order->order_on}}</td>
									<td>{{ $order->payment_method}}</td>
									<td>{{ $order->total_items}}</td>
									<td>{{ $order->status}}</td>
									<td>{{ $order->customer_id}}</td>
									<td>{{ $order->message}}</td>
									 <td> 
									 <a href="{{ route('del_order' ,$order->id) }}"onclick="return confirm('Are you sure you want to Permonently Delete this Request?');"  class="btn btn-outline-danger">Delete</a>
                                     </td> 
                                         
                                    </tr> 
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                </section>
            </div>
 
 
@endsection

@section('specificscripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>


<script type="text/javascript">

$(document).ready(function(){
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
  ui.children().each(function() {
    $(this).width($(this).width());
  });
  return ui;
};

  $( "#PostSortable" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#PostSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_posts')}}';
      var data = {'data' : data , '_token' : token};
      console.log(data);
        $.ajax({
            url:ajaxurl,
            type:'post',
            data:data,
            success:function(data){
               console.log(data);
                // alert('your change successfully saved');
            }
        })
    }
</script>
@stop