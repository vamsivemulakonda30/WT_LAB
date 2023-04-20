<?php
session_start();
if(isset($_SESSION['us_email']))
{
    unset($_SESSION['us_email']);
    session_destroy();
    header("Location: index.php");
}
else
{
    header("Location: index.php");   
}
?>