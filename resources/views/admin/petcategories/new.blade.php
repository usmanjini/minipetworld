@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')

<div class="page-heading">
                 <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Pet  Category</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding the Pet Category.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('petcategories')}}">Pet Categories View</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Pet Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Pet Category</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

 
 <form enctype="multipart/form-data" action="petcategory/store"  method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" placeholder="Enter Category Name">  
  </div>

  <div class="form-group">
    <label for="discription">Description</label> 
    <textarea class="form-control" type="text"  id="description" name="description" placeholder="Enter Category Discription" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" required="" id="image" name="image" >  
  </div>
 
  <br> 

  <div class="row"> 
    <div class="col-md-6">
    <h4 class="card-title">For Add SubCategories</h4> 
    </div>
    
    <div class="col-md-6">
    <span>To Add Subcategories</span>   <a href="javascript:void(0);" class="add_button btn btn-info" title="Add field">Add</a>
    </div> 
  </div> 

  <div class="form-group field_wrapper">
    <div class="row"> 
       <div class="col-md-6">
          <label for="size">Sub Categories</label>
          <div> <input type="text" class="form-control" required="" id="subcat" name="names[]" placeholder="Enter Sub Category Name"></div>
      </div>

      <div class="col-md-6">
          <label for="size">Image</label>
          <div> <input class="form-control" type="file" name="images[]" ></div>
      </div>

      <div class="col-md-12">
          <label for="size">Sub Categories Descripton</label>
          <div> <textarea type="text" class="form-control" required="" id="descriptions" name="descriptions" placeholder="Enter Sub Category Discription"></textarea></div>
      </div>  
    </div><hr>
  
  </div>
    
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
    var fieldHTML = '<div class="row" style="padding-top:20px;"><a href="javascript:void(0);"  class="remove_button btn btn-danger">Click To Remove Subcategory</a><div class="col-md-6"><label for="size">Sub Categories</label><div> <input type="text" class="form-control" required="" id="subcat" name="names[]" placeholder="Sub Category"></div></div><div class="col-md-6"><label for="size">Image</label><div> <input class="form-control" type="file" name="images[]"></div></div><div class="col-md-12"><label for="size">Sub Categories Descripton</label><div> <textarea type="text" class="form-control" required="" id="descriptions" name="descriptions" placeholder="Enter Sub Category Discription"></textarea></div><br></div><hr></div>'; //New input field html 
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