<?php
include("connection.php");
$querry="select * from shows where mov_id = '".$_REQUEST['id']."' and status='active'";
$result=mysqli_query($con,$querry);
?>

<!DOCTYPE html>

<html>

<body class="d-flex flex-column min-vh-100">
    <?php include("include/header.php")?>

    <br>
    <div class= " text-left">
        <a class="btn btn-info " href="index.php">GO BACK</a>
    </div>
    <br> 
    <div style="padding: 1rem"> 

        <div class="row row-cols-2">

            <?php while($fetch=mysqli_fetch_object($result)){?>

                <div class="card h-100 text-center card-height: 100%  mb-3 shadow p-3 mb-5 bg-white rounded" id='container-content' style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php 
                            $querry1 ="select mov_image from movie where mov_id='".$fetch ->mov_id."'";
                            $result1=  mysqli_query($con,$querry1);
                            $fetch1 = mysqli_fetch_object($result1);?>
                            <img src="admin_panel/movie_image/<?php echo $fetch1->mov_image;?>" alt="Image" class="card-img-top" ;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Theatre: <?php 
                                $querry1 ="select theatre_name from theatre where theatre_id='".$fetch ->theatre_id."'";
                                $result1=  mysqli_query($con,$querry1);
                                $fetch1 = mysqli_fetch_object($result1);
                                echo $fetch1->theatre_name;?></h5>
                                <h5 class="card-title">Date: <?php echo date("d/m/Y",strtotime($fetch->date));?></h5>
                                <h5 class="card-title">Start Time: <?php echo date("h:i A",strtotime($fetch->start_time));?></h5>
                            </div>
                            <div class="card-footer">
                                <a href="book.php?id=<?php echo $fetch->s_id;?>" class="btn btn-primary">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <?php include("include/footer.php")?>
</body>
</html>