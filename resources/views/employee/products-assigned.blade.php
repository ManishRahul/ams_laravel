<html>
    <head>
        <title>Products Assigned</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .box {
        border: 3px solid red;
        height: 150px;
        width: 200px;
        }
    </style>  
</head>
    <body>
        <div class="container">
            <h2>Products assigned to you</h2>
            <div class="row">
            @foreach($user->employee->products as $product)
                <div class="col-sm-4 box">
                    <div>
                        <br>
                        <h5>Product {{$product->id}}</h5>
                        <p>Name : {{$product->pname}}</p>
                        <p>Price : {{$product->price}}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </body>
</html>