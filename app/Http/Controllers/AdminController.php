<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Postimage; 
use App\Petcategory;
use App\petsubcategory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     
     public function index()
    {
        $user_id = auth::user()->id;
        $posts = Post::all();
        return view('admin.post.allposts',compact("posts",$posts));
    }

    public function del_img($id){
        $Image = Postimage::find($id);
        $Image->delete();
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);

    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete(); 
        return redirect()->route('post_admin')->with('success','Post Deleted successfully!'); ; 
    }

    public function requested_posts()
    {  
        $posts = Post::where('status', "Request")->get(); 
        return view("admin.post.allposts",compact("posts",$posts));
    }

     public function accepted_posts()
    {  
        $posts = Post::where('status', "Complete")->get(); 
        return view("admin.post.acceptedpost",compact("posts",$posts));
    }

     public function rejected_posts()
    {  
        $posts = Post::where('status', "Rejected")->get(); 
        return view("admin.post.rejectedpost",compact("posts",$posts));
    }


    public function accept_post(Request $request, $id)
    { 
        $post = Post::find($id); 
        $post->status = "Complete";    
        $post->update();
        return redirect()->back();
    }

    public function reject_post(Request $request, $id)
    { 
        $post = Post::find($id); 
        $post->status = "Rejected";    
        $post->update();
        return redirect()->back();
    }

     public function del_postss($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

}
