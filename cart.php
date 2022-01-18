<?php

session_start();
// session_destroy();
if(isset($_POST['addCart']))
{ 
    $pid = $_POST["pid"];
    $price = $_POST["price"];
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];
    // $check_product = array_column($_SESSION['cart'],'product');
    
    // if(in_array($product,$check_product))
    // {
    //     echo "
    //     <script>
    //     alert('Product already added');
    //     window.location.href = 'product.php';
    //     </script>
    //     ";
    // }
    // else
    // {
        $_SESSION['cart'][]=array('pid'=>$pid,'product'=> $product,'price'=>$price,'quantity'=>$quantity);
    // }
    
}
//remove product

// if(isset($_POST['remove']))
// {
//     foreach($_SESSION['cart'] as $key => $value)
//     {
//         if($value['product']=== $_POST['item'])
//         {
//             unset($_SESSION['cart'],$key);
//             $_SESSION['cart'] = array_values($_SESSION['cart']);
//             header('location:cart.php');
//         }
//     }
// }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="./css/product.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
</head>
<body>
<div class="banner">
	<div class="navbar">
            <img src="./images/logo2.png" class="logo">
            <ul>
                <li><a href="home2.html">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="home2.html">Order Online</a></li>
                <li><a href="blogView.php">Blog</a></li>
            </ul>
    </div>
	<h1 class="text-center text-danger mb-5" 
	style="font-family: 'Abril Fatface', cursive;"></h1>

	<div class="row">
	<div class="col-lg-12 text-center bg-light mb-5">
        <h1>MY CART</h1>
    </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center">
                    <thead class="fs-5">
                        <th>PID</th>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY(Kg)</th>
                        <th>TOTAL PRICE</th>
                        <!-- <th>UPDATE</th> -->
                        <th>DELETE</th>
                    </thead>
                    <tbody>
                        <?php
                            $total=0;
                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    $total = $value['price'] * $value['quantity'];
                                    echo "
                                    <form action='cart.php' method='POST'>
                                    <tr>
                                    <td>$value[pid]</td>
                                    <td>$value[product]</td>
                                    <td>$value[price]</td>
                                    <td>$value[quantity]</td>
                                    <td>$total</td>
                                    <td>
                                        <button name='remove' class='btn-danger'>
                                        Delete
                                        </button>
                                    </td>
                                    <input type='hidden' name='item' value='$value[product]'>
                                    </tr>
                                    </form>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="hover-overlay">
            <center><a href="transaction.html">
            <button name="checkout" class="button"><span></span>Checkout</button>
            </a></center>
        </div>
    </div>
</div>
</body>
</html>