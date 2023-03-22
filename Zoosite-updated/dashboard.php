<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
include "connectivity.php";
include "adminheader.php";
$sql = "select count(*) from users where active='1'";
$result = mysqli_query($conn, $sql);
$user_count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user_count = $row['count(*)'];
    }
}
$sql = "select count(*) from zoo where active='1'";
$result = mysqli_query($conn, $sql);
$zoo_count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $zoo_count = $row['count(*)'];
    }
}
$sql = "select count(*) from Animals where active='1'";
$result = mysqli_query($conn, $sql);
$animal_count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $animal_count = $row['count(*)'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">


    <title>Document</title>

    <script src="./index.js"></script>
    <script>
      
    </script>

</head>

<body>

    <div id="result"></div>
    <div class="container m-5">
        <div class="row row-cols-1 row-cols-lg-3 justify-content-center">
            <div class="col py-1 p">
                <div class="dashboard1 p-5 text-center">
                    <i class="fa-regular fa-roller-coaster fa-3x"></i>
                    <h1 class="text-light" id="zooCount">Zoo count:<?= $zoo_count; ?></h1>
                    <button onclick="showZoos()" id="zoo" class=" mt-2 btn btn-dark">Show Zoos</button>
                </div>
            </div>
            <div class="col py-1">
                <div class="dashboard2 p-5 text-center">

                    <!-- <i class="fa-solid fa-user fa-3x"></i> -->
                    <h1 class="text-light" id="userCount">User count:<?= $user_count ?></h1>
                    <button onclick="showUsers()" id="user" class=" mt-2 btn btn-dark">Show User </button>
                </div>
            </div>
            <div class="col py-1">
                <div class="dashboard3 px-3 py-5 text-center">
                    <!-- <span>  <i class="fa-solid fa-hippo fa-3x"></i></span> -->
                    <h1 class="text-light" id="animalCount">Animal count:<?= $animal_count; ?></h1>
                    <button onclick="showAnimals()" id="animal" class=" mt-2 btn btn-dark">Show Animal </button>
                </div>
            </div>
        </div><br><br>
        <div id="data" class=""></div>
    </div>


    <div id="error">

    </div>




</body>

</html>