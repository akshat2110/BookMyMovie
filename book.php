<?php
include("connection.php");

if(isset($_POST['insert']))
{
	$querry = "select email,b_id from booking where s_id in ( select s_id where s_id='".$_REQUEST['id']."')";
	$result = mysqli_query($con,$querry);
	while($fetch = mysqli_fetch_object($result)){
		if($fetch->email == $_POST['email']){
			break;
		}
	}
	if($fetch->email == $_POST['email'])
    { ?>
        <div class="alert alert-danger" role="alert">
            You already have a booking with this email!! Redirecting you to HOMEPAGE in 5 seconds...
        </div>
        <?php header('Refresh: 5; index.php');
    }
	else {
        $querry="insert into booking set f_name='".$_POST['first_name']."',l_name='".$_POST['last_name']."',email='".$_POST['email']."',phone='".$_POST['phone']."',seats='".$_POST['seats']."', s_id = '".$_REQUEST['id']."'";
        mysqli_query($con,$querry);
        $querry = "select reserved_seats from shows where s_id='".$_REQUEST['id']."'";
        $result = mysqli_query($con,$querry);
        $fetch = mysqli_fetch_object($result);
        $querry="update shows set reserved_seats='".strval((int)($fetch->reserved_seats)+(int)$_POST['seats'])."' where s_id='".$_REQUEST['id']."'";
        mysqli_query($con,$querry);
        $querry="select b_id from booking where email='".$_POST['email']."' and  s_id = '".$_REQUEST['id']."'";
        $result = mysqli_query($con,$querry);
        $fetch = mysqli_fetch_object($result);
        header("location:checkout.php?id=".$fetch->b_id);
    }
}

$querry="select * from movie";
$result=mysqli_query($con,$querry);
?>

<!DOCTYPE html>

<html>

<body class="d-flex flex-column min-vh-100">
        <?php include("include/header.php")?>
        <div id="content-wrap" style="text-align: center; padding: 0;"> 
        <br> 
        <div class= " text-left">
            <a class="btn btn-info " href="index.php">GO BACK</a>
        </div>

        <form method ="post" style="display: inline-block;  margin: 50px;">

            <div class="row">
                <div class="col-auto">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="col-auto">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-auto">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <?php
                $querry = "select theatre_id,reserved_seats from shows where s_id='".$_REQUEST['id']."'";
                $result = mysqli_query($con,$querry);
                $fetch = mysqli_fetch_object($result);
                $querry = "select capacity from theatre where theatre_id='".$fetch->theatre_id."'";
                $result = mysqli_query($con,$querry);
                $fetch1 = mysqli_fetch_object($result);
                $available = strval((int)$fetch1->capacity-(int)$fetch->reserved_seats);
                ?>	
                
                <div class="col-auto">
                    <label for="seats" class="col-form-label">Enter number of seats</label>
                    <input type="number" name="seats" class="form-control" max="<?php echo $available;?>" required>
                    <label></label>
                </div>
                <div class="col-auto">
                    <span id="" class="form-text">
                    (Available : <?php echo $available;?>)
                    </span>
                </div>
            </div>

            <button type="submit" name="insert" class="btn btn-primary">Confirm</button>
        </form>
        </div>
        <?php include("include/footer.php")?>
</body>

</html>
