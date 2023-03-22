<?php 
session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}

include "connectivity.php";
$name = $_POST['name'];
$state = $_POST['state'];
$city = $_POST['city'];
$area = $_POST['area'];
 
$sql = "insert into zoo (name,state,city,area) values ('$name','$state','$city','$area')";
$result = mysqli_query($conn,$sql);
if($result) {
    echo "<br><div class='alert alert-success'>Zoo Added Successfully</div>";
}
else { 
    echo "<br><div class='alert alert-danger'>Problem in adding Zoo</div>";
}
?>