@extends('layouts.admin')

@section('title')
    {{ 'Pending Comments' }}
@endsection

@section('content')
<h3>
    Pending Comments
</h3>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">COMMENT</th>
        <th scope="col">NAME</th>
        <th scope="col">EMAIL</th>
        <th scope="col">CREATED DATE</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr class="table-light">
                <td>{{$comment->id}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->name}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    <form action="/blog/admin/comments" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value={{$comment->id}}>
                        <button class="btn btn-success" name="action" value="accept">Accept</button>
                        <button class="btn btn-danger" name="action" value="reject">Reject</button>
                    </form>
                </td>  
            </tr>
        @endforeach
    </tbody>
</table>
@endsection