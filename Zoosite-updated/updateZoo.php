<?php 
session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}
include "connectivity.php";
$user_id = $_POST['id'];
$name  = $_POST['name'];
$state= $_POST['state'];
$city= $_POST['city'];
$area= $_POST['area'];
 
$sql = "UPDATE zoo SET name = '$name',state= '$state' , city = '$city' , area  = '$area'  WHERE id = '$user_id';";
$result = mysqli_query($conn,$sql);
if ($result) { 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else { 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Error in updating zoo
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
};
?>