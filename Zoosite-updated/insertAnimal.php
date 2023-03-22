<?php 
session_start();
include "connectivity.php";
if(!isset($_SESSION['username']) ) { 
header("Location:index.php");
}

include "connectivity.php";
$name= $_POST['name'];
$gender =  $_POST['gender'];
$zoo_id = $_POST['zoo_id'];
$sname = $_POST['s_name'];

 
 $sql = "insert into Animals (name,gender,s_name) values ('$name','$gender','$sname')";
 if(!mysqli_query($conn, $sql)) { 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
die;
 }
 

 $sql = "SELECT LAST_INSERT_ID();";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 $animal_id = $row[0];
 
 
 $sql = "insert into animal_zoo_map (zoo_id,animal_id) values ('$zoo_id','$animal_id')";
 if(mysqli_query($conn,$sql)) { 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Inserted Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

 }
 else { 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

 }

?>