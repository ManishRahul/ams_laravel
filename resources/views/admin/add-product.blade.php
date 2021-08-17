@extends("layouts.admin_sidenav")

@section("title","Add-Product")

@section("content")
<div>
    <h3>Create a new Product</h3>
        <form action="add" method="post">
            @csrf
            <div>
            <label>Product Name</label>
            <input type="text" name="pname" >
            </div>
            <div>
            <label>Price</label>
            <input type="number" name="price" >
            </div>
            <!-- <div>
            <label>Description</label>
            <input type="text" name="desc" >
            </div> -->
            <button type="submit">Add</button>
        </form>
</div>
@endsection