<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
  <style media="screen">
    .error{
      border: 3px solid red;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="success">
        <span id="success_message"></span>
      </div>
      <div class="col-md-6">
        <form class="form" action=" {{ route('products.store') }} " method="post">
          @csrf
          <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
          </div>
          <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="text" class="form-control" id="product_price" name="product_price">
          </div>
          <button type="button" class="btn btn-info">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <div id="content_part">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Product Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $products as $product )
              <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.btn-info').click(function(){
      var product_name = $("#product_name").val();
      var product_price = $("#product_price").val();
      if(product_name == ""){
        $("#product_name").addClass("error");
      }
      if(product_price == ""){
        $("#product_price").addClass("error");
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'POST',
        url:'/products',
        data: {product_name:product_name, product_price:product_price},
        success: function (data) {
          if(data == 'done'){
            $("#product_name").val("");
            $("#product_price").val("");
            $("#success").addClass("alert alert-success");
            $("#success_message").html("Successfully Inserted!");
            $('#content_part').load(location.href+' #content_part');
          }
          else{
            alert("bad");
          }
        }
      });
    });
  });
</script>
</body>
</html>
