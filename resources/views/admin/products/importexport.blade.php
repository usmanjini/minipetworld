@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
       <ol class="breadcrumb">
					<li><a href="{{ route('productss') }}">Products</a></li>
					<li class="active">Import Export</li>
				</ol>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 <form  action="exportprodcucts" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <label for="copyfrom">Copy From</label>
    <select class="form-control" id="copyfrom" required="" name="copyfrom" onchange="validateCategory()">
      <option disabled="">Select</option>
      @foreach($subcats as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="copyto">Copy To</label>
    <select class="form-control" id="copyto" required="" name="copyto" onchange="validateCategory()">
      <option disabled="">Select</option>
      @foreach($subcats as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach
    </select>
    <span style="color:red;font-size: 12px;" id="error"> </span>
  </div>
  <div class="form-group">
    <label for="products">Products</label>
    <div id="products">
      
    </div>
    
  </div> 
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
  function validateCategory(){
    var copyfrom = document.getElementById("copyfrom");
    var copyto = document.getElementById("copyto");
    console.log(copyfrom.value);
    console.log(copyto.value);
    if(copyfrom.value != copyto.value) {
      console.log("condition true");
      copyto.setCustomValidity('');
      document.getElementById("error").innerHTML='';
      copyto.style.border = "2px solid green";
      copyfrom.style.border = "2px solid green";
      document.getElementById("products").style.display="block";
    } else {
      console.log("condition false");
      document.getElementById("products").style.display="none";
      copyto.setCustomValidity("You can't copy from same category!");
      document.getElementById("error").innerHTML="You can't copy from same category!";
       copyto.style.border = "2px solid red"; 
    }
  }
  
</script>
<script type="text/javascript">
$(document).ready(function () {

    $("#copyfrom").change(function () {
        var id = $(this).val();
        var ajaxurl = '{{route('producttocopy', ':id')}}';
        $('#products').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $data = $(data); 
            // console.log($data);
            if (!$.trim(data)){   
                 $('<p style="color:red;">No Products Found with this category</p>').appendTo('#products');}
            else{   
              
            for(var i=0 ; i< data.length ; i++) {
              $('<label><input name="products[]"  checked type="checkbox" value="'+data[i]['id'] +'">'+ '<img src="images/products/thumbnails/'+ data[i]['image']+'" style="width:100px; height:100px">'+data[i]['name'] +'</label><br>').appendTo('#products');
            } }
            
        }   
    });
 });

});
</script>


  
	
@endsection