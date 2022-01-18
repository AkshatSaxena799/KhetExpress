<?php
session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: error.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
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

	<?PHP

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'aks');
	$query = " SELECT `pid`,`product`,`pinfo`, `pimage`, `price`, `pcat` FROM `fproduct` order by fid ASC ";
	$queryfire = mysqli_query($con, $query);
	$num = mysqli_num_rows($queryfire);
	if($num > 0){
		while($product = mysqli_fetch_array($queryfire)){
	?>
		<div class="col-lg-3 col-md-3 col-sm-12">
			
			<form action="cart.php" method="POST">
				<div class="card">
					<h6 class="card-title bg-info text-white p-2 text-uppercase"> 
						<?php 
						echo $product['product'];  
						?>
					</h6>
					<div class="card-body">
						<img src="<?php echo $product['pimage']; ?>" alt="image" class="images">
					<!-- <h6> &#8377; <?php echo $product['pinfo'];  ?></h6> -->
					<h6> &#8377; <?php echo $product['price'];  ?></h6>
					<input type="hidden" name="pid" value="<?php echo $product['pid'] ?>">
					<input type="hidden" name="product" value="<?php echo $product['product'] ?>">
					<input type="hidden" name="price" value="<?php echo $product['price'] ?>">
					 <input type="number" name="quantity" value="1" >
					</div>
					 <div class="btn-group d-flex">
						<button class="btn btn-success flex-fill" name="addCart"> Add to cart </button>
					</div>


				</div>
			</form>

		</div>


	<?php		
		}
	}
	?>


</div>
</div>
</body>
</html>