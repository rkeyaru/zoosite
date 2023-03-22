<?php

session_start();
if(isset($_SESSION['username'])) { 
include "adminheader.php";
}
else { 
include "header.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title></title>
  <style>
  body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./tiger1.jpg");

  /* Set a specific height */
  height: 100%;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Place text in the middle of the image */
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
  </style>
</head>

<body>
  
<div class="hero-image">
  <div class="hero-text">
    <h1>Zoo Site Park</h1>
    <p>Lorem, ipsum Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam sint laudantium dolore soluta illum ratione aut aliquam similique?.</p>
    <button class="btn btn-dark text-light">Explore</button>
  </div>
</div>  
  


  <footer class="bg-dark text-light p-3">
    <ul></li>
      <li><a href="#" class="text-decoration-none">Terms and Conditions</a></li>
      <li><a href="#" class="text-decoration-none">Privacy Policy</a></li>
      <li><a href="#" class="text-decoration-none">Copyright @ 2023</a></li>
    </ul>
  </footer>

</body>

</html>