<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Postimage; 
use App\Petcategory;
use App\petsubcategory;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
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
        $posts = Post::where('user_id', $user_id)->get();
        return view('user.post.allposts',compact("posts",$posts));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Petcategory::all();
        return view('user.post.new',compact('category',$category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $value=Auth::user()->name;
        // $id=Auth::user()->id;
        // dd($id);

        $post = new Post; 
        $post->name = $request->name;
        $post->breed = $request->breed;
        $post->slug = $request->name;
        $post->phone = $request->phone; 
        $post->location = $request->location; 
        $post->description = $request->discription; 
        $post->age= $request->age; 
        $post->user_id=auth::user()->id;
        $post->gender= $request->gender;    
        $post->petfor= $request->petfor; 
        $post->group= $request->group;
        $post->petcategory_id = $request->category;
        $post->sub_petcategory_id = $request->petsub_category;  
        $post->price = $request->price; 
        $post->color = $request->color; 
        $post->status = $request->status;

        
        if($request->has('feature')){
            $post->feature = 1;
        }else{
            $post->feature = 0;
        }

          if($request->has('new_product')){
            $post->new_product = 1;
        }else{
            $post->new_product = 0; 
        }
 


        if($request->has('hypoallergenic')){
            $post->hypoallergenic = "yes";
        }else{
            $post->hypoallergenic = "No"; 
        }

          if($request->has('housetrain')){
            $post->housetrain = "yes";
        }else{
            $post->housetrain = "No"; 
        }

          if($request->has('declawed')){
            $post->declawed = "yes";
        }else{
            $post->declawed = "No"; 
        }

          if($request->has('specialdiet')){
            $post->specialdiet = "yes";
        }else{
            $post->specialdiet = "No"; 
        }

          if($request->has('like_to_lap')){
            $post->like_to_lap = "yes";
        }else{
            $post->like_to_lap = "No"; 
        }

          if($request->has('specialneed')){
            $post->specialneed = "yes";
        }else{
            $post->specialneed = "No"; 
        }

          if($request->has('medical')){
            $post->medical = "yes";
        }else{
            $post->medical = "No"; 
        }

          if($request->has('neutered')){
            $post->neutered = "yes";
        }else{
            $post->neutered = "No"; 
        }

          if($request->has('vaccinated')){
            $post->vaccinated = "yes";
        }else{
            $post->vaccinated = "No"; 
        }

          if($request->has('highrisk')){
            $post->highrisk = "yes";
        }else{
            $post->highrisk = "No"; 
        }
  
 

        $max_order = Post::max('sequence');
        if($max_order){$post->sequence = ++$max_order;}
        else{$post->sequence = 01;}

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/posts';
        // $fname = $file->getClientOriginalName();
        $fname = date('YmdHis',time()).mt_rand().'.jpg';
        // $destinationPathumb = 'images/posts/thumbnails';
        // $this->img_resize( $file , 600 , $destinationPathumb ,$fname);
        $file->move($destinationPath,$fname);

        $post->image = $fname;


        $post->save();
        $post_id = $post->id;
 

        if($request->has('other_images')){

            foreach($request->file('other_images') as $image)
            {
                //get image name 
                
                $name = date('YmdHis',time()).mt_rand().'.jpg';
                
                
                // create multiple sizes
                
                // $destinationPathumb = 'images/posts/thumbnails';
                // $this->img_resize( $image , 600 , $destinationPathumb ,$name);


                // $name=$image->getClientOriginalName();
                $image->move('images/posts/', $name);  

                $images = new Postimage;
                $images->name= $name;
                $images->post_id = $post_id;
                $images->save();
                 
            }
        }
            return redirect()->route('postss')->with('success','Post Created successfully!'); 
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Post::where('id', $id)->first();
        return view('user.post.product', compact("product",$product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pid)
    { 
        $images = Postimage::where('post_id', $pid)->get(); 
        $posts = Post::where('id', $pid)->first();
         $category = Petcategory::all();
        // print_r($sizes);die;
        // return view('admin.products.editproduct')->with("product","category","sizes","images",
        //     $product,$category,$sizes,$images);
        return view('user.post.edit',compact("posts","category", "images"));
    }

    public function hh($pid){
        $product_id = $pid;
        return view('user.post.edit');
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
        
        $post = Post::find($id);
        $post->name = $request->name;
        $post->breed = $request->breed;
        $post->slug = $request->name;
        $post->phone = $request->phone; 
        $post->location = $request->location; 
        $post->description = $request->discription; 
        $post->age= $request->age; 
        $post->user_id=auth::user()->id;
        $post->gender= $request->gender;
        $post->petfor= $request->petfor; 
        $post->group= $request->group;
        $post->petcategory_id = $request->category;
        $post->sub_petcategory_id = $request->petsub_category;  
        $post->price = $request->price; 
        $post->color = $request->color; 
        $post->status = $request->status; 

        
        if($request->has('feature')){
            $post->feature = 1;
        }else{
            $post->feature = 0;
        }

          if($request->has('new_product')){
            $post->new_product = 1;
        }else{
            $post->new_product = 0; 
        }

        

        if($request->has('hypoallergenic')){
            $post->hypoallergenic = "yes";
        }else{
            $post->hypoallergenic = "No"; 
        }

          if($request->has('housetrain')){
            $post->housetrain = "yes";
        }else{
            $post->housetrain = "No"; 
        }

          if($request->has('declawed')){
            $post->declawed = "yes";
        }else{
            $post->declawed = "No"; 
        }

          if($request->has('specialdiet')){
            $post->specialdiet = "yes";
        }else{
            $post->specialdiet = "No"; 
        }

          if($request->has('like_to_lap')){
            $post->like_to_lap = "yes";
        }else{
            $post->like_to_lap = "No"; 
        }

          if($request->has('specialneed')){
            $post->specialneed = "yes";
        }else{
            $post->specialneed = "No"; 
        }

          if($request->has('medical')){
            $post->medical = "yes";
        }else{
            $post->medical = "No"; 
        }

          if($request->has('neutered')){
            $post->neutered = "yes";
        }else{
            $post->neutered = "No"; 
        }

          if($request->has('vaccinated')){
            $post->vaccinated = "yes";
        }else{
            $post->vaccinated = "No"; 
        }

          if($request->has('highrisk')){
            $post->highrisk = "yes";
        }else{
            $post->highrisk = "No"; 
        }
   

        $max_order = Post::max('sequence');
        if($max_order){$post->sequence = ++$max_order;}
        else{$post->sequence = 01;}

        $file = $request->file('image');
        // return $request->old_img;
        if(empty($file)){
           $post->image = $request->old_img; 
        }else{

        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/posts';
        // $fname = $file->getClientOriginalName();
        $fname = date('YmdHis',time()).mt_rand().'.jpg';
        // $destinationPathumb = 'images/posts/thumbnails';
        // $this->img_resize( $file , 600 , $destinationPathumb ,$fname);
        $file->move($destinationPath,$fname); 
        $post->image = $fname;
        }

        $post->update();
        $post_id = $post->id;
 

        if($request->has('other_images')){

            foreach($request->file('other_images') as $image)
            {
                //get image name 
                
                $name = date('YmdHis',time()).mt_rand().'.jpg';
                
                
                // create multiple sizes
                
                // $destinationPathumb = 'images/posts/thumbnails';
                // $this->img_resize( $image , 600 , $destinationPathumb ,$name);


                // $name=$image->getClientOriginalName();
                $image->move('images/posts/', $name);  

                $images = new Postimage;
                $images->name= $name;
                $images->post_id = $post_id;
                $images->update();
                 
            }
        }
             return redirect()->route('postss')->with('success','Post updated successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        return redirect()->route('postss')->with('success','Products Deleted successfully!'); ; 
    }
  

     public function post_by_subcategory($id){ 
      $posts = Post::where('sub_petcategory_id',$id)->orderBy('sequence','asc')->paginate(12);
        $catname = petsubcategory::select('name')->where('id',$id)->first();
        return view('posts',compact('posts','posts')); 
    }

    public function postbyid($id){
        $post = Post::find($id);
        return view('post',compact('post')); 
    } 

    public function sort_posts(Request $request){
        $posts = $request->data;
        $i = 0;
        foreach ($posts as  $id) {
            $post = post::find($id);
            $post->sequence  = $i;
            $post->update();
            $i++;
        }
    }


    function img_resize( $tmpname, $size, $save_dir, $save_name, $maxisheight = 0 )
    {
    $save_dir     .= ( substr($save_dir,-1) != "/") ? "/" : "";
    $gis        = getimagesize($tmpname);
    $type        = $gis[2];
    switch($type)
        {
        case "1": $imorig = imagecreatefromgif($tmpname); break;
        case "2": $imorig = imagecreatefromjpeg($tmpname);break;
        case "3": $imorig = imagecreatefrompng($tmpname); break;
        default:  $imorig = imagecreatefromjpeg($tmpname);
        }

        $x = imagesx($imorig);
        $y = imagesy($imorig);
        
        $woh = (!$maxisheight)? $gis[0] : $gis[1] ;    
        
        if($woh <= $size)
        {
        $aw = $x;
        $ah = $y;
        }
            else
        {
            if(!$maxisheight){
                $aw = $size;
                $ah = $size * $y / $x;
            } else {
                $aw = $size * $x / $y;
                $ah = $size;
            }
        }   
        $im = imagecreatetruecolor($aw,$ah);
    if (imagecopyresampled($im,$imorig , 0,0,0,0,$aw,$ah,$x,$y))
        if (imagejpeg($im, $save_dir.$save_name))
            return true;
            else
            return false;
    }
  
  
}
