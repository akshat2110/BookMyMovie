<?php
     // Create a connection to the database
     $con = mysqli_connect("localhost", "root", "", "online_movie_booking");

     if(isset($_REQUEST['login']))
     {
         echo "hii";
         $querry = "select * from admin where email='".$_REQUEST['email']."' and password='".$_REQUEST['password']."' and status='active'";
         $result = mysqli_query($con, $querry);
         $count = mysqli_num_rows($result);
         $fetch = mysqli_fetch_object($result);
         if($count>0)
         {
            @session_start();
            $_SESSION['NAME']=$fetch->name;
            $_SESSION['EMAIL']=$fetch->email;
            $_SESSION['AID']=$fetch->id;
            header("location:index.php");
         }
         else
        {
            header("location:login.php");
        }
     }

     if(isset($_REQUEST['logout']))
     {
        session_start();
        session_destroy();  
        header("location:login.php");
    }
?>