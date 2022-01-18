<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>KHET EXPRESS : Write a Blog</title>
		<link rel="stylesheet" href="./css/style2.css">
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
	</head>
	<body class="subpage">
	<div class="banner">
	<?php
			require 'menu.php';
	?>

	<form method="post" action="Blog/blogSubmit.php">
        <section id="main" class="wrapper">
            <div class="inner">
				<div class="container" style="width: 70%">
				<div class="row uniform">
					<div class="9u 12u$(small)">

					</div>
					<br>
					<div class="button">
						<a href="blogView.php"><button type="button"><span></span>View Blogs</button></a>
					</div>
				</div>
				<br>
                <div class="box">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="blogTitle" id="blogTitle" value="" placeholder="Blog Title" required/>
                        </div>
                       	<div class="12u$">
							<textarea name="blogContent" id="blogContent" rows="12" placeholder="Blog Content"></textarea>
						</div>
						<br>
						<div class="12u$">
						<center>
							<input type="submit" name="submit" class="button special" value="SUBMIT"/>
						</center>
						</div>
                    </div>
                </div>
            </div>
        </section>
    </form>

		<script>
			 CKEDITOR.replace( 'blogContent' );
		</script>
	</div>
</body>
</html>
