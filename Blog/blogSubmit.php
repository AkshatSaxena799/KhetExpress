<?php
    session_start();

	$conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    };

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$title = dataFilter($_POST['blogTitle']);
		$content = $_POST['blogContent'];
		$userName = $_SESSION['Username'];
	}


    $sql = "INSERT INTO blogdata (blogUser, blogTitle, blogContent)
		    VALUES ('$userName', '$title', '$content')";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        $_SESSION['message'] = "Some Error occurred !!!";
        echo "BLOG SUBMIT ERROR!!";
    }
	else
	{
		header("Location: ../blogView.php");
	}

    function dataFilter($data)
    {
    	$data = trim($data);
     	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
      	return $data;
    }

?>
