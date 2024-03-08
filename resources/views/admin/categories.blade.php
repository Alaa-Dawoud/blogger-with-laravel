@extends('layouts.admin')

@section('title')
    {{ 'Categories' }}
@endsection

@section('content')
<h3>Categories</h3>
<h4>All Categories</h4>
<form action="/blog/admin/categories" method="POST">
    @csrf
    <div id="form" class="form">
        <h1 class="float-start">Category Name : </h1>
        <input type="text" name="category_name" class="form-control">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>

    <div id="form-bg" class="form-background" onclick="closeForm()"></div>
    <div id="button" class="btn btn-primary" onclick="openForm()">New Category</div>
</form>

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr class="table-light">
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('form_scripts')
<script>
    function openForm() {
        document.getElementById("form").classList.toggle("form-show");
        document.getElementById("form-bg").style.display = "block";
    }
    function closeForm() {
        document.getElementById("form").classList.toggle("form-show");
        document.getElementById("form-bg").style.display = "none";
    }
</script>
@endsection