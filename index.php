<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Yunus's Shopping Cart</title>
    <style>
      h4{
          color:lightgrey;
      }
      .product-detail{
          padding:10px;
       margin-bottom:3px;
       background-color:#5e2e06;

      }

      .other-detial{
          text-align:center;
          display:flex;
          margin:auto;
          background-color: #2d965f;
      }

      .price{
          font-weight:600;
          font-size:20px;
          color:#fff;
      }

      .product-img {
          height: 200px;
          object-fit:cover;
          width:100%;
      }


      .price-style{
        background-color: #2d965f;
      }

      .btn-style{
          margin-bottom:10px;
      }
        </style>
  </head>
  <body>
    <h1 class="text-center">Yunus's Shopping Cart</h1>

  <div class="container">
<div class="row">
<div class="col-md-6">
    <div class="row">

      <?php
        $con = mysqli_connect('localhost','root','','cart');
        $sql = "SELECT * FROM products";
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($query))
        
        {

        

      ?>

        <div class="col-md-6">
            <div class="product-detail">

            <div class="img-thumbnail">

            <img class='product-img' src='<?=$row['image']?>'>
            </div>
            <div class="other-detail">
                <h4><?=$row['product_name']?></h4>
                <div class="price-style">
                <p class='price'>$ <?=$row['price']?></p>
                <a href="action.php?action_type=add_item&id=<?=$row['id']?>&product_name=<?=$row['product_name']?>&quantity=1&price=<?=$row['price']?>" class="btn btn-warning">Add to Cart</a>
                </div>

            </div>

            </div>

  </div>

<?php

}

?>


</div>
</div>
<div class="col-md-6">
    <h2 class="text-center">Your Cart</h2>
    <?php
$Total=0;
if(isset($_SESSION['cart'])) {



    ?>
    
    <table class="table table-bordered">
<thead>

<th>SN</th>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Options</th>
</thead>
<tbody>
    <?php

$index = 0;
$i = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $totalPrice = $val['quantity'] * $val['price'];
    $Total = $Total + $totalPrice;
    ?>
<tr>
<td><?=$i++ ?></td>
<td><?= $val['product_name'] ?></td>
<td><?=$val['quantity'] ?></td>
<td><?= $totalPrice ?></td>
<td><a href="action.php?action_type=remove_item&index=<?=$key?>">Remove</a> </td>

</tr>
<?php

$index++;

}

?>
<tr>
    <td></td>
    <td></td>
    <td>Total Cost:</td>
    <td><?=$Total?></td>
    <td></td>
</tr>
</tbody>
</table>

<?php
}

?>

</div>

</div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>