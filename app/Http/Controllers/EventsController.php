<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
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
        $events = Event::all()->sortBy('sequence');
        return view("admin.events.allevents",compact("events",$events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.events.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
           $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images';
        $event->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $event->location = $request->location;
        $event->date_time = $request->datetime;
        
        $max_order = Event::max('sequence');

        if($max_order){$event->sequence = ++$max_order;}
        else{ $event->sequence = 01;}
        
        $event->save();
        return redirect()->route('eventss');

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
        $event = Event::where('id', $id)->first();
        return view('admin.events.editevent', compact("event",$event));
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
         

        $event = Event::find($id);

        $event->title = $request->title;
        $event->description = $request->description;

        // Get feature image
        $file = $request->file('image');
        if(empty($file)){
           $event->image = $request->old_img; 
        }else{
            $destinationPath = 'images';
            $event->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        // print_r($file);die;
        $event->location = $request->location;
        $event->date_time = $request->datetime;
        $event->update();
        return redirect()->route('eventss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('eventss');
    }
    public function sort_event(Request $request){
        // return $request;
        $events = $request->data;
        $i = 0;
        foreach ($events as  $id) {
            $event = Event::find($id);
            $event->sequence  = $i;
            $event->update();
            $i++;
        }
    }
}
