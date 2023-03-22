<?php
session_start();
include "connectivity.php";
if (!isset($_SESSION['username'])) {
    header("Location:error.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $sql = "update Animals set active='0' where id='$id'";
    if (mysqli_query($conn, $sql)) {
        // echo "Record deleted successfully";
    } else {
        echo "Record not deleted";
    }
}


$sql = "select a.id as aid,a.name as aname,a.s_name,a.gender  ,z.name as zname,z.id as zid from Animals as a\n"

    . "join animal_zoo_map as map on map.animal_id= a.id\n"

    . "join zoo as z on map.zoo_id = z.id where a.active ='1'";
$result = mysqli_query($conn, $sql);

$sql2 = "select id,name,state,city from zoo where active='1';";
$result2  = mysqli_query($conn, $sql2);

?>

<div id="animalUpdate">
    
</div>
<div class="bg-dark text-center p-3">
    <h3 class="text-light fw-bold">Animal List</h3>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-regular fa-plus"></i> New Animal
    </button>
</div>
<div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h5 class=" text-light modal-title" id="exampleModalLabel">Add Animal</h5>
                <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" name="name" id="name" required><br> 
                    <label for="gender">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="m" >
                        <label class="form-check-label" for="male">
                           Male
                        </label>
                    </div>
                   
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" checked value="f" >
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    <br>
 
 
                    <label for="s_name">Scientific Name:</label>
                    <input class="form-control" type="text" name="s_name" id="s_name"><br> 
                    
                    <label for="zoo">Choose a Zoo:</label>

                    <select class="form-select" aria-label="Default select example" name="zoo" id="zooOptions">
                    <?php
                    while($row2 = mysqli_fetch_assoc($result2)) {
                       ?>
                       <option value="<?= $row2['id']?>"><?= $row2['name']?>,<?= $row2['city']?></option>
                       <?php
                    }
                     ?>                        
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="insertAnimalData()">Ok</button>
            </div>
        </div>
    </div>
</div>



<table class="  table text-center align-middle table-striped   table-bordered" id="animaltable">
    <thead>
        <tr>
            <th>
                Animal Id
            </th>
            <th>
                Animal Name
            </th>
            <th>
               Animal Gender
            </th>
            
                <th>Scientific Name</th>    
                <th>
                    Zoo Name
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
                <tr id="row<?= $row['aid']?>">
                    <?php
                    $id = "entry" . $row['aid'];
                    $animal_id = $row['aid'];
                    ?>
                    <td><?= $row['aid'] ?></td>
                    <td><?= $row['aname'] ?> </td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['s_name'] ?></td>
                    
                    <?php 
                    $query = "select * from zoo where active = '1';";
                    $ans   = mysqli_query($conn, $query);
                    ?>
                    <td>
                        <select name="" id="zooOption<?= $row['aid']; ?>" class="form-select" disabled>
                            <option selected value="<?= $row['zid'] ?>"><?= $row['zname']; ?></option>
                            <?php 
                            while($data = mysqli_fetch_assoc($ans)) {
                               ?>
                                <option value="<?= $data['id']?>"><?= $data['name'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                     
            

                    <td>
                        
                    <button onclick="updateDataAnimals(this.id)" <?php echo "id=update$animal_id"; ?> class="btn btn-sm btn-warning rounded-pill">Edit</button>
                        <button onclick="deleteDataAnimals(this.id)" <?php echo "id=$id"; ?> class="btn btn-sm btn-danger rounded-pill">Delete</button>
                    </td>

            <?php

            }
        }
            ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>