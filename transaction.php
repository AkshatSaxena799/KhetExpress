<?php
    session_start();
    $name = $_POST['name'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pincode = $_POST['pincode'];
    $addr = $_POST['address'];
    $pid = $_SESSION['cart']['pid'];
    $bid = $_SESSION['id'];
    $conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else
    {
        $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr)
                VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$addr')";
        $result = mysqli_query($conn, $sql);
        echo "Transaction Successful!";
        $conn->close();
    }
?>

