<?php include "includes/db.php"; ?>
<?php session_start(); ?>
<?php 
  $usernameErr = $passwordErr = "";
$username = $password = "";
if(isset($_POST['submit'])){

  
    if (empty($_POST["username"])) {
               $usernameErr = "<p class='text-center alert-danger'>username is required !!</p>";
            }else {
               $username = test_input($_POST["username"]);
            }
            
    if (empty($_POST["password"])) {
               $passwordErr = "<p class='text-center alert-danger'>password is required  !!</p>";
            }else {
               $password = test_input($_POST["password"]);
            }
  
     if(empty($usernameErr) && empty($passwordErr)){
         
         $username = mysqli_real_escape_string($conn,$username);
         $password = mysqli_real_escape_string($conn,$password);

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn,$query);
if(!$result){
  die("query failed".mysqli_error($conn));
}

while($row=mysqli_fetch_array($result)){
 
$user_id= $row['id'];
$db_username = $row['username'];
$db_password = $row['pass'];


if(password_verify($password,$db_password)){
 
  $_SESSION['username'] = $db_username;
  $_SESSION['pass'] = $db_password;
  header("Location: user.php");
}
else{
  $msg = "<p class='text-center alert-danger'>sorry !! you are not registered User</p>";
}
}

         
     }

  

}

function test_input($data) {
             global $conn;
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
          
             
            return $data;
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
      
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php">Sign up</a>
      </li>
    
    </ul>
  </div>
</nav>



</div>


</div>


</div>
<br>
<div class="container ">
<div class="row justify-content-center">
<div class="col-sm-4 border  bg-white">
<h4 class="text-center text-primary">Login</h4>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<div class="form-group">

<label for="name">User Name</label>
<input type="text" class="form-control" name="username"><?php echo $usernameErr; ?>
</div>

<div class="form-group">

<label for="password">Password</label>
<input type="password" class="form-control" name="password"><?php echo $passwordErr; ?>

</div>

<div class="form-group">

<input type="submit" class="form-control btn text-white" name="submit" value="Sign In">

</div>

</form>
<p>Don't have an account ? <a href="index.php">Sign Up here</a> </p>

</div>

<div class="col-sm-2">
    
    
</div>


</div>
    </div>



<?php include "includes/footer.php"; ?>