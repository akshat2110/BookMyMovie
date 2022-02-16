<?php
include("connection.php");
if(isset($_POST['insert']))
{
    $querry="insert into shows set mov_id='".$_POST['movie']."',theatre_id='".$_POST['theatre']."',date='".$_POST['date']."',start_time='".$_POST['start_time']."',end_time='".$_POST['end_time']."'";
	mysqli_query($con,$querry);
	header("location:shows.php");

}
$querry="select * from movie";
$result=mysqli_query($con,$querry);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>


<div class="container">
<div class= " text-left">
    <a class="btn btn-info " href="shows.php">GO BACK</a>
</div>
<br>
<form method="post" action="" enctype="multipart/form-data">
<h3 class = " border-bottom">Add New Show</h3>

<div class="form-group row pt-3">
<label for="moviename" class="col-sm-2 col-form-label">Select Movie </label>
<div class="col-sm-6">
<select class="form-control mx-sm-3" name="movie" id="movie" required>
				<?php while($fetch=mysqli_fetch_object($result))
				{
					?><option value="<?php echo $fetch ->mov_id;?>"><?php echo $fetch->mov_name;?></option><?php 
				}?>
				</select>
</div>  
</div>

<div class="form-group row">
<label for="Price" class="col-sm-2 col-form-label">Select Theatre </label>
<div class="col-sm-6">
<select  class="form-control mx-sm-3" name="theatre" id="theatre" required>
				<?php
				$querry="select * from theatre";
				$result=mysqli_query($con,$querry);
				while($fetch=mysqli_fetch_object($result))
				{
					?><option value="<?php echo $fetch ->theatre_id;?>">
					<?php echo $fetch->theatre_name." HALL-" .$fetch->hall_id;?></option><?php 
				}?>
				</select>
</div>  
</div>

<div class="form-group row">
<label for="date" class="col-sm-2 col-form-label">Date </label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="date" name="date" value="" min ="<?php echo  date("Y-m-d",strtotime("tomorrow"));?>"required/>
</div>    
</div>

<div class="form-group row">
<label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="time" name="start_time" value="" min="9:00" max="20:00" required/></div>    
</div>

<div class="form-group row">
<label for="end_time" class="col-sm-2 col-form-label">End Time </label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="time" name="end_time" value="" min="12:00" max="23:00" required/></div>    
</div>

<input type="submit" class="btn btn-info " name="insert" value="INSERT" />
    </form>
</div>

<?php include("include/footer.php");?>
</html>