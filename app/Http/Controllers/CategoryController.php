<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\subcategory;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
      * @return \Illuminate\Http\Response
     */
     public function __construct()
    { 
        // $this->middleware('auth');
    } 
    public function index()
    {
        $category = Category::all()->sortBy('sequence');;
        $subcategory = subcategory::all()->sortBy('sequence');
        // $sld=json_decode($categoryslider);
        return view('admin.categories.allcats',compact("category","subcategory",$category,$subcategory));
    }
    public function sub_category($id)
    {
        $data = Category::find($id)->subcategory;
        return $data;
    }
    public function view_subcat($id){
        // $subcategory = Category::find($id)->subcategory;
        $subcategory = subcategory::where('category_id',$id)->get()->sortBy('sequence');
        return view('admin.categories.subcats',compact("subcategory","id"));
    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.new');
    }
    public function new_subcat($id){
        return view('admin.categories.new_subcat',compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store_subcat(Request $request){
        
        // print_r( $request);die;
        $names = $request->names;
        $images= $request->images;
        $category_id = $request->catid;
        $descriptions = $request->descriptions;
        
        $values = array_combine($names, $images);
        // $subcat = array('images' => $values);
       
       
        // print_r( $subcat);die;
       

         foreach($values as $key => $image)
            {
                // return $image;die;
                $subcategory = new subcategory;
                $subcategory->name = $key;
                
                $max_order = subcategory::max('sequence');
                if($max_order){$subcategory->sequence = ++$max_order;}
                else{$subcategory->sequence = 01;}
                
                $destinationPath = 'images/cats/';
                // $img = $image->file($key);
                $subcategory->image = $image->getClientOriginalName();
                $image->move($destinationPath,$image->getClientOriginalName());
                $subcategory->category_id = $category_id;
                $subcategory->description = $descriptions;
                $subcategory->save();
                 
            } 
            $subcategory = Category::find($category_id)->subcategory;
            $id = $category_id;
        return view('admin.categories.subcats',compact("subcategory","id"));
    } 
    public function store(Request $request)
    {
        

        $Category = new Category;

        $Category->name = $request->name;
        $Category->description = $request->description;
        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/cats/';
        $Category->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
 
        //  $imagess = $request->file('sliderimage'); 
        //  $imgarry=[];
        //  foreach ($imagess as $image) {  
        //         $destinationPath = 'images/cats/';
        //         $filename = $image->getClientOriginalName();
        //         $image->move($destinationPath, $filename);
        //         array_push($imgarry, $filename);  
        //  } 

        //  $Category->slider = json_encode($imgarry);
         
        $max_order = Category::max('sequence');
        if($max_order){$Category->sequence = ++$max_order;}
        else{$Category->sequence = 01;}
        $Category->save();


        $category_id = $Category->id;

        $names = $request->names;
        $images= $request->images;
        $descriptions = $request->descriptions;

        $values = array_combine($names, $images);
        // $subcat = array('images' => $values);
       
       
        // print_r( $subcat);die;
       

         foreach($values as $key => $image)
            {
                // return $image;die;
                $subcategory = new subcategory;
                $subcategory->name = $key; 
                $max_order = subcategory::max('sequence');
                if($max_order){$subcategory->sequence = ++$max_order;}
                else{$subcategory->sequence = 01;}
                $destinationPath = 'images/cats/';
                // $img = $image->file($key);
                $subcategory->image = $image->getClientOriginalName();
                $image->move($destinationPath,$image->getClientOriginalName());
                $subcategory->category_id = $category_id;
                $subcategory->description=$descriptions;
                $subcategory->save();
                 
            } 

         
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $subcategry = Category::find($id)->subcategory;
        return view('admin.categories.edit', compact("category","subcategry"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function subcat_edit($catid,$id){
         $subcategry = subcategory::find($id);
          return view('admin.categories.edit_subcat', compact("subcategry","catid"));
     }
     
     public function update_subcat(Request $request,$id){
           // return $request;die;
        $subcategory = subcategory::find($id);

        $subcategory->name = $request->name;
        
        $file = $request->file('image');
        if(empty($file)){
           $subcategory->image = $request->old_img; 
        }else{
            $destinationPath = 'images/cats/';
            $subcategory->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $subcategory->description = $request->descriptions;
        $subcategory->update();
        $id = $request->catid;
        $subcategory = Category::find($id)->subcategory;
        return view('admin.categories.subcats',compact("subcategory","id"));
     }
    public function update(Request $request, $id)
    {
        // return $request;die;
        $Category = Category::find($id);

        $Category->name = $request->name;
        $Category->description = $request->description;
        
        $file = $request->file('image');
        if(empty($file)){
           $Category->image = $request->old_img; 
        }else{
            $destinationPath = 'images/cats/';
            $Category->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $Category->update();
         return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        subcategory::where('category_id',$id)->delete();
        $Category = Category::find($id);
        $Category->delete();
        return redirect()->route('categories');
    }

    public function del_subcat($catid,$id){
        $subcat = subcategory::find($id);
        $subcat->delete();
        $subcategory = Category::find($catid)->subcategory;
        $id= $catid;
        return view('admin.categories.subcats',compact("subcategory","id"));
    }
    public function sort_category(Request $request){
        // return $request;
        $categories = $request->data;
        $i = 0;
        foreach ($categories as  $id) {
            $category = category::find($id);
            $category->sequence  = $i;
            $category->update();
            $i++;
        }


    }
     public function sort_subcategory(Request $request){
        // return $request;
        $subcategories = $request->data;
        $i = 0;
        foreach ($subcategories as  $id) {
            $subcategory = subcategory::find($id);
            $subcategory->sequence  = $i;
            $subcategory->update();
            $i++;
        }
    }
}
