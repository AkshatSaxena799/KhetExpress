<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: error.php");
	}
?>


<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/profile.css">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk">

			<div class="profile">
				<!-- <form action="tr.php" method="post"> -->
					<label for="chk">Profile</label>
                    <center><img src="<?php echo $_SESSION['picName']; ?>" class="logo"></center>
					<input type="text" name="name" value= "<?php echo $_SESSION['Name'];?>" readonly>
					<input type="text" name="mobile" value ="<?php echo $_SESSION['Mobile'];?>" readonly>
					<input type="email" name="email" value ="<?php echo $_SESSION['Email'];?>" readonly>
					<input type="text" name="address" value ="<?php echo $_SESSION['Addr'];?>" readonly>
					<a href="updateprofile.php"><button>Update Profile</button></a>
					<a href="home2.html"><button>Main Menu</button></a>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<center><a href="logout.php"><button>Log Out</button></a></center>


					

				<!-- </form> -->
			</div>
	</div>
</body>
</html>