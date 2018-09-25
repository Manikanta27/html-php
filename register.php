<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="">
	<title> Booking</title>
</head>
<body>			
			
			<div class="container">
				
				<form action="register.php" method="POST">

				
  <h2> Basic Details</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="First Name" placeholder="First Name" required="required">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="Last Name" placeholder="Last Name" required="required">
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required="required">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="userpassword" placeholder="Password" required="required">
  </div>

  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

        <?php
        if(isset($_POST['submit']))
        {
        include "connection.php";
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $useremail=$_POST['useremail'];
        $userpassword=md5($_POST['userpassword']);

        if($_SERVER["REQUEST_METHOD"]=="POST")
        $reg= "INSERT INTO user_register(first_name,last_name,user_email,user_password) VALUES ('$firstname','$lastname','$useremail','$userpassword')";
        mysqli_query($conn,$reg);
        header("location:register.php");
        }

          ?>


</body>
</html>