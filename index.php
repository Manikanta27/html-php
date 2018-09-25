<?php include 'navbar.php'; ?>
<!-- <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="">
	<title> Booking</title>
</head>
<script type="text/javascript">
	
	function popup(name)

	{
			window.print("wrong password/id"+name");
	}
</script>
<body>	 -->		
			
			<div class="container">
				<a href="register.php"><h3> Register Here</h3></a>

				<form action="index.php" method="POST">

				
  <h2> Login Details</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required="required">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required="required">
  </div>

  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

				




<?php 
//session_start();
if(isset($_POST['submit']))
 {

	include "connection.php";
	
		$username=$_POST['useremail'];
		$userpassword=md5($_POST['password']);
		// $pas="0c12278389532e91c601af4c8adef7";
		// echo $pas;
		// echo $userpassword;
		//echo $_POST['password'];
		//echo $userpassword;
		$log= ("SELECT * FROM user_register WHERE user_email='$username' AND user_password='$userpassword'");
		$result=mysqli_query($conn,$log);
		if(mysqli_num_rows($result)>0)
			{
				 while($rows=mysqli_fetch_array($result)){ 
				$_SESSION['id']=$rows['id'];
			}
			header("location:tiffin.php");
			}
		else{
			echo '<div class="alert alert-danger" role="alert">';

 			 echo 'Username or password is incorrect!';
			echo '</div>';
		}
		
 }


?>