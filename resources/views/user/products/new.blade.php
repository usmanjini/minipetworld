@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Product</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding the Product.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('productss')}}">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Product</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
 
       
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

 <form  action="products/store" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <label for="name">Name</label>
    <input  type="text" class="form-control" required="" id="name" name="name" placeholder="Enter Product Name">  
    </div>
    <div class="form-group">
        <label for="code">Code Name</label>
        <input  type="text" class="form-control" required="" id="code" name="code" placeholder="Enter Product code Name">  
    </div>
 <div class="form-group">
  <label><input type="checkbox" name="feature" value="feature"> Feature Product</label>
 </div> 

 <div class="form-group">
  <label><input type="checkbox" name="new_product" value="new_product"> New Product</label>
 </div>
   
  <div class="form-group">
    <label for="discription">Description</label> 
    <textarea class="form-control" type="text"  id="discription" name="discription" placeholder="Enter Product Discription" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="category">Category</label> 
    <select class="form-control" id="category" required="" name="category">
      <option>Select Category </option>
      @foreach($category as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach 
    </select>
  </div> 

    <div class="form-group">
    <label for="sub_category">Sub Category</label>
    <select class="form-control" id="sub_category" required="" name="sub_category"> 
    </select>
    </div>
{{-- 
  <div class="form-group field_wrapper">
      <div>

        <div class="row"> 
        <div class="col-md-6">
        <h4 class="card-title">For Add Product Code and Price</h4> 
        </div>
        
        <div class="col-md-6">
        <span>To Add More Price</span>   <a href="javascript:void(0);" class="add_button btn btn-info" title="Add field">Add</a>
        </div> 
        </div>

        <div class="row"> 
            <div class="col-md-6">
            <label for="size">Product Code</label>
            <input type="text" class="form-control " id="code" name="code[]" required="" placeholder="p01 etc .."> 
            </div>
            <div class="col-md-6">
                <label for="size">Size</label>
            <input type="text" class="form-control " id="size" name="size[]" required="" placeholder="0.1 .."> 
            </div>
        </div><br> 
     </div>
  </div> --}}

  <div class="form-group">
    <label for="qty">Product Image</label>
    <input type="file" class="form-control" id="image"  required="" name="image">  
  </div>

   <div class="form-group images_wrapper">
   <span>To Add More Images</span>   <a href="javascript:void(0);" class="add_image btn btn-info" title="Add field">Add</a><br>
   <label for="size">Other Images </label>
   <div> <input type="file" class="form-control" id="other_images"  name="other_images[]"></div><br>
  </div>

  
  <div class="form-group">
        <div class="row">
            <div class="col-md-4">
            <label for="price">Price</label>
            <input  type="number" class="form-control" required="" id="price" name="price" placeholder="Enter Product buy price">
            </div>

            <div class="col-md-4">
                <label for="sale_price">Sale Price</label>
                <input  type="number" class="form-control" required="" id="sale_price" name="sale_price" placeholder="Enter Product sale price">
            </div>
            <div class="col-md-4">
            <label for="wholesale_price">Wholesale Price</label>
            <input  type="number" class="form-control" required="" id="wholesale_price" name="wholesale_price" placeholder="Enter Product Whole sale price">
            </div>
        </div> 
  </div>

  <div class="form-group">
    <div class="row" >
        <div class="col-md-6">
        <label for="prod_qty">Product Quantity</label>
        <input  type="number" class="form-control" required="" id="prod_qty" name="prod_qty" placeholder="Enter Product Quantity to add.">
        </div>

        <div class="col-md-6">
            <label for="min_prod_qty">Minimum Product Quantity to Order</label>
            <input  type="number" class="form-control" required="" id="min_prod_qty" name="min_prod_qty" placeholder="Minimum product for odering.">
        </div>
        
    </div> 
   </div>

   <div class="form-group">
    <label for="features">Product Features</label> 
    <textarea class="form-control" type="text"  id="features" name="features" placeholder="Enter Product features" rows="3"></textarea>
   </div>
   
   <div class="form-group">
    <label for="terms_conditions">Tearms And Conditions</label> 
    <textarea class="form-control" type="text"  id="terms_conditions" name="terms_conditions" placeholder="Enter Product terms & conditions" rows="3"></textarea>
   </div>

   <div class="form-group">
    <label for="Seo">For Seo</label>
    <div class="row" style="background-color:lightgray; padding-bottom:10px;">
       
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input  type="text" class="form-control" required="" id="meta_title" name="meta_title" placeholder="Enter Meta Tile for Product.">  
        </div>

        <div class="form-group">
            <label for="meta_discription">Meta Description</label> 
            <textarea class="form-control" type="text"  id="meta_description" name="meta_description" placeholder="Enter Meta Discription for Product." rows="3"></textarea>
        </div>
    </div> 
</div>

<div class="form-group">
  
    <div class="row">
       
        <div class="col-md-4"  > 
            <label><input type="checkbox" name="track_stock" value="track_stock"> Track Stock</label>
        </div>

        <div class="col-md-4"  > 
            <label><input type="checkbox" name="taxable" value="taxable"> Texable</label>
        </div>

        <div class="col-md-4"  > 
            <label><input type="checkbox" name="status" value="status"> Active</label>
        </div>


    </div> 
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
$(document).ready(function () {

    $("#category").change(function () {
        var id = $(this).val();
        var ajaxurl = '{{route('sub_category', ':id')}}';
        $('#sub_category').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $data = $(data); 
            console.log($data);
            for(var i=0 ; i< data.length ; i++) {
              $('<option value="'+data[i]['id'] +'">'+ data[i]['name'] +'</option>').appendTo('#sub_category');
            }
            
        }   
    });
 });

});
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    // var fieldHTML = '<div><input type="text" class="form-control" name="size[]" /><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a></div>'; //New input field html
    var fieldHTML = ' <div ><a href="javascript:void(0);" class="remove_button btn btn-danger text-center">Remove</a> <div class="row"><div class="col-md-6"><label for="size">Product Code</label> <input type="text" class="form-control " id="code" name="code[]" required="" placeholder="p01 etc ..">  </div><div class="col-md-6"> <label for="size">Size</label><input type="text" class="form-control " id="size" name="size[]" required="" placeholder="0.1 ..">  </div></div><br></div>';

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
//=======================================================================
      var addButton2 = $('.add_image'); //Add button selector
    var wrapper2 = $('.images_wrapper'); //Input field wrapper
    var fieldHTML2 = '<div><label for="size">Other Images </label>   <a href="javascript:void(0);" class="remove_image btn btn-danger text-center">Remove</a><br><input type="file" class="form-control" id="other_images"  required="" name="other_images[]"><br></div>'; 
    //New input field html 
    var y = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton2).click(function(){
      console.log("clicked");
        //Check maximum number of input fields
        if(y < maxField){ 
            y++; //Increment field counter
            $(wrapper2).append(fieldHTML2); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper2).on('click', '.remove_image', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        y--; //Decrement field counter
    });
});
</script>
  
	
@endsection