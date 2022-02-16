<?php 
include("connection.php");

if(isset($_REQUEST['del']))
{
    $querry = "delete from theatre where theatre_id='".$_REQUEST['del']."'";
    mysqli_query($con, $querry);
    header("location:theatre.php");
}

$querry = "select * from theatre";
$result = mysqli_query($con, $querry);
?>
<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>
    <div class="container mb-3">
        <div class= " text-center">
            <a class="btn btn-info " href="add_theatre.php">ADD THEATRE</a>
        </div>
    </div>

<div class="container-fluid">
<table class="table table-striped">
    <tr class = "table-info">
        <th scope = "col">Theatre Id</th>
        <th scope = "col">Theatre Name</th>
        <th scope = "col">Hall No.</th>
        <th scope = "col">Seat capacity</th>
        <th scope = "col">Update</th>
		<th scope = "col">Delete</th>
    </tr>

    <?php while($fetch=mysqli_fetch_object($result)){?>
    <tr >
        <th scope = "row">
            <?php echo $fetch->theatre_id;?>
        </th>
        <td>
            <?php echo $fetch->theatre_name;?>
        </td>
        <td>
            <?php echo $fetch->hall_id;?>
        </td>
        <td>
            <?php echo $fetch->capacity;?>
        </td>
        <td>
            <a class="pr-2" href="edit_theatre.php?id=<?php echo $fetch->theatre_id;?>">Edit</a>
        </td>
        <td>
            <a href="theatre.php?del=<?php echo $fetch->theatre_id;?>">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>
</div>
<?php include("include/footer.php");?>
    

</html>