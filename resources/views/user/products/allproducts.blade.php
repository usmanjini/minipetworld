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
                            <h3>Product View</h3>
                            <p class="text-subtitle text-muted">For View products detail and description.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products View</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
 

                <section id="basic-dropdown">
                    <div class="row">
                        <div class="col-12">

                        

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Select Categories</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body"> 
                                    @php $categories= \App\Category::all() @endphp
                                    @foreach($categories as $cat)
                                        <div class="btn-group mb-1"  style="padding: 1%">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButtonSec" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{$cat->name}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                                @php $subcategory = \App\subcategory::where('category_id',$cat->id)->get()->sortBy('sequence'); @endphp
                                                @foreach($subcategory as $subcat)
                                                    <a class="dropdown-item" href="{{route('product_by_subcategory',$subcat->id)}}">{{$subcat->name}}</a>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                      @endforeach   
                                         
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </section>
                <!-- Basic Dropdown End --> 

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
                                        <th>Name</th> 
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>sale price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="ProductSortable">
                                
                                @foreach($products as $key => $product)
                                
                                    <tr id="{{$product->id}}"> 
                                        <td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td>
                                        <td>{{$product->name}}</td> 
                                        <td>{{$product->description}}</td>
                                        <td><img src="{{ asset('images/products/' . $product->image)}}"  class="img-resposive"  width="100px" height="60px" ></td> 
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{$product->wholesale_price}}</td>
                                        @if($product->status == 1) <td>Active</td> @elseif($product->status == 0) <td>Disable</td> @endif 
                                        <td> 
                                        <a href="{{ url('/product_edit/' . $product->id ) }}" class="btn btn-outline-info">Edit</a> 
                                        <a href="{{ url('/del_product/' . $product->id ) }}"onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-outline-danger">Delete</a>
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

  $( "#ProductSortable" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#ProductSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_products')}}';
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