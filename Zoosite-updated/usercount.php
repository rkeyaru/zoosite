<?php
session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}
include "connectivity.php";
$sql = "select * from users where active='1'";
$result = mysqli_query($conn,$sql);
$val = mysqli_num_rows($result);
echo $val;
?>