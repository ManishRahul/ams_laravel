@extends("layouts.admin_sidenav")

@section("title","Create Employee")

@section("content")
<div>
        <form action="/create-emp" method="post">
        @csrf

        <div>
            <label>User id as Foreign key</label>
            <input type="text" ReadOnly="true" name="user_id" value="{{$user->id}}" >
        </div>
        <div>
            <label for="name">Name as per Username:</label>
            <input type="text" ReadOnly="true" name="name" id="name" value="{{$user->name}}" >
        </div>

        <div>
            <label for="role">Role:</label>
            <input type="text" ReadOnly="true" name="role" id="role" value="{{$userrole->role_name}}" >
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="text" ReadOnly="true" name="email" id="email" value="{{$user->email}}" >
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone">
        </div>

        <button type="submit">Save</button>
        </form>
</div>
@endsection