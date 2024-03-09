@extends('layouts.admin')

@section('title')
    {{ 'Admins' }}
@endsection

@section('content')
<h3>
    Admins
</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    New Admin
</button>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new admin</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/blog/admin/admins" method="POST">
            @csrf
                <div class="modal-body">
                    <fieldset>
                        <div>
                            <label for="exampleSelect1" class="form-label mt-4 float-start">Permission:</label>
                            <select class="form-select" id="exampleSelect1" name="permission">
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                            </div>
                        <div>
                            <label class="col-form-label mt-4 float-start" for="inputDefault">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" id="inputDefault" required>
                        </div>
                        <div>
                            <label class="col-form-label mt-4 float-start" for="inputDefault">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" id="inputDefault" required>
                        </div>
                    </fieldset>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Permission</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr class="table-light">
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->permission}}</td>
                <td>{{$admin->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection