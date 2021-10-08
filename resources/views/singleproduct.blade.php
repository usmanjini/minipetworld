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
               <h2>Product Details</h2>
               <ul>
                  <li><a href="{{route('home')}}">home</a></li>
                  <li class="active">Product Details</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="shop-area pt-95 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="product-details-img">
                     <img id="zoompro" src="{{ asset('images/products/' . $product->image)}}" data-zoom-image="{{ asset('images/products/' . $product->image)}}" alt="zoom"/>

                     <div id="gallery" class="mt-12 product-dec-slider owl-carousel"> 
                      
                     @php $images = \App\Image::where('product_id',$product->id)->get() @endphp
                       @foreach($images as $img)
                      <a data-image="{{ asset('images/products/thumbnails/'. $img->name) }}" data-zoom-image="{{ asset('images/products/thumbnails/'. $img->name) }}">
                      <img src="{{ asset('images/products/thumbnails/'. $img->name) }}" alt=""></a>   @endforeach
                    </div>
                  

                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="product-details-content">
                     <h2>{{$product->name}}</h2>
                     <div class="product-price"><span class="new">Rs {{$product->price}}</span> </div> <br>
                     <p><span><b>Detail</b></span><br>
          {{$product->description}}</p>

                      <form action="{{route('add_to_cart')}}" method="Post">

                     <div class="quality-wrapper mt-30 product-quantity">
                        <label>Qty:</label>
                        <div class="cart-plus-minus">
                         <!--  <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2"> -->
                        <input type="number" name="product_quantity" id="product_quantity" class="cart-plus-minus-box" value="1" min="1" max="10" step="1" data-decimals="0" required>
                      </div>
                     </div>
                     <div class="product-list-action">
                        <div class="product-list-action-left">
                          

                             <input type="hidden" name="product_id" id ="id" value="{{$product->id}}">
                            <input type="hidden" name="Product_name" id="name" value="{{$product->name}}"> 
                            <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">  

                            <button style="background-color: #7e4c4f; border-color: #7e4c4f; border-radius: 10px; padding: 4%;" type="submit"    class="btn-product btn-cart"><i class="ion-bag"></i> Add To Cart</button> 

                              
                          </form>  


                        </div>
                         
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="description-review-area pb-100">
         <div class="container">
            <div class="description-review-wrapper gray-bg pt-40">
               <div class="description-review-topbar nav text-center">
                <a  data-toggle="tab" id="des-details1" href="#des-details1" role="tab" aria-controls="des-details1" aria-selected="true">MORE FEATURES AND TERMS & CONDITIONS</a> 
              </div>

               <div class="tab-content description-review-bottom">

                  <div id="des-details1" class="tab-pane active" role="tabpanel" aria-labelledby="des-details1">
                     <div class="product-description-wrapper">
                        <p>{{$product->features}}</p>
                        <p>{{$product->terms_conditions}}</p> 
                        
                     </div>
                  </div>
                
 
               </div>
            </div>
         </div>
      </div>


      <div class="related-product-area pt-95 pb-80 gray-bg">
         <div class="container">
            <div class="section-title text-center mb-55">
               <h4>Most Populer</h4>
               <h2>Related Products</h2>
            </div>


            <div class="related-product-active owl-carousel">


              @php $products = \App\Product::where('sub_category_id',$product->sub_category_id)->get() @endphp
                  @foreach($products as $key => $product)

               <div class="product-wrapper">
                  <div class="product-img">
                     <a href="{{route('productbyid',$product->id)}}">
                      <img src="{{ asset('images/products/' . $product->image)}}" alt=""></a>
                     
                      <div class="product-action"> 
                        <form action="{{route('add_to_cart')}}" method="Post"> 
                          <input type="hidden" name="product_id" id ="id" value="{{$product->id}}">
                          <input type="hidden" name="Product_name" id="name" value="{{$product->name}}">  
                          <input type="hidden" name="product_quantity" id="name" value="1"> 
                          <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">  
                          <a title="Add To Cart" > <button type="submit" style="border-radius: 5px; background-color: white;"  class="btn-product btn-cart"><i class="ti-shopping-cart"></i></button></a>    
                        </form>   
                      </div>

                     <div class="product-action-wishlist"><a title="Wishlist" href="#"><i class="ti-heart"></i></a></div>
                  </div>
                  <div class="product-content">
                     <h4><a href="{{route('productbyid',$product->id)}}">{{$product->name}}</a></h4>
                     <div class="product-price"><span class="new">${{$product->price}}</span></div>
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