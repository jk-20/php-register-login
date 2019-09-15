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
    
    </style>
</head>
<body>

<br>
<div class="container ">
<div class="row justify-content-center">
<div class="col-sm-4 border  bg-white">
<h4 class="text-center text-primary">Login</h4>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="form-group">
<label for="name">User Name</label>
<input type="text" class="form-control" name="name">

<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password">

</div>

<div class="form-group">

<input type="submit" class="form-control btn text-white" name="submit" value="Sign In">

</div>

</form>
<p>Don't have an account ? <a href="index.php">Sign Up here</a> </p>

</div>




</div>

</div>
</div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>