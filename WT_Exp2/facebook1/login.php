<?php
session_start();
if (isset($_SESSION['us_email']))
{
    header('Location: index.php');
    exit();
}

function validate($str)
{
    $str = trim($str);
    $str = htmlspecialchars($str);
    return $str;
}
if(isset($_POST['submit']))
{
    $uemail  = validate($_POST['uemail']);
    $passw = validate($_POST['passw']);
    $con = new mysqli("localhost","root","","test");
    $query = "SELECT * FROM user_details WHERE email=? AND passw=?";
    $smt = $con->prepare($query);
    $smt->bind_param("ss", $uemail,$passw);
    $smt->execute();
    $result = $smt->get_result();
    $r=mysqli_fetch_assoc($result);
    if($result->num_rows > 0)
    {
        $_SESSION['us_email'] = $uemail;
        $_SESSION['name']=$r["username"];
        $u=$_SESSION['name'];
        echo '<script> alert("Login successful! "$u "");</script>';
        echo '<script> window.location.replace("index.php");</script>';
    }
    else{
        echo '<script> alert("Invalid Credentials");</script>';
        echo '<script> window.location.replace("index.php");</script>';

    }

    
}

?>


