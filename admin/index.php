<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname);
$query-> bindParam(':password', $password);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Sign in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/formstyle.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<div class="container">
	<br><br><br><br><br>
	<div class="login" align="center">
        
		<img src="register.png" alt=""><br><br>
		<h2>Welcome To Admin Panel</h2><br>
		<form  method="post">
			<label for="name">User Name </label><br>
			<input type="text" name="username" id="pass" placeholder="UserName"><br><br>
            <label for="pass">Password </label><br>
			<input type="text" name="password" id="pass" placeholder="Password"><br><br>
			<br><br>
					<input type="submit"  name="login" value="Sign In">


		</form>
				
	</div>
	</div>
	</div>
</body>
</html>