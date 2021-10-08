@extends('user.usermaster')

@section('title', 'Home')

@section('content')

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Relocation</h3>
                            <p class="text-subtitle text-muted">Complete all input fields for adding New Relocation.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.login')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Relocation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">For Add Relocation</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                  <form action="relocation/store" enctype="multipart/form-data" method="post">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" required="" id="name" name="name"class="form-control" placeholder="Enter Your Name">
                                    </div>

                                     <div class="form-group">
                                        <label for="petname">Pet Name</label>
                                        <input type="text" class="form-control" required="" id="petname" name="petname"class="form-control" placeholder="Enter Pet Name ">
                                    </div>

                                     <div class="form-group">
                                        <label for="age">Pet Age</label>
                                        <input type="text" class="form-control" required="" id="age" name="age"class="form-control" placeholder="Enter Pet title">
                                    </div>

                                     <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control" required="" id="phone" name="phone"class="form-control" placeholder="Enter You Phone No">
                                    </div>

                                     <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" required="" id="name" name="city"class="form-control" placeholder="Enter Your City Name">
                                    </div>

                                    

                                    <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text" class="form-control" id="location" required="" name="location" placeholder="Enter Location">  
                                    </div>


                                     <div class="form-group">
                                      <label for="relocation">ReLocation</label>
                                      <input type="text" class="form-control" id="relocation" required="" name="relocation" placeholder="Enter relocation">  
                                    </div>


 
                                    {{ csrf_field() }}
                                     <button type="submit" class="btn btn-primary">Submit</button>

                                     </div>

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
    var fieldHTML = '<div><input type="text" class="form-control" name="size[]" /><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
    	console.log("clicked");
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