<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choose Emps</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
  <h2>Select Employees to assign products</h2>

  @if(session()->has("success"))
    <div class="alert alert-success">
      {{ session("success") }}
    </div>
  @endif   
  <br></br>
  <form action="assign-emp" method="post">
  @csrf
  <table class="table table-striped" id="tbl-list-emps">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
      <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
      @foreach($employee->user->roles as $role)
        <td>{{$role->role_name}}</td>
      @endforeach
        <td><input type="checkbox" name="emps[]" value="{{$employee->id}}" >
        <label>Select</label>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  <button type="submit" class="btn btn-dark float-right">Assign</button>
    </form>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tbl-list-emps').DataTable();
} );
</script>
</body>
</html>



<!-- <html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <form action="assign-emp" method="post">
            @csrf
            @foreach($employees as $employee)
            <div>
            <input type="checkbox" name="emps[]" value="{{$employee->id}}" >
            <label>{{$employee->name}}</label>
            </div>
            @endforeach
            <button type="submit">Add</button>
        </form>
    </body> 
</html> -->