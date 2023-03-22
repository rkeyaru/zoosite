<?php 
session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}
include "connectivity.php";
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_id = $_POST['id'];
$sql = "UPDATE users
SET firstName = '$firstName',lastName = '$lastName',email = '$email',password = '$password'
WHERE userId = '$user_id';";
$result = mysqli_query($conn,$sql);
if($result) { 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Error in updating user.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>