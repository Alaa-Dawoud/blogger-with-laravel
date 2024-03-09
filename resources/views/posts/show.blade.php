@extends('layouts.blog')

@section('title')
    {{$post->title}}
@endsection

@section('header')
<div class="blog-header">
    <h1 class="header">{{$post->title}}</h1>
</div>
@endsection

@section('content')
    <div class="container">
        @php
            $post_url = strval($post->id)."-". str_replace(" ","-",$post->title);
            $post_url = "/blog/".$post_url;
        @endphp
        
        <img src={{ asset($post->img) }} alt="post_img" width="700" height="400">
        <div style="margin-top: 15px;">
            <span>Author: {{$post->author}}  |  </span>
            <span>{{$post->created_at->format('d/m/Y')}}  |  </span>
            <span><svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                    {{$post->views}}  |  </span>
            <span>
                <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13,11H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm4-4H7A1,1,0,0,0,7,9H17a1,1,0,0,0,0-2Zm2-5H5A3,3,0,0,0,2,5V15a3,3,0,0,0,3,3H16.59l3.7,3.71A1,1,0,0,0,21,22a.84.84,0,0,0,.38-.08A1,1,0,0,0,22,21V5A3,3,0,0,0,19,2Zm1,16.59-2.29-2.3A1,1,0,0,0,17,16H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"/></svg>
                {{isset($comments)?count($comments):0}}
            </span>
        </div>
        <!-- we use {! html !} in blade to make browser compile html tags that came from ck editor-->
        <div style="margin-top: 15px;">{!! $post->content !!}</div>
        
        <hr>
    </div>
    <!--show comments here-->
    @if(isset($comments))
        <h2>Comments</h2>
        @foreach($comments as $comment)
            @php
                $post_url = strval($post->id)."-". str_replace(" ","-",$post->title);
                $post_url = "/blog/".$post_url; 
            @endphp
            <span>{{$comment->name}}</span>
            <span>{{$comment->created_at->format('d/m/Y')}}</span>
            <p>{{$comment->body}}</p>
            <hr>
        @endforeach
    @endif
    <!--form to get comments from users-->
    <form action={{$post_url}} method="POST">
        @csrf
        <fieldset>
            <legend>Add Comment: </legend>
            <div>
                <label class="col-form-label mt-4" for="inputDefault">Your Name:</label>
                <input type="text" name="user_name" class="form-control" placeholder="Enter your name" id="inputDefault" required>
            </div>
            <div>
                <label class="col-form-label mt-4" for="inputDefault">Your Email:</label>
                <input type="text" name="user_email" class="form-control" placeholder="Enter your email" id="inputDefault" required>
            </div>
            <div>
                <label for="exampleTextarea" class="form-label mt-4">Your comment:</label>
                <textarea class="form-control" name="user_comment" id="exampleTextarea" rows="3" placeholder="Add your comment here" required></textarea>
              </div>
    
            <button type="submit" class="btn btn-primary" style="margin: 20px 0px;">Add Comment</button>
        </fieldset>
    </form>
@endsection
