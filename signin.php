<?php
    session_start();

    $user = dataFilter($_POST['uname']);
    $pass = $_POST['pass'];
    $category = dataFilter($_POST['category']);

    $conn = new mysqli('localhost','root','','aks');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }

if($category == "Farmer")
{
    $sql = "SELECT * FROM farmer WHERE fusername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
        echo "no rows";
    }

    else
    {
        $User = $result->fetch_assoc();

        if ($pass==$User['fpassword'])
        {
            $_SESSION['id'] = $User['fid'];
            $_SESSION['Hash'] = $User['fhash'];
            $_SESSION['Password'] = $User['fpassword'];
            $_SESSION['Email'] = $User['femail'];
            $_SESSION['Name'] = $User['fname'];
            $_SESSION['Username'] = $User['fusername'];
            $_SESSION['Mobile'] = $User['fmobile'];
            $_SESSION['Addr'] = $User['faddress'];
            $_SESSION['Active'] = $User['factive'];
            $_SESSION['picStatus'] = $User['picStatus'];
            $_SESSION['picExt'] = $User['picExt'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = "Farmer";
            $_SESSION['Rating'] = 0;
            //echo $_SESSION['Email']."  ".$_SESSION['Name'];
            header("location: profile.php");
        }
        else
        {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            echo "Wrong Credentials!!";
        }
    }
}
else
{
    $sql = "SELECT * FROM buyer WHERE busername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
    }

    else
    {
        $User = $result->fetch_assoc();

        if ($pass==$User['bpassword'])
        {
            $_SESSION['id'] = $User['bid'];
            $_SESSION['Hash'] = $User['bhash'];
            $_SESSION['Password'] = $User['bpassword'];
            $_SESSION['Email'] = $User['bemail'];
            $_SESSION['Name'] = $User['bname'];
            $_SESSION['Username'] = $User['busername'];
            $_SESSION['Mobile'] = $User['bmobile'];
            $_SESSION['Addr'] = $User['baddress'];
            $_SESSION['Active'] = $User['bactive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = "Buyer";
            header("location: profile.php");


            //echo $_SESSION['Email']."  ".$_SESSION['Name'];

        }
        else
        {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            echo "Wrong Credentials for Buyer!!";
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

?>
