<?php include "includes/db.php"; ?>
<?php session_start(); ?>
<?php 

$msg = '';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

$username = mysqli_real_escape_string($conn,$username);
$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
$confirm_password = mysqli_real_escape_string($conn,$confirm_password);
$crypt_pass = password_hash($password,PASSWORD_BCRYPT,[10]);


if($password === $confirm_password){
    $sql = "INSERT INTO users(username,email,pass,user_role) VALUES('$username','$email','$crypt_pass','visiter')";
    $result = mysqli_query($conn,$sql);
    if($result){
      
    $msg = " <p class='text-center alert-success'>Registered successfully!!</p> ";
        
       

    }else{

        $msg = " <p class='text-center alert-danger'>something wrong !!</p> ";

    }
}else{
    $msg = " <p class='text-center alert-danger'>Both password should be same</p> ";
}


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">
    <title>Register || Login</title>

    <style>
    
    body{
        background: #b92b27;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1565C0, #b92b27);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1565C0, #b92b27); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
font-family: 'Noto Serif', serif;
    }
    .btn{
        background: #b92b27;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1565C0, #b92b27);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1565C0, #b92b27);
    }
   
    .navbar {
        background: #b92b27;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1565C0, #b92b27);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1565C0, #b92b27);
    }
    </style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="register.php">Sign up</a>
      </li>
    
    </ul>
  </div>
</nav>



</div>


</div>

<p class='text-center text-danger'></p>
</div>
<br>
<div class="container ">
<div class="row justify-content-center">
<div class="col-sm-4 border  bg-white">
<h4 class="text-center text-primary">CREATE ACCOUNT</h4>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<?php echo $msg; ?>
<div class="form-group">
<label for="name">User Name</label>
<input type="text" class="form-control" name="username">

</div class="style">
<div class="form-group">
<label for="email">E-mail</label>
<input type="email" class="form-control" name="email">

</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password">

</div>
<div class="form-group">
<label for="confirm-password">Confirm-password</label>
<input type="password" class="form-control" name="confirm-password">

</div>
<div class="form-group">

<input type="submit" class="form-control btn text-white" name="submit" value="REGISTER">

</div>

</form>

<p>Have already an account ? <a href="login.php">Login Here</a> </p>
</div>



</div>

</div>
</div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>