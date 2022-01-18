<?php
	session_start();

    $conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }

    $sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_array()):
?>

        <?= $row['likes']; ?>

    <?php endwhile; ?>
