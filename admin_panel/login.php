<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Movie Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href ="include/style.css">
</head>
<body class=" bg-light d-flex flex-column min-vh-100" >

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom shadow-sm" style="background-color: #e2f3fd!important; ">
  <div class = "my-0 mr-auto">
  <h5 class=" font-weight-normal">BookMyMovie</h5>
      <small>Team: Adrija Guha, Akshat Mantry</small>
  </div>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="btn btn-outline-info" href="../index.php">Logout</a>
  </nav>
</div>

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-12 col-sm-6 col-md-4">
<form class="form-container" style="background-color: #F0F0F0!important;" method ="post" action="login_do.php" enctype="multipart/form-data">
  <div class="form-group">
  <h3 class = "text-center border-bottom" style="color: #17a2b8!important;">Please Log-in</h3>
    <label for="exampleInputEmail1" class="pt-3" style="color: #17a2b8!important;">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color: #17a2b8!important;">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <input type="submit" class="btn btn-primary btn-block" style="background-color: #17a2b8!important;" name="login" value="LOGIN" >
</form>
</div>
</div>

</div>

<footer class="mastfoot mt-auto text-center fixed-bottom border-top pt-4 bg-light" style="background-color: #e2f3fd!important; ">
    <div class="inner">
      <p>Team: Adrija Guha, Akshat Mantry</p>
    </div>
</footer>
</body>
</html>

