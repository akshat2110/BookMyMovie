<?php
include("connection.php");
if(isset($_POST['click']))
{
	$querry="update shows set mov_id='".$_POST['movie']."',date='".$_POST['date']."',start_time='".$_POST['start_time']."',end_time='".$_POST['end_time']."' where s_id='".$_REQUEST['id']."'";
	mysqli_query($con,$querry);
	header("location:shows.php");
}
$querry="select * from shows where s_id='".$_REQUEST['id']."'";
$result=mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);
$querry1="select * from movie ";
$result1=mysqli_query($con,$querry1);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>

<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<div class= " text-left">
    <a class="btn btn-info " href="shows.php">GO BACK</a>
</div>
<br>
<h3 class = " border-bottom">Edit Show</h3>

<div class="form-group row pt-3">
<label for="moviename" class="col-sm-2 col-form-label">Select Movie </label>
<div class="col-sm-6">
<select class="form-control mx-sm-3" name="movie" id="movie">
<?php while($fetch1=mysqli_fetch_object($result1)){?>

	<option value="<?php echo $fetch1 ->mov_id;?>"<?php if($fetch -> mov_id == $fetch1 ->mov_id){?> selected="selected"<?php }?>>
	<?php echo $fetch1->mov_name;?></option><?php 
	}
?></select>
</div>  
</div>

<div class="form-group row">
<label for="date" class="col-sm-2 col-form-label">Date </label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="date" name="date" value="<?php echo $fetch->date;?>" min ="<?php echo  date("Y-m-d",strtotime("tomorrow"));?>"required/>
</div>    
</div>

<div class="form-group row">
<label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="time" name="start_time" value="<?php echo $fetch->start_time;?>" min="9:00" max="20:00" required/></div>    
</div>

<div class="form-group row">
<label for="end_time" class="col-sm-2 col-form-label">End Time </label>
<div class="col-sm-6">
<input class="form-control mx-sm-3" type="time" name="end_time" value="<?php echo $fetch->end_time;?>" min="12:00" max="23:00" required/></div>    
</div>

<input class="btn btn-info " type="submit" name="click" value="UPDATE" />
    </form>
</div>

<?php include("include/footer.php");?>
</html>
