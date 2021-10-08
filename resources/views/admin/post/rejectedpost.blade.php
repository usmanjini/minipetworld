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
                            <h3>Posts View</h3>
                            <p class="text-subtitle text-muted">For View Posts detail and description.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Posts View</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
 

              <!--   <section id="basic-dropdown">
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
                </section> -->
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
                                        <th>User Name</th> 
                                        <th>Pet Name</th> 
                                        <th>Phone</th>
                                        <th>Breed</th>
                                        <th>Group</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Age</th>
                                        <th>Pet For</th>
                                        <th>Color</th>
                                        <th>hypoallergenic</th>
                                        <th>housetrain</th>
                                        <th>declawed</th>
                                        <th>specialdiet</th>
                                        <th>like_to_lap</th>
                                        <th>specialneed</th>
                                        <th>medical</th>
                                        <th>neutered</th>
                                        <th>vaccinated</th>
                                        <th>highrisk</th>
                                        <th>description</th>
                                        <th>location</th>
                                        <th>Status</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>

                                <tbody id="PostSortable">
                                
                                @foreach($posts as $key => $post)
                                
                                    <tr id="{{$post->id}}"> 
                                        <td class="handle"><a class="btn" style="cursor:move"><i class="bi bi-list"></i></a></td>
                                        @php $User = \App\User::find($post->user_id); @endphp
                                        <td>{{$User->name}}</td>
                                        <td>{{$post->name}}</td> 
                                        <td>{{$post->phone}}</td> 
                                        <td>{{$post->breed}}</td> 
                                        <td>{{$post->group}}</td> 
                                         <td><img src="{{ asset('images/posts/' . $post->image)}}"  class="img-resposive"  width="100px" height="60px" ></td> 
                                        <td>{{$post->price}}</td> 
                                        <td>{{$post->age}}</td> 
                                        <td>{{$post->petfor}}</td> 
                                        <td>{{$post->color}}</td> 
                                        <td>{{$post->hypoallergenic}}</td> 
                                        <td>{{$post->housetrain}}</td> 
                                        <td>{{$post->declawed}}</td> 
                                        <td>{{$post->specialdiet}}</td> 
                                        <td>{{$post->like_to_lap}}</td> 
                                        <td>{{$post->specialneed}}</td> 
                                        <td>{{$post->medical}}</td> 
                                        <td>{{$post->neutered}}</td> 
                                        <td>{{$post->vaccinated}}</td> 
                                        <td>{{$post->highrisk}}</td> 
                                        <td>{{$post->description}}</td> 
                                        <td>{{$post->location}}</td>  
                                        @if ( $post->status == "Request")
                                            <td><span class="badge bg-secondary">Requested</span></td> 
                                        @elseif ( $post->status == "Complete" )
                                             <td><span class="badge bg-success">live</span></td>
                                        @else
                                             <td><span class="badge bg-danger">Rejected</span></td>
                                        @endif
                                        <td> 
                                        <a href="{{ route('accept_post' ,$post->id) }}" onclick="return confirm('Are you sure you want to Accept this Request?');" class="btn btn-outline-success">Accept</a>  
                                        <a href="{{ route('del_postss' ,$post->id) }}"onclick="return confirm('Are you sure you want to Permonently Delete this Request?');"  class="btn btn-outline-danger">Delete</a>
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