<?php
 $conn = mysqli_connect('localhost','root','','register');
 if(!$conn){
     echo " not connected ".mysqli_error($conn);
 }



?>