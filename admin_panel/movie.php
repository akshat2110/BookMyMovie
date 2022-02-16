<?php 
include("connection.php");

if(isset($_REQUEST['del']))
{
    $querry = "delete from movie where mov_id='".$_REQUEST['del']."'";
    mysqli_query($con, $querry);
    header("location:movie.php");
}

if(isset($_REQUEST['status']))
{
	$querry="update movie set status= '".$_REQUEST['status']."'where mov_id='".$_REQUEST['id']."'";
	mysqli_query($con,$querry);
	header("location:movie.php");
}

$querry = "select * from movie";
$result = mysqli_query($con, $querry);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>
<div class="container mb-3">
<div class= " text-center">
<a class="btn btn-info " href="add_movie.php">ADD MOVIE</a>
</div>
</div>

<div class="container-fluid">
<table class="table table-striped">
    <tr class = "table-info">
        <th scope="col">Movie Id</th>
        <th scope="col">Movie Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
        <th scope="col">Update</th>
		<th scope="col">Delete</th>
    </tr>

    <?php while($fetch=mysqli_fetch_object($result)){?>
    <tr>
        <th scope = "row">
        
            <?php echo $fetch->mov_id;?>
        </th>
        <td>
            <?php echo $fetch->mov_name;?>
        </td>
        <td>
            <?php echo $fetch->price;?>
        </td>
        <td>
            <img src="movie_image/<?php echo $fetch->mov_image;?>" alt="Image" style="height:100px;width=100px;">
        </td>
        <td>
			<?php if($fetch->status=='active'){?>
			<a href="?status=inactive&id=<?php echo $fetch->mov_id;?>">Active</a>
			<?php }
			else if($fetch->status=='inactive'){
			?>
			<a href="?status=active&id=<?php echo $fetch->mov_id;?>">Inactive</a>
			<?php }?>
		</td>
        <td>
            <a class="pr-2" href="edit_movie.php?id=<?php echo $fetch->mov_id;?>">Edit</a>         
        </td>
        <td>
            <a href="movie.php?del=<?php echo $fetch->mov_id;?>">Delete</a>
        </td>
    </tr>
    <?php }?>
</table></div>
<?php include("include/footer.php");?>
    

</html>
