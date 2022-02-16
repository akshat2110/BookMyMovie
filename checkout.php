<?php
include("connection.php");
$querry="select * from booking where b_id='".$_REQUEST['id']."'";
$result=mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);
$querry1="select * from shows where s_id='".$fetch->s_id."' ";
$result1=mysqli_query($con,$querry1);
$fetch1 =mysqli_fetch_object($result1);
?>
 
    
<!DOCTYPE html>

<html>
<body class="d-flex flex-column min-vh-100">
    <?php include("include/header.php")?>
    <div id="content-wrap"> 

        <div class="card text-center" style="border:0">
            <div class="card-body" id="inner-div">
                <h3 class="card-title" style="color: navy;"><strong>Your Booking is Confirmed!!!</strong></h3>

                
                <div><h5><strong>Movie:</strong> <?php 
                $querry2="select mov_name,price from movie where mov_id='".$fetch1->mov_id."'";
                $result2=mysqli_query($con,$querry2);
                $fetch2 = mysqli_fetch_object($result2);
                echo $fetch2->mov_name;
                ?></h5></div>

                <div><h5><strong>Theatre: </strong><?php 
                $querry3="select * from theatre where theatre_id='".$fetch1->theatre_id."'";
                $result3=mysqli_query($con,$querry3);
                $fetch3 = mysqli_fetch_object($result3);
                echo $fetch3->theatre_name;
                ?></h5></div>

                <div><h5><strong>Hall No.: </strong><?php 
                echo $fetch3->hall_id;
                ?></h5></div>

                <div><h5><strong>Date: </strong><?php 
                echo date("d/m/Y",strtotime($fetch1->date));
                ?></h5></div>

                <div><h5><strong>Time: </strong><?php 
                echo date("h:i A",strtotime($fetch1->start_time));
                ?></h5></div>

                <div><h5><strong>Number of Seats Booked: </strong><?php 
                echo $fetch->seats;
                ?></h5></div>

                <div><h5><strong>Total Amount: </strong>₹<?php 
                echo $fetch2->price * $fetch->seats;
                ?></h5></div>
                <br>
                <a href="index.php" class="btn btn-primary">Go to Homepage</a>
                
            </div>
        </div>


    </div>
    <?php include("include/footer.php")?>
</body>
</html>


