<?php
include "connectivity.php";
$sql = "select * from Animals where active='1'";
$result = mysqli_query($conn,$sql);
$val = mysqli_num_rows($result);
echo $val;
?>