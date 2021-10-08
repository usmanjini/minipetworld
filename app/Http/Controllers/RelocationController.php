<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Relocation;

class RelocationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    public function index()
    {   
    	$user_id = auth::user()->id;
        $centers = Relocation::where('user_id', $user_id)->get();
        return view("user.relocation.allrelocation",compact("centers",$centers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.relocation.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
         

        $relocation = new Relocation;

        $relocation->name = $request->name;
        $relocation->petname = $request->petname; 
        $relocation->petage = $request->age;
        $relocation->phone = $request->phone;
        $relocation->city = $request->city;
        $relocation->location = $request->location;
        $relocation->relocation = $request->relocation; 
        $relocation->user_id = auth::user()->id;
        $relocation->save();
        return redirect()->route('relocation');
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
        $relocation = Relocation::where('id', $id)->first();
        return view('user.relocation.edit', compact("relocation",$relocation));
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
         

        $relocation = Relocation::find($id);  

        $relocation->name = $request->name;
        $relocation->petname = $request->petname; 
        $relocation->petage = $request->age;
        $relocation->phone = $request->phone;
        $relocation->city = $request->city;
        $relocation->location = $request->location;
        $relocation->relocation = $request->relocation; 
        $relocation->user_id = auth::user()->id; 
 		
        $relocation->update();
        return redirect()->route('relocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relocation = Relocation::find($id);
        $relocation->delete();
        return redirect()->route('relocation');
    }
    public function sort_relocation(Request $request){
        // return $request;
        $relocations = $request->data;
        $i = 0;
        foreach ($relocations as  $id) {
            $relocation = Relocation::find($id);
            $relocation->sequence  = $i;
            $relocation->update();
            $i++;
        }
    }
}
