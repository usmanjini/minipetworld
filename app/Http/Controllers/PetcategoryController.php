<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Petcategory;
use App\petsubcategory;
use App\Product;


class PetcategoryController extends Controller
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
        $category = Petcategory::all()->sortBy('sequence');
        $subcategory = petsubcategory::all()->sortBy('sequence');
        // $sld=json_decode($categoryslider);
        return view('admin.petcategories.allcats',compact("category","subcategory",$category,$subcategory));
    }
    public function petsub_category($id)
    {
        $data = petsubcategory::where('category_id',$id)->get()->sortBy('sequence');
        // $data = petsubcategory::find($id)->petsubcategory;   
        // dd($data);die();
        return $data;
    }
    public function view_subcat($id){
        // $subcategory = Petcategory::find($id)->subcategory;
        $subcategory = petsubcategory::where('category_id',$id)->get()->sortBy('sequence');
        return view('admin.petcategories.subcats',compact("subcategory","id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petcategories.new');
    }
    public function new_subcat($id){
        return view('admin.petcategories.new_subcat',compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store_subcat(Request $request){
         
        $petsubcategory = new petsubcategory;
         
        $petsubcategory->name = $request->names; 
        $petsubcategory->category_id = $request->catid;
        $petsubcategory->description = $request->descriptions;

         $max_order = petsubcategory::max('sequence');
         if($max_order){$petsubcategory->sequence = ++$max_order;}
         else{$petsubcategory->sequence = 01;}

        $file = $request->file('image');
        $destinationPath = 'images/petsubcats/';
        $petsubcategory->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
        $petsubcategory->save();       
                
                
        // $subcat =  $subcategory->description;
        // print_r( $subcat);die;  

           
         $catid = $request->catid; 
         $subcategory = petsubcategory::where('category_id',$catid)->get()->sortBy('sequence');
 		 $id = $catid;

        
        return view('admin.petcategories.subcats',compact("subcategory","id"));
    } 
    public function store(Request $request)
    {
 
        $Category = new Petcategory;

        $Category->name = $request->name;
        $Category->description = $request->description;
        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/petcats/';
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
         
        $max_order = Petcategory::max('sequence');
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
                $subcategory = new petsubcategory;
                $subcategory->name = $key; 
                $max_order = petsubcategory::max('sequence');
                if($max_order){$subcategory->sequence = ++$max_order;}
                else{$subcategory->sequence = 01;}
                $destinationPath = 'images/petsubcats/';
                // $img = $image->file($key);
                $subcategory->image = $image->getClientOriginalName();
                $image->move($destinationPath,$image->getClientOriginalName());
                $subcategory->category_id = $category_id;
                $subcategory->description=$descriptions;
                $subcategory->save();
                 
            } 

         
        return redirect()->route('petcategories');
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
        $category = Petcategory::find($id);
        $subcategry = Petcategory::find($id)->subcategory;
        return view('admin.petcategories.edit', compact("category","subcategry"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function subcat_edit($catid,$id){
         $subcategry = petsubcategory::find($id);
          return view('admin.petcategories.edit_subcat', compact("subcategry","catid"));
     }
     
     public function update_subcat(Request $request,$id){
           // return $request;die;
        $subcategory = petsubcategory::find($id);

        $subcategory->name = $request->name;
        
        $file = $request->file('image');
        if(empty($file)){
           $subcategory->image = $request->old_img; 
        }else{
            $destinationPath = 'images/petsubcats/';
            $subcategory->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $subcategory->description = $request->descriptions;
        $subcategory->update();
        $id = $request->catid; 
        $subcategory = petsubcategory::where('category_id',$id)->get()->sortBy('sequence');
        return view('admin.petcategories.subcats',compact("subcategory","id"));
     }
    public function update(Request $request, $id)
    {
        // return $request;die;
        $Category = Petcategory::find($id);

        $Category->name = $request->name;
        $Category->description = $request->description;
        
        $file = $request->file('image');
        if(empty($file)){
           $Category->image = $request->old_img; 
        }else{
            $destinationPath = 'images/petsubcats/';
            $Category->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $Category->update();
         return redirect()->route('petcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        petsubcategory::where('category_id',$id)->delete();
        $Category = Petcategory::find($id);
        $Category->delete();
        return redirect()->route('petcategories');
    }

    public function del_subcat($catid,$id){

    	$var=$id;
    	// dd($var);die();
        $subcat = petsubcategory::find($id);
        $subcat->delete(); 
        $subcategory = petsubcategory::where('category_id',$catid)->get()->sortBy('sequence');
        $id= $catid;
        return view('admin.petcategories.subcats',compact("subcategory","id"));
    }
    public function sort_petcategory(Request $request){
        // return $request;
        $categories = $request->data;
        $i = 0;
        foreach ($categories as  $id) {
            $category = Petcategory::find($id);
            $category->sequence  = $i;
            $category->update();
            $i++;
        }


    }
     public function sort_petsubcategory(Request $request){
        // return $request;
        $subcategories = $request->data;
        $i = 0;
        foreach ($subcategories as  $id) {
            $subcategory = petsubcategory::find($id);
            $subcategory->sequence  = $i;
            $subcategory->update();
            $i++;
        }
    }
}
