<?php

namespace App\Http\Controllers;
use App\Product;
use App\Size;
use App\Image;
use App\Category;
use App\subcategory;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     

    public function index()
    {
        $products = Product::all()->sortBy('sequence');
        return view('admin.products.allproducts',compact("products",$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.new',compact('category',$category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $product = new Product; 
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->name;
        $product->description = $request->discription; 
        $product->terms_conditions= $request->terms_conditions;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category; 
        $product->features = $request->features;  
        $product->price = $request->price; 
        $product->qty = $request->prod_qty; 

        
        if($request->has('feature')){
            $product->feature = 1;
        }else{
            $product->feature = 0; 
        }
        if($request->has('new_product')){
            $product->new_product = 1;
        }else{
            $product->new_product = 0; 
        }

        if($request->has('status')){
            $product->status = 1;
        }else{
            $product->status = 0; 
        }

        $max_order = product::max('sequence');
        if($max_order){$product->sequence = ++$max_order;}
        else{$product->sequence = 01;}

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/products';
        // $fname = $file->getClientOriginalName();
        $fname = date('YmdHis',time()).mt_rand().'.jpg';
        $destinationPathumb = 'images/products/thumbnails';
        $this->img_resize( $file , 600 , $destinationPathumb ,$fname);
        $file->move($destinationPath,$fname);

        $product->image = $fname;


        $product->save();
        $product_id = $product->id;
 

        if($request->has('other_images')){

            foreach($request->file('other_images') as $image)
            {
                //get image name 
                
                $name = date('YmdHis',time()).mt_rand().'.jpg';
                
                
                // create multiple sizes
                
                $destinationPathumb = 'images/products/thumbnails';
                $this->img_resize( $image , 600 , $destinationPathumb ,$name);


                // $name=$image->getClientOriginalName();
                $image->move('images/products/', $name);  

                $images = new Image;
                $images->name= $name;
                $images->product_id = $product_id;
                $images->save();
                 
            }
        }
            return redirect()->route('productss')->with('success','Product Created successfully!'); 
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.products.product', compact("product",$product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pid)
    { 
        $images = Image::where('product_id', $pid)->get();
        $category = Category::all();
        $product = Product::where('id', $pid)->first();
        // print_r($sizes);die;
        // return view('admin.products.editproduct')->with("product","category","sizes","images",
        //     $product,$category,$sizes,$images);
        return view('admin.products.edit',compact("product","category", "images"));
    }

    public function hh($pid){
        $product_id = $pid;
        return view('admin.products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        
     
        $product = product::find($id);
         
         $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->name;
        $product->description = $request->discription;
        $product->terms_conditions= $request->terms_conditions;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category; 
        $product->features = $request->features; 
        
        $product->price = $request->price; 
        $product->qty = $request->prod_qty; 


        if($request->has('feature')){
            $product->feature = 1;
        }else{
            $product->feature = 0; 
        }
        if($request->has('new_product')){
            $product->new_product = 1;
        }else{
            $product->new_product = 0; 
        }

        if($request->has('status')){
            $product->status = 1;
        }else{
            $product->status = 0; 
        }

        $max_order = product::max('sequence');
        if($max_order){$product->sequence = ++$max_order;}
        else{$product->sequence = 01;}

        // Get feature image
        $file = $request->file('image');
        // return $request->old_img;
        if(empty($file)){
           $product->image = $request->old_img; 
        }else{
            $destinationPath = 'images/products';

            $fname = date('YmdHis',time()).mt_rand().'.jpg';
            $destinationPathumb = 'images/products/thumbnails';
            $this->img_resize( $image , 600 , $destinationPathumb ,$fname);
            $product->image = $fname;
            $file->move($destinationPath,$fname);
        }

        $product->update();
        $product_id = $product->id;
        
         if($request->has('other_images')){

            foreach($request->file('other_images') as $image)
            {
                //get image name 
                
                $name = date('YmdHis',time()).mt_rand().'.jpg';
                
                
                // create multiple sizes
                
                $destinationPathumb = 'images/products/thumbnails';
                $this->img_resize( $image , 600 , $destinationPathumb ,$name);


                // $name=$image->getClientOriginalName();
                $image->move('images/products/', $name);   
                $images = new Image;
                $images->name= $name;
                $images->product_id = $product_id;
                $images->save();
                 
            } 
        }
             return redirect()->route('productss')->with('success','Products updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function del_img($id){
        $Image = Image::find($id);
        $Image->delete();
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);

    }
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete(); 
        return redirect()->route('productss')->with('success','Products Deleted successfully!'); ; 
    }
     public function product_by_subcategory($id){
        $categories = Category::all()->sortBy('sequence');
        $category = subcategory::find($id);
        $products = product::where('sub_category_id',$id)->get()->sortBy('sequence');
        return view("admin.products.category_product",compact("products","categories","category"));
    }
    public function sort_products(Request $request){
        $products = $request->data;
        $i = 0;
        foreach ($products as  $id) {
            $product = product::find($id);
            $product->sequence  = $i;
            $product->update();
            $i++;
        }
    }


    function img_resize( $tmpname, $size, $save_dir, $save_name, $maxisheight = 0 )
    {
    $save_dir     .= ( substr($save_dir,-1) != "/") ? "/" : "";
    $gis        = getimagesize($tmpname);
    $type        = $gis[2];
    switch($type)
        {
        case "1": $imorig = imagecreatefromgif($tmpname); break;
        case "2": $imorig = imagecreatefromjpeg($tmpname);break;
        case "3": $imorig = imagecreatefrompng($tmpname); break;
        default:  $imorig = imagecreatefromjpeg($tmpname);
        }

        $x = imagesx($imorig);
        $y = imagesy($imorig);
        
        $woh = (!$maxisheight)? $gis[0] : $gis[1] ;    
        
        if($woh <= $size)
        {
        $aw = $x;
        $ah = $y;
        }
            else
        {
            if(!$maxisheight){
                $aw = $size;
                $ah = $size * $y / $x;
            } else {
                $aw = $size * $x / $y;
                $ah = $size;
            }
        }   
        $im = imagecreatetruecolor($aw,$ah);
    if (imagecopyresampled($im,$imorig , 0,0,0,0,$aw,$ah,$x,$y))
        if (imagejpeg($im, $save_dir.$save_name))
            return true;
            else
            return false;
    }
    public function importexport(){
        $subcats = subcategory::all();
        return view('admin.products.importexport',compact('subcats'));
    }
    public function producttocopy($id){
     $data = Product::where('sub_category',$id)->get();
     return $data;
    }

    public function exportprodcucts(Request $request){
        $copyfrom = $request->copyfrom;
        $subcategory_id = $request->copyto; //subcategory Id for products
        $subcategory = subcategory::find($subcategory_id);

        $category = Category::find($subcategory->category_id);
        $category_id  = $category->id; //Catgeoy Id for products

        $products = $request->products;
        foreach ($products as $key => $product) {
           $product =  product::find($product);
           $newproduct = new Product;
           $newproduct->name = $product->name;
           $newproduct->description = $product->description;
           $newproduct->category = $category_id; 
           $newproduct->sub_category = $subcategory_id;
           $newproduct->image = $product->image;
           $newproduct->feature = $product->feature;

           $max_order = product::max('sequence');
           if($max_order)
            {$newproduct->sequence = ++$max_order;}
           $newproduct->save();
           $new_prodcut_id = $newproduct->id;
           $product_id = $product->id; 
           $sizes = Product::find($product_id)->sizes;
          // return $sizes;
           
           foreach ($sizes as $size) {
            $siz = new Size;
            $siz->code = $size->code;
            $siz->size_value = $size->size_value;
            $siz->product_id = $new_prodcut_id;
            $siz->save();
           }
           $images = Product::find($product_id)->images;
           foreach ($images as $img) {
               $images = new Image;
               $images->name= $img->name;
               $images->product_id = $new_prodcut_id;
               $images->save();
           }
        }
     return redirect()->route('productss')->with('success','Product Created successfully!');
    }
}
