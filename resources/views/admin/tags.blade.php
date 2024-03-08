@extends('layouts.admin')

@section('title')
    {{ 'Tags' }}
@endsection

@section('content')
<h3>Tags</h3>
<h4>All Tags</h4>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr class="table-light">
                <td>{{$tag->name}}</td>
                <td>{{$tag->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection