<?php
	session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: error.php");
	}

	$conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }

	if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		if(isset($_POST['comment']) AND $_POST['comment'] != "")
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "submit".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
	 			}
			}

			$comment = dataFilter($_POST['comment']);
			if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
			{
				$commentUser = $_SESSION['Username'];
				$pic = $_SESSION['picName'];
			}
			else {
				$commentUser = "Anonymous";
				$pic = "profile0.png";
			}
			if(isset($blogId))
			{
				$sql = "INSERT INTO blogfeedback (blogId, comment, commentUser, commentPic)
						VALUES ('$blogId' ,'$comment', '$commentUser', '$pic');";
				$result = mysqli_query($conn, $sql);
			}
		}

		else
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "like".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
				}
			}
			$likeCheck = "isLiked".$blogId;
			if(!isset($_SESSION[$likeCheck]) OR $_SESSION[$likeCheck] == 0)
			{
				$id = $_SESSION['id'];
				$sql = "SELECT * FROM likedata WHERE blogId = '$blogId' AND blogUserId = '$id'";
				$result = mysqli_query($conn, $sql);
				$num_rows = mysqli_num_rows($result);
				if($num_rows == 0)
				{
					$sql = "INSERT INTO likedata (blogId, blogUserId)
							VALUES('$blogId', '$id')";
					$result = mysqli_query($conn, $sql);
					$sql = "UPDATE blogdata SET likes = likes + 1 WHERE blogId = '$blogId'";
					$result = mysqli_query($conn, $sql);
					$_SESSION[$likeCheck] = 1;
				}
			}
		}
	}

	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
	$result = mysqli_query($conn, $sql);

	function formatDate($date)
	{
		return date('g:i a', strtotime($date));
	}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>AgroCulture : Blogs</title>
		<link rel="stylesheet" href="./css/style2.css">
		<link rel="stylesheet" href="Blog/commentBox.css" />
	</head>
	<body >
	<div class="banner">
		<?php
			require 'menu.php';
		?>

		<center><div class="button">
			
			<a href="blogWrite.php"><button type="button"><span></span>Write a Blog</button></a>
		</div>
		</center>
		<?php
			while($row = $result->fetch_array()) :
				$id = $row['blogId'];
				$sql = "SELECT * FROM blogfeedback WHERE blogId = '$id";
				$result1 = mysqli_query($conn, $sql);
				// $numComment = mysqli_num_rows($result1);
		?>
					<div>
					<center>
						<textarea name="" id="" cols="30" rows="7">
							BLOG TITLE: <?= $row['blogTitle']; ?>
							<?= $row['blogContent']; ?>
							USERNAME: <?= $row['blogUser']; ?>
							<?= $row['blogTime']; ?>
						</textarea>	
					</center>
						<center>
						<form method="post" action="blogView.php">
							<div class="row">
							<br>
								<div class="button">
									<button name="<?php echo 'like'.$id; ?>">
									<span></span> Like</button>
									<span><?= $row['likes']?></span>
								</div>
			
								<!-- <div class="content">
									<p><span></span> Comments: <?= $numComment ?></button></p>
								</div> -->
								<div class="12u$">
									
									<textarea name="comment" id="comment" rows="1" placeholder="Write a Comment!"></textarea>
								</div>
								<div>
									<center>
									<br>
									<input type="submit" name="<?php echo 'submit'.$id; ?>" value="Submit"/>
									</center>
								</div>
							</div>
						</form>
						</center>
						<?php
							if($result1) :
								while($row1 = $result1->fetch_array()) :
						?>
							<div class="con darker">
								<img src="<?php echo 'images/profileImages/'.$row1['commentPic']?>" alt="Avatar"><span><em><?= $row1['commentUser']; ?></em></span>
								<br>
								<?= $row1['comment']; ?>
								<span class="time-right"><?= formatDate($row1['commentTime']); ?></span>
							</div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<?php endwhile; ?>
		</div>
	</body>
</html>
