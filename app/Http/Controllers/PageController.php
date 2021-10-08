<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page; 
use App\subcategory;

class PageController extends Controller
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
        $page = Page::all();
        return view('admin.page.allpage',compact("page",$page)); 
    }


    
    // public function pages($id){ 
    //     $page=Page::find($id);
    //     $data=About::where('id',$id)->get()->sortBy('sequence');
    //     return view('pages',compact("page",$data)); 
    // }

      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.new');
    }
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      
    public function store(Request $request)
    {
        

        $Page = new Page;

        $Page->name = $request->name;
        $Page->description = $request->description;
        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/page/';
        $Page->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        
        $Page->save();
 
         
        return redirect()->route('page');
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
        $page = Page::find($id); 
        return view('admin.page.edit', compact("page"));
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
        // return $request;die;
        $Page = Page::find($id);

        $Page->name = $request->name;
        $Page->description = $request->description;
        
        $file = $request->file('image');
        if(empty($file)){
           $Page->image = $request->old_img; 
        }else{
            $destinationPath = 'images/page/';
            $Page->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $Page->update();
         return redirect()->route('page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        subcategory::where('id',$id)->delete();
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('page');
    }

     
    public function sort_page(Request $request){
        // return $request;
        $page = $request->data;
        $i = 0;
        foreach ($page as  $id) {
            $page = Page::find($id);
            $page->sequence  = $i;
            $page->update();
            $i++;
        }


    } 
}
