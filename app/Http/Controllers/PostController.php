<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy("created_at","desc")->get();
        return view("posts.index", ["posts"=>$posts]);
    }
    public function show($post_url){
        //get the id from post_url until it reaches the first - in url
        $id = intval(substr($post_url,0,strpos($post_url,"-")));
        $post = Post::findOrFail($id);
        $post->increment("views");
        $comments = Comment::orderBy('created_at','desc')->where([["is_approved", 1],["post_id", $id]])->get();
        return view("posts.show", ["post"=>$post, "comments"=>$comments]);
    }
    public function store_comment($post_url){
        //get the id from post_url until it reaches the first - in url
        $id = intval(substr($post_url,0,strpos($post_url,"-")));
        $post = Post::findOrFail($id);
        $comment = new Comment();
        $comment->body = htmlspecialchars(request('user_comment'));
        $comment->name = htmlspecialchars(request('user_name'));
        $comment->email = htmlspecialchars(request('user_email'));
        if(filter_var($comment->email, FILTER_VALIDATE_EMAIL)===false){
            //failed
            echo 'Please use a valid email';
            $_SERVER['PHP_SELF'];
        }
        $comment->post_id = $id;
        $comment->is_approved = 0;
        $comment->save();
        $comments = Comment::orderBy('created_at','desc')->where([["is_approved", 1],["post_id", $id]])->get();
        return view("posts.show", ["post"=>$post, "comments"=>$comments]);
    }
}
