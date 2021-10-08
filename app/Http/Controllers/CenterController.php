<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\Relocation;

class CenterController extends Controller
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
        $centers = Center::all()->sortBy('sequence');
        return view("admin.center.allcenter",compact("centers",$centers));
    }

     public function admin_relocation()
    {
        $centers = Relocation::all();
        return view("admin.relocation.allrelocation",compact("centers",$centers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.center.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
         

        $center = new Center;

        $center->name = $request->name;
        $center->phone = $request->phone;
        $center->description = $request->description;

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images';
        $center->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $center->location = $request->location; 
        
        $max_order = Center::max('sequence');

        if($max_order){$center->sequence = ++$max_order;}
        else{ $center->sequence = 01;}
        
        $center->save();
        return redirect()->route('centerss');

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
        $center = Center::where('id', $id)->first();
        return view('admin.center.editcenter', compact("center",$center));
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
         

        $center = Center::find($id);

        $center->name = $request->title;
        $center->phone = $request->phone;
        $center->description = $request->description;

        // Get feature image
        $file = $request->file('image');
        if(empty($file)){
           $center->image = $request->old_img; 
        }else{
            $destinationPath = 'images';
            $center->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        // print_r($file);die;
        $center->location = $request->location; 
        $center->update();
        return redirect()->route('centerss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $center = Center::find($id);
        $center->delete();
        return redirect()->route('centerss');
    }

    public function admin_del_relocation($id)
    {
        $relocation = Relocation::find($id);
        $relocation->delete();
        return redirect()->route('admin_relocation');
    }

    public function sort_center(Request $request){
        // return $request;
        $centers = $request->data;
        $i = 0;
        foreach ($centers as  $id) {
            $center = Center::find($id);
            $center->sequence  = $i;
            $center->update();
            $i++;
        }
    }
}
