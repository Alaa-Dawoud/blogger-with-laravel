<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    //
    private $num_posts;
    private $num_comments;
    public function __construct()
    {
        $this->num_posts = count(Post::all());
        $this->num_comments = count(Comment::all());
    }
    public function index(){
        return view('admin.index', ['num_posts'=> $this->num_posts,"num_comments"=> $this->num_comments]);
    }
    public function posts(){
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.posts', ["posts"=> $posts]);
    }
    public function create_post(){
        return view('admin.create_post');
    }
    public function store_post(Request $request){

        // print_r($_POST);
        // exit;
        $post = new Post();
        $post->title = request('post_title');
        $post->author = auth()->user()->name;
        $post->category = request("category");
        $post->views = 0;
        //get the image
        //Stores the filename as it was on the client computer.

        $request->validate([
            "post_img" =>['image']
        ]);
        $fileName = $request->file('post_img')->getClientOriginalName();
        // /storage/ for the public file like css public/storage/images/file.ext
        // php artisan storage:link
        $path = "/storage/".$request->file('post_img')->storeAs('images', $fileName, 'public');
        $post->img = $path;
        //assigning the tags
        if(is_null($request->input("tags"))){
            $post->tags=["0"];
        }else{
            $post->tags = $request->input("tags"); //request(states) not working instead $request->input("states") works fine 
            // check for every tag if it is not in database add to database
            foreach($request->input("tags") as $tag){
                $tag_exists = Tag::where("name", $tag)->exists();
                if(!$tag_exists){
                    // tag not exists then add it to database
                    $added_tag = new Tag();
                    $added_tag->name = $tag;
                    $added_tag->save();
                }
            } 
        
        }
        //assigning content
        $post->content = request("editor1");

        $post->save();

        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.posts', ["posts"=> $posts]);
    }
    public function categories(){
        $categories = Category::all();
        return view('admin.categories', ["categories"=>$categories]);
    }
    public function add_category(){
        $category = new Category();
        $category->name = request("category_name");
        $category->save();
        $categories = Category::all();
        return view('admin.categories', ["categories"=>$categories]);
    }
    public function media(){
        $posts = Post::orderBy('created_at','desc')->select(['img'])->get();
        return view('admin.media', ['posts'=>$posts]);
    }
    public function comments(){
        $comments = Comment::orderBy('created_at','desc')->where("is_approved", 0)->get();

        return view('admin.comments', ['comments'=>$comments]);
    }
    public function comments_action(){
        $action = request("action");
        $id = intval(request("comment_id"));
        if($action=="accept"){
            $comment = Comment::where("id", $id)->update(["is_approved"=>1]);
        }elseif($action=="reject"){
            $comment = Comment::where("id", $id)->get();
            $comment->each->delete();
        }
        $comments = Comment::orderBy('created_at','desc')->where("is_approved", 0)->get();

        return view('admin.comments', ['comments'=>$comments]);
    }
    public function tags(){
        $tags = Tag::all();
        return view('admin.tags', ['tags'=>$tags]);
    }
    public function admins(){
        $admins = Admin::all();
        return view('admin.admins', ['admins'=>$admins]);
    }
    public function store_admin(){
        $admin = new Admin();
        $admin->name = htmlentities(request("name"));
        $admin->permission = htmlentities(request("permission"));
        $password = Hash::make(request("password"));
        $admin->password = $password;
        $admin->save();
        $admins = Admin::all();
        return view('admin.admins', ['admins'=>$admins]);
    }
    
}
