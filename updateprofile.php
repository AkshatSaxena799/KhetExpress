<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
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
				<form action="editprofile.php" method="post">
					<label for="chk">Profile</label>
					<input type="text" name="picName" placeholder="Enter Path of your Image" value= "" >
					<input type="text" name="name" value= "<?php echo $_SESSION['Name'];?>">
					<input type="text" name="mobile" value ="<?php echo $_SESSION['Mobile'];?>">
					<input type="email" name="email" value ="<?php echo $_SESSION['Email'];?>">
					<input type="text" name="address" value ="<?php echo $_SESSION['Addr'];?>">
					<button>Update Profile</button>
					<a href="profile.php"><button>View Profile</button></a>
				</form>
			</div>
	</div>
</body>
</html>