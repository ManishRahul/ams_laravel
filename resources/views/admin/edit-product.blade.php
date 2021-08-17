@extends("layouts.admin_sidenav")

@section("title","Edit Product")

@section("content")
<div>
        <form action="/edit-product" method="post">
        @csrf

        <div>
            <label>User id as Foreign key</label>
            <input type="text" ReadOnly="true" name="pro_id" value="{{$product->id}}" >
        </div>

        <div>
            <label for="manager">Name</label><br>
            <input type="text" id="pname" name="pname" value="{{$product->pname}}"  /> 
        </div>
        <div>
            <label for="employee">Price</label><br>
            <input type="text" id="price" name="price" value="{{$product->price}}" /> 
        </div>

        <button type="submit">Update</button>

        
        </form>
</div>
@endsection