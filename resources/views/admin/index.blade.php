@extends('layouts.admin')

@section('title')
    {{ 'Dashboard' }}
@endsection

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Total Posts</th>
        <th scope="col">Total Comments</th>
        </tr>
    </thead>
    <tbody>
            <tr class="table-light">
                <td>{{ $num_posts }}</td>
                <td>{{ $num_comments }}</td>
            </tr>
    </tbody>
</table>
@endsection