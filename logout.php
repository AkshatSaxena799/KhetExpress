<?php
	session_start();
		$_SESSION['logged_in'] = false;
	session_unset();
	session_destroy();
?>

<html>
<head>
    <title>KHET EXPRESS</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="./images/logo2.png" class="logo">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="home2.html">Order Online</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Welcome to Khet Express!!</h1>
                <h3>From Our Farm to Your Doorstep</h3>
                <h3>You have been succesfully logged out !!!</h3>
        </div>
    </div>
</body>
</html>