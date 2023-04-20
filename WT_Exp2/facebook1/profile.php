<?php
session_start();
$vis = true;
if(isset($_SESSION['us_email']))
{
    $vis = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>profile</title>
    <link type="text/css"rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <style>
    .container
    {
        margin-top:50px;
        overflow:hidden;
    }
    </style>
</head>
<body>
<header>
<a href="index.php" class="logo">
<i class="ui uil-facebook"></i>
<i class="fas fa-utensils"></i>
facebook
                
            </a></a>

<nav class="navbar">
              
    <?php 
    if($vis == false)
    {   
        echo'<a href="profile.php">profile</a>';
        echo'<a href="upload.php">upload</a>';
        echo '<a href="logout.php">logout</a>';
    }
    ?>
</nav>
</header>


<div class="container">

    <div class="profile">
        <div class="profile-user-settings">
            <h1 class="profile-user-name"><?php $u=$_SESSION['name'];echo"$u";?></h1>
        </div>
        <!-- <div class="profile-bio">

            <p><span class="profile-real-name">Vamsi</span> Lorem  📷✈️🏕️</p>

        </div> -->
    </div>
    <!-- End of profile section -->

</div>


<main>

<div class="container">

    <div class="gallery">

        
            <?php
            $con= new mysqli("localhost","root","","test");
            $n=$_SESSION["name"];
            $q="SELECT  `filename` FROM `images` WHERE `uname`='$n'";
            $r=$con->query($q);
            
            if(isset($r) && mysqli_num_rows($r)>0)
            {   
                while($row = mysqli_fetch_assoc($r))
                {
                $a=$row["filename"];
                $image_url = "uploads/" . $a; // Replace "example.com" and "/images/" with the appropriate server and directory paths for your image files

  // Output an HTML <img> tag to display the image
                echo '<div class="gallery-item" tabindex="0"><img src="' . $image_url . '" alt="Image" class="gallery-image" alt="" />'."</div>";
                }
            }
            ?>

    </div>
, 

</div>
</main>
</body>
</html>