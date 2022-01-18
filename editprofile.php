<?php
    session_start();
    $picName = $_POST['picName'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $addr = $_POST['address'];

    $_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Addr'] = $addr;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['picName'] = $picName;


    $conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else
    {
        $id = $_SESSION['id'];
        $category=$_SESSION['Category'];
        if($category=="Farmer")
        {
            $stmt="UPDATE farmer SET fname='$name',fmobile='$mobile',femail='$email',faddress='$addr',picExt='$picName' WHERE fid='$id';";
            $result = mysqli_query($conn, $stmt);
            if($result)
            {
                $_SESSION['message'] = "Profile Updated successfully !!!";
                header("Location: profile.php");
            }
            else
            {
                $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
                echo "Error Updating Profile!!";
            }
        }
        else
        {
            $stmt="UPDATE buyer SET bname='$name',bmobile='$mobile',bemail='$email' WHERE bid='$id';";
            $result = mysqli_query($conn, $stmt);
            if($result)
            {
                $_SESSION['message'] = "Profile Updated successfully !!!";
                header("Location: profile.php");
            }
            else
            {
                $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
                echo "Error Updating Profile!!";
            }
        }
        
    }
?>