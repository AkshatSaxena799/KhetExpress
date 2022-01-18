<?php
    $selected = $_POST['category'];
    $name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password =$_POST['pswd'];
    $address =$_POST['address'];
    $conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else
    {
        if($selected=="Farmer")
        {
            $stmt=$conn->prepare("INSERT INTO FARMER(fname,fusername,fmobile,femail,fpassword,faddress) values (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $name,$mobile,$username,$email,$password,$address);
            $stmt->execute();
            echo "Registration Successful!";
            $stmt->close();
            $conn->close();
        }
        else
        {
            $stmt=$conn->prepare("INSERT INTO BUYER(bname,busername,bmobile,bemail,bpassword,baddress) values (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $name,$mobile,$username,$email,$password,$address);
            $stmt->execute();
            echo "Registration Successful!";
            $stmt->close();
            $conn->close();
        }
    }
?>