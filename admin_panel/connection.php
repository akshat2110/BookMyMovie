<?php
     $con = mysqli_connect("localhost", "root", "", "online_movie_booking");
     include("bootstrap.php");
     @session_start();
    if($_SESSION['NAME'] == ''){
    header("location:login.php");
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>