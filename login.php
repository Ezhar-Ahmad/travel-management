<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query = $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
</head>
<script>
	
</script>
<body>
	<div class="container">
	<br><br><br><br><br>
	<div class="login" align="center">
		<img src="register.png" alt="">
		<form id="login" method="post">
			
			<label for="email">Email </label><br>
			<input type="text" name="email" id="email" placeholder="Email"><br><br>

			<label for="pass">Password </label><br>
			<input type="text" name="password" id="pass" placeholder="Password"><br><br>
			<br><br>
			<input type="submit" name="signin" id="submit" value="Login">
		</form>
	</div>
    </div>
</body>
</html>