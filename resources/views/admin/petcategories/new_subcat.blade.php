@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Pet Subcategory</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding New Pet subcategory.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('petcategories')}}">Categories View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Pet Subcategory</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Event</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

 <form enctype="multipart/form-data" action="{{route('store_petsubcat')}}"  method="post">
  <div class="form-group field_wrapper">
    <div class="row">
       <div class="col-md-6">
          <label for="size">Pet Sub Categories <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-square"></i></a></label>
          <div> <input type="text" class="form-control" required="" id="subcat" name="names" placeholder="Pet Sub Category"> 
       </div>
      </div>

      <div class="col-md-6">
          <label for="size">Image</label>
          <div> <input class="form-control" type="file" name="image"> 
       </div>
      </div> 
      <div class="col-md-12" style="padding-top: 20px;">
          <label for="size">Pet Sub Categories Descripton</label>
       <div>
          <textarea class="form-control" type="text"  id="descriptions"  name="descriptions" placeholder="Enter Pet SubCategory Discription" placeholder="Enter Product Discription" required rows="3"></textarea>
       </div>
      </div>

    </div>
  </div>
  <input type="hidden" value="{{$id}}" name="catid">

    {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
              </div>
          </div>
    </section> 
 </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row"><div class="col-md-6"><label for="size">Sub Categories</label> <div> <input type="text" class="form-control" required="" id="subcat" name="names[]" placeholder="Sub Category"> </div></div><div class="col-md-6"><label for="size">Image</label><div> <input class="form-control" type="file" name="images[]"> </div> </div><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
    </script>
	
@endsection