<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
class BlogController extends Controller
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
        $blogs = blog::all()->sortBy('sequence');;
        return view('admin.blogs.allblogs',compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.blogs.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new blog;

        $blog->title = $request->title;
       
        $title = $request->title;
        $title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $title);
        if (strlen(trim($title)) > 0){
            $blog->slug = str_replace(' ','-',strtolower($title));
        }else{
            $blog->slug  = strtolower($title);
        }

        $blog->content = $request->editor1;

        $max_order = blog::max('sequence');
        if($max_order){$blog->sequence = ++$max_order;}
        else{$blog->sequence = 01;}

          // $lid = blog::all()->count();
          // $lid = $lid + 1;

        // Get feature image
        $file = $request->file('image');

        //for file unique name
        $file_name1 = $file->getClientOriginalName();
        $file_ext1 = $file->getClientOriginalExtension();
        $fileInfo1 = pathinfo($file_name1);
        $filename1 = $fileInfo1['filename']; 
        $newfilename=$filename1.time().".".$file_ext1;

        $destinationPath = 'images/blogs';
        $blog->image = $newfilename;
        $file->move($destinationPath,$newfilename);  
        $file2 = $request->file('homeimg');
        
        //for file unique name 
        // $file_name2 = $file2->getClientOriginalName();
        // $file_ext2 = $file2->getClientOriginalExtension();
        // $fileInfo2 = pathinfo($file_name2);
        // $filename2 = $fileInfo2['filename']; 
        // $newfilename2=$filename2.time().".".$file_ext2;

        // $destinationPath2 = 'images/blogs';
        // $blog->image2 = $newfilename2;
        // $file2->move($destinationPath2,$newfilename2);

        $blog->save();
          
        return redirect()->route('blogs');
    } 

    
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move('images/blogs/', $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/blogs/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;

        }

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
        $blog = blog::where('id', $id)->first();
        return view('admin.blogs.edit',compact("blog"));
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
       
        $blog = blog::find($id);
        $title = $request->title;
        $blog->title = $title;
        
        $title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $title);
        if (strlen(trim($title)) > 0){
            $blog->slug = str_replace(' ','-',strtolower($title));
        }else{
            $blog->slug  = strtolower($title);
        }

        $blog->content = $request->editor1;
        
        $file = $request->file('image');
        if(empty($file)){
           $blog->image = $request->old_img; 
        }else{
            $destinationPath = 'images/blogs';
            //for file unique name
            $file_name1 = $file->getClientOriginalName();
            $file_ext1 = $file->getClientOriginalExtension();
            $fileInfo1 = pathinfo($file_name1);
            $filename1 = $fileInfo1['filename']; 
            $newfilename=$filename1.time().".".$file_ext1;

            $blog->image = $newfilename;
            $file->move($destinationPath,$newfilename);
        }

       

        $blog->update();
        return redirect()->route('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $blog = blog::find($id);
        $blog->delete();
        return redirect()->route('blogs');
    }
    public function sort_blog(Request $request){
        // return $request;
        $blogs = $request->data;
        $i = 0;
        foreach ($blogs as  $id) {
            $blog = blog::find($id);
            $blog->sequence  = $i;
            $blog->update();
            $i++;
        }
    }
}
