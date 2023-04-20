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
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $con = new mysqli("localhost","root","","test");
    $query2 = "SELECT * FROM user_details WHERE email='$uemail'";
    $query1="INSERT INTO `user_details`( `username`, `email`, `passw`, `phone_no`) VALUES ('$name','$uemail','$passw','$phone')";
    $query = "INSERT INTO user_details VALUES ('$name','$uemail','$passw','$phone')";
    $res=$con->query($query2);
    if($res->num_rows > 0)
    {
        echo '<script> alert("Already Signed up!");</script>';
        echo '<script> window.location.replace("index.php");</script>';
    }

    $smt = $con->query($query1);

    try{

    $_SESSION['us_email'] = $uemail;
    $_SESSION['name']=$name;
    echo '<script> alert("Signed up successfully!");</script>';
    echo '<script> window.location.replace("index.php");</script>';
    }
    catch(mysqli_sql_exception $e){
        echo '<script> alert("Some error occured!");</script>';
    }
     
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Sign up page
    </title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
    
<form action="" method="POST">
      <h1>Sign Up</h1>
      <div class="container">
        <div class="row">
          <div class="col-6">
            <label for="name">Name:</label>
            <input  name = "name" type="text" id="typeEmailX" class="form-control form-control-lg" required/>
          </div>
          <div class="col-6">
            <label for="email">Email:</label>
            <input  name = "uemail" type="email" id="typeEmailX" class="form-control form-control-lg" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label for="password">Password:</label>
            <input name="passw" type="password" id="typePasswordX" class="form-control form-control-lg" required/>
          </div>
          <div class="col-6">
            <label for="phone">Phone:</label>
            <input  name = "phone" type="text" id="typeEmailX" class="form-control form-control-lg" required/>
          </div>
        </div>
        <input type="submit" value="Sign Up" name="submit">
      </div>
    </form>
                    
</body>

</html>