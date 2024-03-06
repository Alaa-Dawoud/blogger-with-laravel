@php
    use App\Models\Comment;
@endphp
@extends('layouts.admin')

@section('title')
    {{ 'All Posts' }}
@endsection

@section('content')
<h3>
    Posts
</h3>
<h4><a href="{{ '/blog/admin/posts/add' }}" class="btn btn-primary">New Post</a></h4>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">CATEGORY</th>
        <th scope="col">COMMENTS</th>
        <th scope="col">VIEWS</th>
        <th scope="col">CREATED DATE</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr class="table-light">
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td>{{$post->category}}</td>
                <td>
                    @php
                        $num_comments = count(Comment::where("post_id",$post->id)->get());
                    @endphp
                    {{$num_comments}}

                </td>
                <td>{{$post->views}}</td>
                <td>{{$post->created_at}}</td>  
            </tr>
        @endforeach
    </tbody>
</table>
@endsection