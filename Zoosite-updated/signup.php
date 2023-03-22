<?php
include "header.php";
$exists = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include "connectivity.php";
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
 

  $sql = "SELECT * FROM users WHERE email='$email' and active='1'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<br><br>";
    echo '<div class="alert alert-danger">User already exists</div>';
  } else {
    $sql = "INSERT INTO users (firstName,lastName,email,password,role) VALUES ('$firstName','$lastName','$email','$password','$role')";
 
    $result = mysqli_query($conn,$sql);
    if ($result) {
      echo "<br><br>";
      echo '<div class="alert alert-success">Registered Successfully</div>';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="login.css">
 
</head>

<body>
  <div class="wrapper">
    <form class="form-signin" method="post" action="signup.php" onsubmit="return checkForm()">
      <h3 class="form-signin-heading text-center mt-3">Sign Up</h3><br>
       

      <input type="text" class="form-control" name="firstName" placeholder="First Name" required="" autofocus="" /><br>
      <input type="text" class="form-control" name="lastName" placeholder="Last Name" required="" />
      <br>
      <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" /><br>
      <select name="role" class="form-select"  >
        <option value="user">User</option>
        <option value="employee">Employee</option>
        <option value="manager">Manager</option>
        <option value="admin">Admin</option>
        

      </select>
      <br>
      <input type="password" class="form-control" name="password" placeholder="Password" id="pass" required="" />

      <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" id="cpass" required="" />

      <button class="btn btn-sm btn-primary btn-block" type="submit">sign up
      </button>
    </form>
  </div>
  <script>
    function checkForm() {
      if (document.getElementById("pass").value != document.getElementById("cpass").value) {
        alert("password do not match");
        return false;
      }
      return true;
    }
  </script>
</body>

</html>