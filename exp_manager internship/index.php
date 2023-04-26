<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/index.css">


</head>
<body>
	
<header><center> 
	<div>
		<ul>
		<li class="nav-item">
    
        <button type="button" id="login" data-bs-toggle="modal" data-bs-target="#exampleModal">
  LOGIN
</button>
        <button type="button" id="register" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  REGISTER
</button>
    </li></ul>
	</div>


<?php
include 'connect.php';
         if(isset($_POST['register'])){
          $name = trim($_POST['name']);
        $email = trim($_POST['email']);
         $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);

        $check = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' OR `phone` = '$phone'; ");
      $count = mysqli_num_rows($check);
      if($count > 0){
  echo "Email or phone already registered";
}
else{
  $save = mysqli_query($conn, "INSERT INTO `user` (`name`,`email`,`phone`,`password`) VALUES ('$name','$email','$phone','$password');");

    if($save){
      echo " Data saved succesfully";

    }
    else{
      echo"Error saving data";
          }
}
}

if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
         $check = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'; ");
      $count = mysqli_num_rows($check);
      if($count > 0){
  $_SESSION['email']=$email;
  header("Location: home.php?");
}
  else{
  echo "Email and password donot match";
}
}

        ?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="index.php">
        	<label><B>EMAIL</B></label>
        	<input type="email" name="email" class="form-control" placeholder="USER NAME">
        	<label><b> PASSWORD</b></label>
        	<input type="password" name="password" class="form-control" placeholder="PASSWORD"><br>
        	<input type="submit" name="login" value="login">
        </form>
      </div>
      
    </div>
  </div>
</div>





<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
        	<label> NAME</label>
        	<input type="text" name="name" placeholder="NAME" class="form-control"><br>
        	<label>EMAIL-ID</label>
        	<input type="email" name="email" placeholder="EMAIL-ID" class="form-control"><br>
        	<label>MOBILE NUMBER</label>
        	<input type="number" name="phone" placeholder="MOBILE NUMBER" class="form-control"><br>
        	<label>PASSWORD</label>
        	<input type="password" name="password" placeholder="PASSWORD" class="form-control"><br>
        	<div class="d-grid gap-2">
        	<input type="submit" name="register" value="register"></div>
        </form>

      </div>
      
    </div>
  </div>
</div>




 


        
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</header>
</center>
</body>
</html>