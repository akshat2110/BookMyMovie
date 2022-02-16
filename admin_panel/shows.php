<?php
include("connection.php");
$querry="select * from shows";
$result=mysqli_query($con,$querry);

if(isset($_REQUEST['del']))
{
	$querry="delete from shows where s_id='".$_REQUEST['del']."'";
	mysqli_query($con,$querry);
	header("location:shows.php");
}

if(isset($_REQUEST['status']))
{
	$querry="update shows set status= '".$_REQUEST['status']."'where s_id='".$_REQUEST['id']."'";
	mysqli_query($con,$querry);
	header("location:shows.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>
<div class="container mb-3">
<div class= " text-center">
<a class="btn btn-info " href="add_show.php">ADD SHOW</a>
</div>
</div>

<div class="container-fluid">
<table class="table table-striped">
    <tr class = "table-info">
        <th scope = "col">Show Id</th>
        <th scope = "col">Movie Title</th>
        <th scope = "col">Theatre Name</th>
        <th scope = "col">Hall No.</th>
        <th scope = "col">Date</th>
        <th scope = "col">Start Time</th>
        <th scope = "col">End Time</th>
        <th scope = "col">Status</th>
        <th scope = "col">Update</th>
		<th scope = "col">Delete</th>
    </tr>

    <?php while($fetch=mysqli_fetch_object($result)){?>
    <tr>
        <th scope = "row">
        <?php echo $fetch ->s_id;?>
        </th>

        <td>
        <?php 
        $querry1 ="select mov_name from movie where mov_id='".$fetch ->mov_id."'";
        $result1=  mysqli_query($con,$querry1);
        $fetch1 = mysqli_fetch_object($result1);
        echo $fetch1 ->mov_name;?>
        </td>

        <td>
        <?php 
        $querry1 ="select theatre_name,hall_id from theatre where theatre_id='".$fetch ->theatre_id."'";
        $result1=  mysqli_query($con,$querry1);
        $fetch1 = mysqli_fetch_object($result1);
        echo $fetch1->theatre_name;?>
        </td>
        <td>
        <?php 
        echo $fetch1->hall_id;?>
        </td>

        <td>
        <?php echo date("d/m/Y",strtotime($fetch->date));?>
        </td>

        <td>
        <?php echo date("h:i A",strtotime($fetch->start_time));?>
        </td>

        <td>
        <?php echo date("h:i A",strtotime($fetch->end_time));?>
        </td>

        <td>
			<?php if($fetch->status=='active'){?>
			<a href="?status=inactive&id=<?php echo $fetch->s_id;?>">Active</a>
			<?php }
			else if($fetch->status=='inactive'){
			?>
			<a href="?status=active&id=<?php echo $fetch->s_id;?>">Inactive</a>
			<?php }?>
		</td>

        <td>
        <a class="pr-2" href="edit_show.php?id=<?php echo $fetch->s_id;?>">Edit</a>
        </td>

        <td>
        <a href="shows.php?del=<?php echo $fetch->s_id;?>">delete</a>
        </td>
    </tr>
    <?php }?>
</table>
</div>

<?php include("include/footer.php");?>
    
</html>
