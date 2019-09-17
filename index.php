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

<?php include "includes/header.php"; ?>
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

<?php include "includes/footer.php"; ?>