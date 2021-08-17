@extends("layouts.admin_sidenav")

@section("title","View Products to Assign")

@section("content")
<div>
    <h3>Select products to assign it to employees</h3>
        <form action="assign" method="post">
        @csrf
        @foreach($products as $product)
        <div>
            <br>
            <input type="checkbox" name="products[]" value="{{$product->id}}" >
            Name : {{$product->pname}}<br>
            Price : ${{$product->price}}<br>
            <a href="show-product-to-update/{{$product->id}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="delete-product/{{$product->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

        </div>
        @endforeach

        <button type="submit">OK</button>
        </form>
</div>
@endsection