@extends('layouts.admin')

@section('title')
    {{ 'Media' }}
@endsection

@section('content')
    <h3>Dashboard</h3>
    <div class="container" style="margin-bottom: 20px;">
        @foreach($posts as $post)
        <a href={{ asset($post->img) }} target="_blank"><img src={{ asset($post->img) }} alt="post_img" width="300" height="200"></a>
        @endforeach
    </div>
@endsection