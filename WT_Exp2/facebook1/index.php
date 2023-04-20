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

<title>facebook</title>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="index.css">
<style>
  .photo {
       width: 100%;
       height: 300px; 
       display: flex;
       justify-content: center;
       align-items: center;
   }

   .photo img {
   max-width: 100%; 
   max-height: 100%;
   }
   p{
       font-size:10px;
       font-size: 14px;
       line-height: 1.5;
       color: #262626;
       margin: 8px 0;
   }
</style>

</head>
<body>
    <header>

        <a href="index.php" class="logo">
        <i class="ui uil-facebook"></i>
        <i class="fas fa-utensils"></i>
        Facebook
                        
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
    <main class="profile">
        <?php
        if($vis==TRUE){
       echo'    
                <div  class="flex-container">
                <div class="flex-child">
                <form class="form" action="login.php" method="POST"style="margin-top:150px;">
                    <h2 style="margin-left:20px;">Facebook</h2>
                    <input placeholder="Email address or phone number"name = "uemail" class="input" type="text">
                    <input placeholder="Password" name="passw" class="input" type="password" id="password"> 
                    <button id="loginBtn"name="submit" type="submit">Log in</button>
                    <a id="forgotPassword" href="reset.html">Forgotten password?</a>
                    <button class="create" id="createAccountBtn"><a href="signup.php">Create new account</a></button>
                </form>
                </div>
                ';
        echo '
        
                <div class="">
                <h2>Trending posts</h2>';
                $con=new mysqli("localhost","root","","test");
                if(isset($con)){
                $sql="SELECT * FROM `images` ORDER BY likes DESC LIMIT 3;";
                $top=$con->query($sql);
                $j=1;
                
                while($i=mysqli_fetch_assoc($top))
                {
                    #echo'<p>'.$j.".".$i["uname"].'</p><hr>';
                    $j+=1;
                }
                echo'</div>';
                echo'</div>
                ';
             }
             $con=new mysqli("localhost","root","","test");
        $query="SELECT  `id`,`filename`, `description`, `uname`, `likes` FROM `images` order by likes desc limit 3;";
        $r=$con->query($query);
        while($row= mysqli_fetch_assoc($r))
        {
            $u=$row["uname"];
            $t=$row["filename"];
            $s="uploads/" . $t; 
            $d=$row["description"];
            $imgid=$row["id"];   
            $likes=$row["likes"];
        echo'
            <div class="container">
            <div class="feed">
            <h5>'.$u.'</h5>
            <div class="photo">
            <img src="'.$s.'"alt=""></div>
            <p>'.$d.'</p>
            
            ';
            $q="SELECT `id`, `img_id`, `username`, `comment`, `timesatmp` FROM `comments` WHERE `img_id`='$imgid'";
            $c=$con->query($q);
            if(isset($c))
            {
                while($com=mysqli_fetch_assoc($c))
                {
                    $commenter=$com['username'];
                    $des=$com['comment'];
                    // echo'<p><b>'.$commenter.'</b></p>';
                    // echo'<p>'.$des.'</p>';
                }
            }
            echo'</form>
                </div>
            </div>';
        }  
        if(isset($_POST["submit"]))
        {
            $i=$_POST['image_id'];
            $c=$_POST['comm'];
            $u=$_SESSION["name"];
            $con= new mysqli("localhost","root","","test");
            $query="INSERT INTO `comments`(`img_id`, `username`, `comment`) VALUES ('$i','$u','$c')";
            $r=$con->query($query);
            if(isset($r))
            {
                // echo"<script>alert('comment posted');</script>";
            }
        }
        }
          if($vis == False){
            echo'
            <div >
            <h2>Explore</h2>';
            $con=new mysqli("localhost","root","","test");
            if(isset($con)){
            $sql="SELECT * FROM `images` ORDER BY likes DESC LIMIT 3;";
            $top=$con->query($sql);
            $j=1;
            
            while($i=mysqli_fetch_assoc($top))
            {
                #echo'<p>'.$j.".".$i["uname"].'</p><hr>';
                $j+=1;
            }
            echo'</div>
            ';
        }

        $con=new mysqli("localhost","root","","test");
        $query="SELECT  `id`,`filename`, `description`, `uname`, `likes` FROM `images` order by created_at desc;";
        $r=$con->query($query);
        while($row= mysqli_fetch_assoc($r))
        {
            $u=$row["uname"];
            $t=$row["filename"];
            $s="uploads/" . $t; 
            $d=$row["description"];
            $imgid=$row["id"];   
            $likes=$row["likes"];
        echo'
            <div class="container">
            <div class="feed">
            <h5>'.$u.'</h5>
            <div class="photo">
            <img src="'.$s.'"alt=""></div>
            <p>'.$d.'</p>
            <form action="like.php" method="POST">
            <input type="hidden" name="image_id" value="' . $imgid . '" />
            <button class="btn" name="submit" type="submit"><i class="uil uil-heart" ></i></button>'.$likes.'
            </form>
            <form action="index.php" method="POST">
            <input name="comm" type="text"placeholder="comment..." >
            <input type="hidden" name="image_id" value="' . $imgid . '" />
            <button name="submit" type="submit" class="btn">comment</button>';
            $q="SELECT `id`, `img_id`, `username`, `comment`, `timesatmp` FROM `comments` WHERE `img_id`='$imgid'";
            $c=$con->query($q);
            if(isset($c))
            {
                while($com=mysqli_fetch_assoc($c))
                {
                    $commenter=$com['username'];
                    $des=$com['comment'];
                    echo'<p><b>'.$commenter.'</b></p>';
                    echo'<p>'.$des.'</p>';
                }
            }
            echo'</form>
                </div>
            </div>';
        }  
        if(isset($_POST["submit"]))
        {
            $i=$_POST['image_id'];
            $c=$_POST['comm'];
            $u=$_SESSION["name"];
            $con= new mysqli("localhost","root","","test");
            $query="INSERT INTO `comments`(`img_id`, `username`, `comment`) VALUES ('$i','$u','$c')";
            $r=$con->query($query);
            if(isset($r))
            {
                echo"<script>alert('comment posted');</script>";
            }
        }
    }
    ?>
</main>
<script src="js/script.js"></script>

</body>

</html>
<!-- // <form action="like.php" method="POST">
            // <input type="hidden" name="image_id" value="' . $imgid . '" />
            // <button class="btn" name="submit" type="submit"><i class="uil uil-heart" ></i></button>'.$likes.'
            // </form>
            // <form action="index.php" method="POST">
            // <input name="comm" type="text"placeholder="comment..." >
            // <input type="hidden" name="image_id" value="' . $imgid . '" />
            // <button name="submit" type="submit" class="btn">comment</button> -->