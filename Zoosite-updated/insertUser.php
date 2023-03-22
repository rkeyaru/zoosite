<?php 

session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}
$exists =false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connectivity.php";
   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $email = $_POST['email'];
   $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email' and active='1'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0) { 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    User already exists
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    
  }
  else {
    $sql = "INSERT INTO users(firstName,lastName,email,password) VALUES ('$firstName','$lastName','$email','$password')";
    $result = mysqli_query($conn,$sql);
    if($result) { 
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      User added Successfully
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  
  }







   
  }
   
?>