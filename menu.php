<?php
	if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
		if($_SESSION['Category']!= "Farmer")
		{
			$link = "profile.php";
		}
		else {
				$link = "profile.php";
		}
	}
	else
	{
		$loginProfile = "Login";
		$link = "index.html";
		$logo = "glyphicon glyphicon-log-in";
	}
?>

<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="./css/style2.css">
	</head>
	<body>
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
	</body>

	</body>
</html>
