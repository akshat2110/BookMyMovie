<?php 
include("connection.php");

if(isset($_REQUEST['del']))
{
    $querry = "select s_id,seats from booking where b_id='".$_REQUEST['del']."'";
    $result = mysqli_query($con, $querry);
    $fetch=mysqli_fetch_object($result);
    $querry1 = "select reserved_seats from shows where s_id='".$fetch->s_id."'";
    $result1 = mysqli_query($con, $querry1);
    $fetch1=mysqli_fetch_object($result1);
    $querry2 = "update shows set reserved_seats='".strval((int)$fetch1->reserved_seats - (int)$fetch->seats)."' where s_id='".$fetch->s_id."'";
    mysqli_query($con, $querry2);
    $querry = "delete from booking where b_id='".$_REQUEST['del']."'";
    mysqli_query($con, $querry);
    header("location:bookings.php");
}

$querry = "select * from booking";
$result = mysqli_query($con, $querry);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>

<div class="container-fluid">
<table class="table table-striped pt-3">
    <tr class = "table-info">
        <th scope = "col">Bookind Id</th>
        <th scope = "col">Email</th>
        <th scope = "col">Movie Name</th>
        <th scope = "col">Theatre Name</th>
        <th scope = "col">Date</th>
        <th scope = "col">Time</th>
        <th scope = "col">Seats Reserved</th>
        <th scope = "col">Amount</th>
        <th scope = "col">Action</th>
    </tr>

    <?php while($fetch=mysqli_fetch_object($result)){?>
    <tr>
        <th scope = "row">
            <?php echo $fetch->b_id;?>
        </th>
        <td>
            <?php echo $fetch->email;?>
        </td>
        <td>
            <?php 
            $querry1 = "select * from shows where s_id='".$fetch->s_id."' ";
            $result1 = mysqli_query($con, $querry1);
            $fetch1=mysqli_fetch_object($result1);
            $querry2 = "select * from movie where mov_id='".$fetch1->mov_id."' ";
            $result2 = mysqli_query($con, $querry2);
            $fetch2=mysqli_fetch_object($result2);
            echo $fetch2->mov_name;?>
        </td>
        <td>
            <?php 
            $querry3 = "select * from theatre where theatre_id='".$fetch1->theatre_id."' ";
            $result3 = mysqli_query($con, $querry3);
            $fetch3=mysqli_fetch_object($result3);
            echo $fetch3->theatre_name;?>
        </td>
        <td>
            <?php echo $fetch1->date;?>
        </td>
        <td>
            <?php echo $fetch1->start_time;?>
        </td>
        <td>
            <?php echo $fetch->seats;?>
        </td>
        <td>
            <?php echo $fetch2->price * $fetch1->reserved_seats;?>
        </td>
        <td>
            <a href="bookings.php?del=<?php echo $fetch->b_id;?>">Delete</a>
        </td>
    </tr>
    <?php }?>
</table></div>
<?php include("include/footer.php");?>
    

</html>
