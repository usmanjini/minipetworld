@extends('layouts.master')

@section('title', 'Home')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
  <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url('{{asset('assets/img/banner/banner-2.jpg')}}');">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>Post Details</h2>
               <ul>
                  <li><a href="{{route('home')}}">home</a></li>
                  <li class="active">Post Details</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="shop-area pt-95 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="product-details-img">
                     <img id="zoompro" src="{{ asset('images/posts/' . $post->image)}}" data-zoom-image="{{ asset('images/posts/' . $post->image)}}" alt="zoom"/>

                     <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                      @php $images = \App\Postimage::where('post_id',$post->id)->get() @endphp
                       @foreach($images as $img)
                      <a data-image="{{ asset('images/posts/'. $img->name) }}" data-zoom-image="{{ asset('images/posts/'. $img->name) }}">
                        <img src="{{ asset('images/posts/'. $img->name) }}" alt=""></a>
                      @endforeach

                     
                    </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="product-details-content" style="background-color: #f7f7f7; border: 1px solid #dddddd; border-radius: 5px; padding:10px; ">
                    <h3 style="color:red;"><b>Pet Features</b></h3> <br>
                     <h4 style="color:black;"><b style="padding-right: 20%;">Phone No </b> {{$post->phone}}</h4><br>

                     <h5 style="color:black;">
                      
                        <b style="padding-right: 20%;"><a href="{{$post->location}}">Click To Know Location</a> </b>
                      </h5><br>

                      <p><span style="padding-right: 20%;"><b>Pet Name</b></span>  {{$post->name}}</p><br> 
                      <p><span style="padding-right: 20%;"><b>Pet Breed</b></span>  {{$post->breed}}</p><br> 
                      <p><span style="padding-right: 20%;"><b>Pet Group</b></span>  {{$post->group}}</p><br> 
                      <p><span style="padding-right: 18%;"><b>Pet Gender</b></span>  {{$post->gender}}</p><br> 
                      <p><span style="padding-right: 23%;"><b>Pet Age</b></span>  {{$post->age}}</p><br> 
                      <p><span style="padding-right: 21%;"><b>Pet Color</b></span>  {{$post->color}}</p><br> 
                      <p><span style="padding-right: 24%;"><b>Pet For</b></span>  {{$post->petfor}}</p><br>
                      <p><span style="padding-right: 21%;"><b>Pet Price</b></span>   ${{$post->price}}</p><br> 
                      <p><span style="padding-right: 10%;"><b>Pet hypoallergenic</b></span>  {{$post->hypoallergenic}}</p><br> 
                      <p><span style="padding-right: 16%;"><b>Pet   housetrain</b></span>  {{$post->  housetrain}}</p><br> 
                      <p><span style="padding-right: 18%;"><b>Pet declawed</b></span>  {{$post->declawed}}</p><br> 
                      <p><span style="padding-right: 16%;"><b>Pet specialdiet</b></span>  {{$post->specialdiet}}</p><br> 
                      <p><span style="padding-right: 16%;"><b>Pet like_to_lap</b></span>  {{$post->like_to_lap}}</p><br> 
                      <p><span style="padding-right: 14%;"><b>Pet specialneed</b></span>  {{$post->specialneed}}</p><br> 
                      <p><span style="padding-right: 20%;"><b>Pet medical</b></span>  {{$post->medical}}</p><br> 
                      <p><span style="padding-right: 16%;"><b>Pet vaccinated</b></span>  {{$post->vaccinated}}</p><br> 
                      <p><span style="padding-right: 20%;"><b>Pet   highrisk</b></span>  {{$post->  highrisk}}</p><br>  
   
                  </div>
               </div>
            </div>
         </div>
      </div> 

      <div class="description-review-area pb-100">
         <div class="container">
            <div class="description-review-wrapper gray-bg pt-40">
               <div class="description-review-topbar nav text-center">
                <a  data-toggle="tab" id="des-details1" href="#des-details1" role="tab" aria-controls="des-details1" aria-selected="true">Description</a> 
              </div>

               <div class="tab-content description-review-bottom">

                  <div id="des-details1" class="tab-pane active" role="tabpanel" aria-labelledby="des-details1">
                     <div class="product-description-wrapper">
                        <p>{{$post->description}}</p>  
                     </div>
                </div>
                
 
               </div>
            </div>
         </div>
      </div>

      

      <div class="related-product-area pt-95 pb-80 gray-bg">
         <div class="container">
            <div class="section-title text-center mb-55">
               <h4>Sugested Posts</h4>
               <h2>Related Post</h2>
            </div>
            <div class="related-product-active owl-carousel">

              @php $posts = \App\Post::where('sub_petcategory_id',$post->sub_petcategory_id)->get() @endphp
                @foreach($posts as $key => $post)
               <div class="product-wrapper">
                  <div class="product-img">
                     <a href="{{route('postbyid',$post->id)}}"><img src="{{ asset('images/posts/' . $post->image)}}" alt=""></a>

                    
                  </div>
                  <div class="product-content">
                     <h4><a href="{{route('postbyid',$post->id)}}">{{$post->name}}</a></h4>
                     <div class="product-price"><span class="new">Rs {{$post->price}}</span></div>
                  </div>
               </div> 
               @endforeach
                
            </div>
         </div>
      </div>  

 @endsection

 @section('SpecificScripts')
   
 <!--    <script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script> 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>
    
    <script type="text/javascript" src="{{asset('assets/js/zoomminify.js')}}"></script>
     -->


    

 <script type="text/javascript"> 
function addFunction(id) {
var pid = 'cart'+id; 

var name = document.getElementById('name'+id).value;
var size = document.getElementById('size'+id).value;
var qty = document.getElementById('qty'+id).value;
document.getElementById('qty'+id).disabled = true;
document.getElementById('check'+id).style.visibility = 'hidden';
document.getElementById('uncheck'+id).style.visibility = 'visible';


var demodata = document.getElementById("demo").value; 
var demodata_array = [];
var data = [id,name,size,qty];
demodata_array.push(data);

if (demodata){
      demodata.push(data);
      document.getElementById("demo").value = demodata;
}else{
      document.getElementById("demo").value = demodata_array; 
}
var demo_data = document.getElementById("demo").value; 
console.log(demo_data);

}
// ------------------------------------------------------
 function delFunction(id){
  console.log(id)
  document.getElementById('qty'+id).disabled = false;
   var demo_data = document.getElementById("demo").value;
   document.getElementById('check'+id).style.visibility = 'visible';
   document.getElementById('uncheck'+id).style.visibility = 'hidden'; 
   // demo_data.filter(function(v,i) {  
   //  if ( v[i] == id) {
   //    v.splice(i,1);
   // }
   //  }); 
   for (var i = 0; i < demo_data.length; i++) {
  if (demo_data[i][0] == id) {
    demo_data.splice(i, 1);
  }
}

   document.getElementById("demo").value = demo_data; 
   console.log(demo_data);

 }
 function addToCart(){
  var data = document.getElementById("demo").value;
  var token = document.getElementById('token').value;
  
  var token_array = {"_token" : token};
  // data.push(token_array);
  data = {'data' : data , '_token' : token};
  console.log(data);
   $.ajax({
           type:'POST',
           url:'/add_to_cart',
           data:data,
           success:function(data){
            $data = $(data); 
            console.log($data);
             if(data){
              $('#showcart').empty();
        
             for (var key in data) {
             if (data.hasOwnProperty(key)) {
              // console.log(data[key]['options']['size']);
              // $('<tr style="color:black"><td>'+data[key]["name"]+'</td>'+'<td>'+data[key]["qty"]+'</td></tr>').appendTo('#showcart');
              $('<tr style="color:black"><td>'+data[key]["name"]+'</td><td>'+data[key]['options']['size']+'</td><td>'+data[key]["qty"]+'</td></tr>').appendTo('#showcart');
            }
          }
        }
         else{
                $('<h3>Your Cart is empty</h3>').appendTo('#showcart');;
             }
          $("#cartdata").modal('show');
          }
          ,error:function(){ 
        console.log(data);
        }
        });
  
 }
</script>

 @stop