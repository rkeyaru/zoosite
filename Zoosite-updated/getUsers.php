<!-- <script src="./index.js"></script> -->
<?php
session_start();
include "connectivity.php";
if (!isset($_SESSION['username'])) {
    header("Location:error.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $sql = "update users set active='0' where userId='$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            User Deleted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Not deleted
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}

$sql = "select firstName,lastName,email,password,userId,role from users where active='1';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "<div style='color:red;'>No result found</div>";
    die;
}
?>

<div id="userUpdate">
    
</div>
<div class="bg-dark text-center  p-3">
    <h3 class="text-light fw-bold">User List</h3>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-regular fa-plus"></i> New User
    </button>
</div>
<div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header  bg-dark">
                <h5 class="modal-title  text-light" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrapper">
                    <form class="form-signin" method="post">

                        <input type="text" class="form-control" id="fname" name="firstName" placeholder="First Name" required autofocus /><br>
                        <input type="text" class="form-control" id="lname" name="lastName" placeholder="Last Name" required />
                        <br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required  /><br>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                        <br>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="insertData()">Ok</button>
            </div>
        </div>
    </div>
</div>
 

<table class="table text-center align-middle table-striped  table-bordered" id="usertable">
    <thead>
        <tr>
            <th>
                User ID
            </th>
            <th>
                 Name
            </th>
          
            <th>
                Email
            </th>
            <th>
                Role
            </th>

            <th>
                Operation
            </th>

        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr id="row<?= $row['userId']; ?>">
                    <?php
                    $id = "entry" . $row['userId'];
                    ?>
                    <td><?= $row['userId'] ?></td>
                    <td><?= $row['firstName'] ?> <?= $row['lastName'] ?></td>
                   
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['role'] ?></td>
                   
                    <?php
                    $user_id = "update" . $row['userId'];
                    ?>
                    <td>
                        <button onclick="updateUser(this.id)" id="<?= $user_id; ?>" class="btn btn-sm btn-warning rounded-pill">Edit</button>
                        <button onclick="deleteDataUsers(this.id)" <?php echo "id=$id"; ?> class="btn me-2 rounded-pill btn-sm btn-danger">Delete</button>
                    </td>


            <?php

            }
        }
            ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>