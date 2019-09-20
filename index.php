<?php include "includes/db.php"; ?>
<?php session_start(); ?>
<?php 
  function email_exits($email){
   global $conn;
   $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
  
   if(mysqli_num_rows($sql)>0){
       return true;
   }else{
       return false;
   }
}
function username_exits($username){
global $conn;
   $sql = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
   
   if(mysqli_num_rows($sql)>0){
       return true;
   }else{
       return false;
   }
}
$msg = '';
 // define variables and set to empty values
         $usernameErr = $emailErr = $passwordErr = $confirmpassErr = "";
         $username = $email = $password = $confirm_password = "";
         
if(isset($_POST['submit'])){
      


            if (empty($_POST["username"])) {
               $usernameErr = "<p class='text-center alert-danger'>username is required !!</p>";
            }
            else {
               $username = test_input($_POST["username"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "<p class='text-center alert-danger'>Email is required  !!</p>";
            }
            else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "<p class='text-center alert-danger'>Invalid email format  !!</p>"; 
               }
            }
            
           if (empty($_POST["password"])) {
               $passwordErr = "<p class='text-center alert-danger'>password is required  !!</p>";
            }else {
               $password = test_input($_POST["password"]);
            }
            if (empty($_POST["confirm-password"])){
               $confirmpassErr = "<p class='text-center alert-danger'> confirm password is required !!</p>";
            }else {
               $confirm_password = test_input($_POST["confirm-password"]);
            }

            if(($_POST["password"]) != ($_POST["confirm-password"])){
               $confirmpassErr = "<p class='text-center alert-danger'> both pass should be same !!</p>";
            }
             
   if(username_exits($username)){
               
      $usernameErr = "<p class='text-center alert-danger'>Username already exits try with other one!!</p>";
  
}
if(email_exits($email)){
               
   $emailErr = "<p class='text-center alert-danger'> E-mail already exits try with other one!!</p>";


}    
//    $sql = mysqli_query($conn,"SELECT * FROM users WHERE username ='$username'");
//    if(mysqli_num_rows($sql)>0){
//        $msg ="sorry username already register try with new one";
//    
//    }
//     $sql = mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");
//    if(mysqli_num_rows($sql)>0){
//        $msg ="sorry email already register try with new one";
//        
//    }
//      
            
           
    if(empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmpassErr)){
        
        


    
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $crypt_pass = password_hash($password,PASSWORD_BCRYPT,[10]);
    
      $sql = "INSERT INTO users(username,email,pass,user_role) VALUES('$username','$email','$crypt_pass','visiter')";
    $result = mysqli_query($conn,$sql);
    if($result){
      
    $msg = " <p class='text-center alert-success'>Registered successfully!!</p> ";
    }else{

        $msg = " <p class='text-center alert-danger'>something wrong !!</p> ";

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
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
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

<p class='text-center text-danger'></p>
</div>
<br>
<div class="container ">
<div class="row justify-content-center">
<div class="col-sm-4 border  bg-white">
<h4 class="text-center text-primary">CREATE ACCOUNT</h4>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<?php echo $msg; ?>
<?php echo $usernameErr; ?>
<div class="form-group">
<label for="name">User Name</label>
<input type="text" class="form-control" name="username" value="">

</div>
<div class="form-group">
<label for="email">E-mail</label><?php echo $emailErr ;?>
<input type="email" class="form-control" name="email" value="">

</div>
<div class="form-group">
<label for="password">Password</label><?php echo  $passwordErr;?>
<input type="password" class="form-control" name="password" value="">

</div>
<div class="form-group">
<label for="confirm-password">Confirm-password</label><?php echo $confirmpassErr ;?>
<input type="password" class="form-control" name="confirm-password" value="">

</div>
<div class="form-group">

<input type="submit" class="form-control btn text-white" name="submit" value="REGISTER">

</div>

</form>

<p>Have already an account ? <a href="login.php">Login Here</a> </p>
</div>



</div>

</div>


<?php include "includes/footer.php"; ?>