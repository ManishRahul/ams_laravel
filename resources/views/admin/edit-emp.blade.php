@extends("layouts.admin_sidenav")

@section("title","Edit Employee")

@section("content")
<div>
        <form action="/edit-emp" method="post">
        @csrf

        <div>
            <label>User id as Foreign key</label>
            <input type="text" ReadOnly="true" name="emp_id" value="{{$emp->id}}" >
        </div>
        <div>
            <label for="name">Name as per Username:</label>
            <input type="text" name="name" id="name" value="{{$emp->name}}" >
        </div>
        @foreach($emp->user->roles as $role)
        <div>
            <p>Role:</p>
                <input type="radio" id="admin" name="roles[]" value="5" {{ ($role->id==5)? "checked" : "" }} />
                <label for="admin">Admin</label> <br>
                <input type="radio" id="manager" name="roles[]" value="6" {{ ($role->id==6)? "checked" : "" }} /> 
                <label for="manager">Manager</label><br>
                <input type="radio" id="employee" name="roles[]" value="7" {{ ($role->id==7)? "checked" : "" }} /> 
                <label for="employee">Employee</label><br>
        </div>
        @endforeach
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{$emp->email}}" >
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{$emp->phone}}">
        </div>

        <button type="submit">Save</button>

        
        </form>
</div>
@endsection