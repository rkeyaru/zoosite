<?php 
session_start();
include "connectivity.php";
if(!isset($_SESSION['username'])) { 
header("Location:index.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <a href="index.php" class="fst-italic fw-bold ms-3 p-2  navbar-brand">Zoo Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav ms-auto px-3"> 
        <li class="nav-item">
            <a href="" class="nav-link"><?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
        <a href="logout.php" style="display:inline-flex;" class="p-2 btn-outline-danger rounded-pill nav-link  ">Log out</a>
        </li>

    </ul>

</div> 
    </nav>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>