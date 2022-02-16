<?php
    include("connection.php");
    if(isset($_POST['insert']))
    {
        $querry="insert into theatre set theatre_name='".$_POST['theatre_name']."', hall_id='".$_POST['hall_id']."', capacity='".$_POST['seat_capacity']."'";
        mysqli_query($con, $querry);
        header("location:theatre.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>

<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<div class= " text-left">
    <a class="btn btn-info " href="theatre.php">GO BACK</a>
</div>
<br>
<h3 class = " border-bottom">Add New Theatre</h3>

<div class="form-group row pt-3">
<label for="TheatreName" class="col-sm-2 col-form-label">Theatre Name</label>
<div class="col-sm-6">
<input class="form-control" type="text" name="theatre_name" value=""  required/>
</div>  
</div>

<div class="form-group row">
<label for="Hall" class="col-sm-2 col-form-label">Hall No.</label>
<div class="col-sm-6">
<input class="form-control" type="text" name="hall_id" value="" required />
</div> 
</div>

<div class="form-group row">
<label for="SeatCapacity" class="col-sm-2 col-form-label">Seat Capacity</label>
<div class="col-sm-6">
<input class="form-control" type="number" min="30" max="100" name="seat_capacity" value="" required />
</div> 
</div>

    <input type="submit" class="btn btn-info  " name="insert" value="INSERT" />
    </form>
</div>

<?php include("include/footer.php");?>
</html>