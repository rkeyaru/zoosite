
<?php 
include "header.php";
include "connectivity.php";
session_start();
if(isset($_SESSION['username'])) { 
 header("Location:dashboard.php");
  exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
  $email = $_POST['email'];
  $password = $_POST['password']; 
  $sql = "select * from users where email='$email' and password='$password' and active='1';";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) == 1) {
    session_start();  
    $_SESSION['username'] = $email;
    header("Location:dashboard.php");

  } else {
    echo "<br><br>";
    echo "<div class='alert alert-danger'>Invalid email or password</div>";
    
  }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
     <link rel="stylesheet" href="login.css">
 
        
</head>

<body>
<div class="wrapper">
    <form class="form-signin" method="post" action="login.php" onsubmit="checkForm()">       
      <h3 class="form-signin-heading text-center me-3 mt-3 pt-3"> Log In</h3><br>
      <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <br>
      <button class="btn btn-sm btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>
</body>
</html>