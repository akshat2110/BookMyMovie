<?php 
include("connection.php");

$querry = "select * from movie where status='active'";
$result = mysqli_query($con, $querry);
$count = mysqli_num_rows($result);

$row = ceil($count / 3);

$number = range(1, $count);

$arr = array_chunk($number,3);
?>

<!DOCTYPE html>

<html>

<body class="d-flex flex-column min-vh-100" style="margin: 0px!important;">
<?php include("include/header.php") ?>
<div style="padding: 1rem">
    
        <div class="row row-cols-5 g-4">

            <?php
                for($i=1; $i<=$count; $i++)
                {
                    $querry1 = "select * from movie where mov_id=$i";
                    $result1 = mysqli_query($con, $querry);
                    $fetch=mysqli_fetch_object($result)
                    ?>
                        <div class="col" style="margin: 0px; margin-bottom: 30px;">
                            <div class="card h-100 text-center card-height: 100% shadow p-3 mb-2 bg-white rounded">
                                <img src="admin_panel/movie_image/<?php echo $fetch->mov_image;?>" alt="Image" class="card-img-top" style="height:300px;width=50px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $fetch->mov_name;?></h5>
                                    <p class="card-text">Price: ₹<?php echo $fetch->price;?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="shows.php?id=<?php echo $fetch->mov_id;?>" class="btn btn-primary">Book</a>
                                </div>
                            </div>
                        </div>
                <?php }?>
             
        </div>
    <br>
</div>
    
<?php include("include/footer.php")?>
</body>

</html>


