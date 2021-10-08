@extends('user.usermaster')

@section('title', 'edit')

@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Post</h3>
                            <p class="text-subtitle text-muted">Change field if you want to change or not then submit. </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('postss')}}">Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Edit Post</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">



       
        @if(isset($posts))
 <form  action="{{ route('post_update' ,$posts->id) }}" enctype="multipart/form-data" method="post" id="Form1">
    @method('PUT')


     <div class="form-group">
    <label for="name">Name</label>
    <input  type="text" class="form-control" value="{{$posts->name}}" required="" id="name" name="name" placeholder="Enter Post Name">  
    </div>

    <div class="form-group">
        <label for="breed">Breed Name</label>
        <input  type="text" class="form-control" value="{{$posts->breed}}" required="" id="breed" name="breed" placeholder="Enter Breeed Name">  
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input  type="text" class="form-control" value="{{$posts->name}}" required="" id="location" name="location" placeholder="Enter Breeed Name">  
    </div>

     <div class="form-group">
        <label for="phone">Phone No</label>
        <input  type="number" class="form-control" value="{{$posts->phone}}" required="" id="phone" name="phone" placeholder="Enter Your Phone No">  
    </div>

    <div class="form-group">
    <label for="petfor">Pet For</label> 
    <select class="form-control" id="petfor" required="" name="petfor">
        
      @if($posts->petfor == "Sell") 
      <option value="Sell" >Sell </option>
      <option value="Breed">Breed</option>
      @else
      <option value="Breed">Breed</option>
      <option value="Sell" >Sell </option>
      @endif 
    </select>
  </div> 

 <div class="form-group">
    <label for="gender">Gender</label> 
    <select class="form-control" id="gender" required="" name="gender">
      <option value="Male" >Male </option> 
      <option value="Female">Female</option>
   
    </select>
  </div> 


 <div class="form-group">
  <label><input type="checkbox" name="feature" value="feature"  @if($posts->feature == 1) checked @endif> Feature Product</label>
 </div> 

 <div class="form-group">
  <label><input type="checkbox" name="new_product" value="new_product" @if($posts->new_product == 1) checked @endif> New Product</label>
 </div>

  <div class="form-group">
    <label for="category">Group</label> 
    <select class="form-control" id="group" required="" name="group">
      <option value="Male" >Kid </option> 
      <option value="Middle">Middle</option>
      <option value="Young">Young</option>
      <option value="Old">Old</option>
   
    </select>
  </div> 

  <div class="form-group">
        <label for="age">Age</label>
        <input  type="number" class="form-control" value="{{$posts->age}}" required="" id="age" name="age" placeholder="Enter Age">  
    </div>

   <div class="form-group">
        <label for="color">Color</label>
        <input  type="text" class="form-control" required="" value="{{$posts->color}}" id="color" name="color" placeholder="Enter Color of Pet">  
   </div>
   
  <div class="form-group">
    <label for="discription">Description</label> 
    <textarea class="form-control" type="text"  id="discription"  name="discription" placeholder="Enter Post Discription" rows="3">{{$posts->description}}</textarea>
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
    <label for="petsub_category">Sub Category</label>
    <select class="form-control" id="petsub_category"  required="" name="petsub_category"> 
    </select>
    </div>
 
 

  <div class="form-group">
    <label for="qty">Post Image</label><br>

     <img src="{{ asset('images/posts/' . $posts->image) }}" class="img-resposive"  width="100px" height="100px" />

    <input type="hidden" name="old_img" value="{{$posts->image}}">
    <input type="file" class="form-control" id="image"  name="image">  
  </div>

   <div class="form-group images_wrapper">
   <span>To Add More Images</span>   <a href="javascript:void(0);" class="add_image btn btn-info" title="Add field">Add</a><br>
   <label for="size">Other Images </label>
   <input type="hidden" name="old_imgs" value="{{$images}}}" >
    @foreach($images as $img)
     <div id="{{$img->id}}"> 
     <img src="{{ asset('images/posts/'. $img->name) }}"  class="img-resposive"  width="100px" height="100px" />
   
    </div><br>
     @endforeach
   <div> <input type="file" class="form-control" id="other_images"  name="other_images[]"></div><br>
  </div>

  
  <div class="form-group">
        <div class="row">
            <div class="col-md-6">
            <label for="price">Price</label>
            <input  type="number" class="form-control" value="{{$posts->price}}" required="" id="price" name="price" placeholder="Enter Product buy price">
            </div>

           
        </div> 
  </div>
 
 
    
 
<div class="form-group">
  
    <div class="row">
       
        <div class="col-md-3"  > 
            <label><input type="checkbox" name="hypoallergenic" value="hypoallergenic"  @if($posts->hypoallergenic == "yes") checked @endif> Hypoallergenic</label>
        </div>

        <div class="col-md-3"  > 
            <label><input type="checkbox" name="housetrain" value="housetrain"  @if($posts->housetrain == "yes") checked @endif> House Trained</label>
        </div>

        <div class="col-md-3"  > 
            <label><input type="checkbox" name="declawed" value="declawed"  @if($posts->declawed == "yes") checked @endif> Declawed</label>
        </div>

         <div class="col-md-3"  > 
            <label><input type="checkbox" name="specialdiet" value="specialdiet"  @if($posts->specialdiet == "yes") checked @endif> Special Diet </label>
        </div>


    </div> 
</div>

<div class="form-group">
  
    <div class="row">
       
       

        <div class="col-md-3"  > 
            <label><input type="checkbox" name="like_to_lap" value="like_to_lap"  @if($posts->like_to_lap == "yes") checked @endif> Like To Lap</label>
        </div>

        <div class="col-md-3"  > 
            <label><input type="checkbox" name="specialneed" value="specialneed"  @if($posts->specialneed == "yes") checked @endif>Special Need</label>
        </div>

        <div class="col-md-3"  > 
            <label><input type="checkbox" name="medical" value="medical"  @if($posts->medical == "yes") checked @endif>Medical</label>
        </div>

         <div class="col-md-3"> 
            <label><input type="checkbox" name="vaccinated" value="vaccinated" @if($posts->vaccinated == "yes") checked @endif>Vaccinated </label>
        </div>


    </div> 
</div>

<div class="form-group">
  
    <div class="row">  
       <div class="col-md-3">
            <label><input type="checkbox" name="neutered" value="neutered" @if($posts->neutered == "yes") checked @endif>Neutered </label>
        </div>

        <div class="col-md-3"> 
            <label><input type="checkbox" name="highrisk" value="highrisk"   @if($posts->highrisk == "yes") checked @endif>High Risk</label>
        </div>   
    </div> 
</div>


  <input type="hidden" name="status" value="Request">

  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary" form="Form1">Submit</button>
</form>
  
@endif

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
        var ajaxurl = '{{route('petsub_category', ':id')}}';
        $('#petsub_category').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $data = $(data); 
            console.log($data);
            for(var i=0 ; i< data.length ; i++) {
              $('<option value="'+data[i]['id'] +'">'+ data[i]['name'] +'</option>').appendTo('#petsub_category');
            } 
        }   
    });
 });

   $("#del_img").click(function () {
    console.log("clicked");
        var id = $(this).val();
        // var ajaxurl = '{{route('del_img', ':id')}}';
       
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $('#sub_category').empty(); 
        }   
    });
 });

});
</script>
<script type="text/javascript">
  function delete_img(id){
    if (confirm('Are you sure you want to delete?')) {
    var imgid = '#'+id;

    var ajaxurl = "/del_img/"+id;
     $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            console.log("success");
            $(imgid).remove(); 
        }   
    });
     
     }
   } 
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