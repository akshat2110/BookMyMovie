<?php
    include("connection.php");
    if(isset($_POST['insert']))
    {

        $file = ""; // initializing file name as blank
        if(isset($_FILES['file'])) 
        {
            $folder = "movie_image";
            // uploading
            $file_exts = array("jpg", "JPG", "JPEG", "bmp", "jpeg", "gif", "png", "doc", "docx", "pdf");
            $value = explode(".", $_FILES["file"]["name"]);
            $upload_exts = end($value);

            if((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/JPG")
            || ($_FILES["file"]["type"] == "image/JPEG")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "application/msword")
            || ($_FILES["file"]["type"] == "application/application/pdf"))
            && ($_FILES["file"]["size"] < 2000000000)
            && in_array($upload_exts, $file_exts))
            {
                if($_FILES["file"]["error"] > 0)
                {

                }
                else
                {
                    // Enter your path to <span id="IL_AD5"> class="IL_AD">upload file</span> here
                    if(file_exists(["folder/" . 
                    $_FILES]["file"]["name"]))
                    {
                        echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
                        " already exists. "."</div>";
                    }
                    else
                    {
                        //random name
                        $ran = md5(time().rand());
                        $file = $ran.".".$upload_exts;
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "$folder/".$file);
                    }
                }
            }
        }

        $querry="insert into movie set mov_name='".$_POST['mov_name']."', price='".$_POST['price']."', mov_image = '".$file."'";
        mysqli_query($con, $querry);
        header("location:movie.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");?>

<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<div class= " text-left">
    <a class="btn btn-info " href="movie.php">GO BACK</a>
</div>
<br>
<h3 class = "border-bottom">Add New Movie</h3>

<div class="form-group row pt-3">
<label for="moviename" class="col-sm-2 col-form-label">Movie Name </label>
<div class="col-sm-6">
<input class="form-control" type="text" name="mov_name" value="" />
</div>  
</div>

<div class="form-group row">
<label for="Price" class="col-sm-2 col-form-label">Price </label>
<div class="col-sm-6">
<input class="form-control" type="text" name="price" value="" />
</div>    
</div>

<div class="form-group row">
<label for="MovieImage" class="col-sm-2 col-form-label" >Movie Image</label>
<div class="col-sm-6">
    <input  type="file" name="file" id="file" />
</div>  
</div>
    <input type="submit" class="btn btn-info " name="insert" value="INSERT" />
    </form>
</div>



<?php include("include/footer.php");?>
</html>
