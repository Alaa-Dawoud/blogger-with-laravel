@extends('layouts.admin')

@section('title')
    {{ 'Admins' }}
@endsection

@section('content')
<h3>
    Admins
</h3>
<form action="/blog/admin/admins" method="POST">
    @csrf
    <div id="form" class="form">
        <h2>Add new Admin:</h2>
        <fieldset>
            <div>
                <label for="exampleSelect1" class="form-label mt-4 float-start"><strong>Permission: </strong></label>
                <select class="form-select" id="exampleSelect1" name="permission">
                  <option value="Admin">Admin</option>
                  <option value="Super Admin">Super Admin</option>
                </select>
              </div>
            <div>
                <label class="col-form-label mt-4 float-start" for="inputDefault"><strong> Name:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" id="inputDefault" required>
            </div>
            <div>
                <label class="col-form-label mt-4 float-start" for="inputDefault"><strong> Password:</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" id="inputDefault" required>
            </div>
    
            <button type="submit" class="btn btn-primary form_button">Add</button>
        </fieldset>
    </div>
    <div id="form-bg" class="form-background" onclick="closeForm()"></div>
    <div id="button" class="btn btn-primary" onclick="openForm()">New Admin</div>
</form>
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