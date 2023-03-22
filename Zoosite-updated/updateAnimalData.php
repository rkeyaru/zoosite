<?php 
include "connectivity.php";
$aid = $_POST['aid'];
$zid = $_POST['zid'];
$aname = $_POST['aname'];
$gender = $_POST['gender'];
$sname = $_POST['sname'];
$sql = "update Animals set name = '$aname' , s_name = '$sname',gender= '$gender' where id = '$aid'";
if(!mysqli_query($conn,$sql)) { 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Error in updating Animals
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  die;

}


$sql = "update animal_zoo_map set zoo_id = '$zid' where animal_id = '$aid'";
if(mysqli_query($conn,$sql)) { 
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Error in updating Animals
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
?>