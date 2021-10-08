@extends('admin.adminmaster')

@section('title', 'Home')

@section('content')
       <ol class="breadcrumb">
          <li><a href="{{ route('productss') }}">Products</a></li>
          <li class="active"><a href="{{ route('new_products') }}"> Edit</a></li>
        </ol>
        
  <div class="field_wrapper">

    <label for="size">Product Code & Size </label>
   
  @foreach($sizes as $size)
  <form action="{{route('update_size',$size->id)}}" method="post" id="form{{$size->id}}" style="margin-top:2%">
     <div>
     <div class="row">
         
     <form id="form_three" action="/">
            <!-- DUMMY FORM TO ALLOW BROWSER TO ACCEPT NESTED FORM -->
      </form>
         <div class="col-md-5">
           <input type="text" class="form-control " id="code" value="{{$size->code}}" form="form{{$size->id}}" name="code" required="" placeholder="p01 etc .."> 
         </div>
          <div class="col-md-5">
           <input type="text" class="form-control " id="size" value="{{$size->size_value}}" form="form{{$size->id}}" name="size" required="" placeholder="0.1 .."> 
           <input type="hidden" value="{{$size->id}}" name="size_id" form="form{{$size->id}}">
           <input type="hidden" name="_token" form="form{{$size->id}}" value="{{ csrf_token() }}">
           
         </div>
         <div class="col-md-2">
             <button type="submit" form="form{{$size->id}}" class="btn btn-primary">Save</button>
             
         </div>
                 
        
     </div> 
     </div>
   </form>
  @endforeach
  
  </div>

  
  
@endsection