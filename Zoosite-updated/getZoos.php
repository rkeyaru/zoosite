<?php
session_start();
include "connectivity.php";
if (!isset($_SESSION['username'])) {
    header("Location:error.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $sql = "update zoo set active='0' where id='$id'";
    if (mysqli_query($conn, $sql)) {
        // echo "deleted successfully";
    } else {
        echo "Record not deleted";
    }
}


$sql  = "select id,name,state,city,area from zoo where active='1'";
$result = mysqli_query($conn, $sql);

?>


 
<div class="bg-dark text-center  p-3">
    <h3 class="text-light fw-bold">Zoo List</h3>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#zooModal">
        <i class="fa-regular fa-plus"></i> New Zoo
    </button>
</div>
<div class="modal  fade" id="zooModal" tabindex="-1" aria-labelledby="zooModalLabel" aria-hidden="true" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header  bg-dark">
                <h5 class="modal-title  text-light" id="zooModalLabel">Add Zoo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrapper">
                    <form class="form-signin" method="post">

                        <input type="text" class="form-control" id="name" name="name" placeholder="Zoo Name" required="" autofocus="" /><br>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required="" /><br>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required="" /><br>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Area" required="" /><br>



                        

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"   onclick="insertZoo()">Ok</button>
            </div>
        </div>
    </div>
</div>



<table class=" table text-center align-middle table-striped  table-bordered" id="zootable">
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                Name
            </th>
            <th>
                State
            </th>
            <th>
                City
            </th>
            <th>
                Area
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
                <tr id="row<?= $row['id']; ?>">
                    <?php
                    $id = "entry" . $row['id'];
                    // $zoo_id = $row['id'];
                    $zoo_id = "update" . $row['id'];

                    ?>
                    <td><?= $row['id'] ?> </td>
                    <td><?= $row['name'] ?> </td>
                    <td><?= $row['state'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['area'] ?></td>

                    <td class="text-center">
                        <!-- <a <? //php echo"href='editzoo.php?id=$zoo_id'"
                                ?> class="m-1 btn btn-sm rounded-pill btn-info" >Edit</a> -->
                        <button onclick="updateZoo(this.id)" id="<?= $zoo_id; ?>" class="btn btn-sm btn-warning rounded-pill">Edit</button>
                        <button onclick="deleteData(this.id)" <?php echo "id=$id"; ?> class="btn btn-sm btn-danger rounded-pill ">Delete</button>
                    </td>

            <?php
            }
        }
            ?>
    </tbody>
</table>
