<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

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
    public function categories(){
        return view('admin.categories');
    }
    public function media(){
        return view('admin.media');
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
        return view('admin.tags');
    }
    public function admins(){
        return view('admin.admins');
    }
    public function create_post(){
        return view('admin.create_post');
    }
    public function store_post(){

        // print_r($_POST);
        // exit;
        $post = new Post();
        $post->title = request('post_title');
        $post->author = "alaa";
        $post->category = request("category");
        $post->views = 0;
        //get the image
        //Stores the filename as it was on the client computer.
        $imagename = $_FILES['post_img']['name'];
        //Stores the filetype e.g image/jpeg
        $imagetype = $_FILES['post_img']['type'];
        //Stores any error codes from the upload.
        $imageerror = $_FILES['post_img']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $imagetemp = $_FILES['post_img']['tmp_name'];
        //The path you wish to upload the image to
        $imagePath = "C:\Users\Alaa\Documents\laravel\blogger\public\imgs\\";

        if(is_uploaded_file($imagetemp)) {
            if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                //it's ok
            }
            else {
                echo "Failed to move your image.";
            }
        }
        else {
            echo "Failed to upload your image.";
        }
        $post->img = $imagename;
        var_dump(request("category"));
        var_dump(request("states[]"));
        $post->tags = 4;
        $post->content = request("editor1");

        // $post->save();

        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.posts', ["posts"=> $posts]);
    }
}
