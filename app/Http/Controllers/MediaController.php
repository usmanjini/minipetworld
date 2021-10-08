<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\media;
class MediaController extends Controller
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
        $medias = media::all()->sortBy('sequence');;
        return view('admin.media.allmedia',compact("medias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.media.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = new media;

        $media->title = $request->title;
        $media->link = $request->link;

        $max_order = media::max('sequence');

        if($max_order){$media->sequence = ++$max_order;}
        else{ $media->sequence = 01;}

        $media->save();
          
        return redirect()->route('medias');
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
        $media = media::where('id', $id)->first();
        return view('admin.media.edit',compact("media"));
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
        $media = media::find($id);

        $media->title = $request->title;
        $media->link = $request->link;  
        $media->update();
        return redirect()->route('medias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = media::find($id);
        $media->delete();
        return redirect()->route('medias');
    }
    public function sort_media(Request $request){
        // return $request;
        $medias = $request->data;
        $i = 0;
        foreach ($medias as  $id) {
            $media = media::find($id);
            $media->sequence  = $i;
            $media->update();
            $i++;
        }
    }
}
