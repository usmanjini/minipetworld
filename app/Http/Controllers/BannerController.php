<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
class BannerController extends Controller
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
        $banners = banner::all()->sortBy('sequence');
        return view('admin.banners.allbanners',compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.banners.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new banner;

        $banner->caption = $request->caption;
        $max_order = banner::max('sequence');
        if($max_order){$banner->sequence = ++$max_order;}
        else{$banner->sequence = 01;}
        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/banners';  
        $banner->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
        $banner->save();
          
        return redirect()->route('banners');
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
        $banner = banner::where('id', $id)->first();
        return view('admin.banners.edit',compact("banner"));
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
        $banner = banner::find($id);

        $banner->caption = $request->caption;
        
        $file = $request->file('image');
        if(empty($file)){
           $banner->image = $request->old_img; 
        }else{
            $destinationPath = 'images/banners';
            $banner->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $banner->update();
        return redirect()->route('banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $banner = banner::find($id);
        $banner->delete();
        return redirect()->route('banners');
    }
    public function sort_banner(Request $request){
        // return $request;
        $banners = $request->data;
        $i = 0;
        foreach ($banners as  $id) {
            $banner = banner::find($id);
            $banner->sequence  = $i;
            $banner->update();
            $i++;
        }
    }
}
