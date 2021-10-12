<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/formstyle.css">
</head>

<body>
	<div class="container">
	<br><br><br><br><br>
	<div class="error"></div>
	<div class="register">
		<img src="register.png" alt="">
		<form name="myform" id="register" method="post">
			
			<label for="fullname">Full Name </label><br>
			<input type="text" name="fname" id="fname" placeholder="Full Name"><br><br>

			<label for="mob">Mobile Number </label><br>
			<input type="text" name="mobilenumber" id="phone" placeholder="Mobile Number"><br><br>
			<label for="Email">Email id </label><br>
			<input type="text" name="email" id="email" placeholder="Email Id"><br><br>
            <label for="pass">Password </label><br>
			<input type="text" name="password" id="pass" placeholder="Password"><br><br>
			<br><br>
       <input type="submit" name="submit" id="submit" value="Sign Up">
		</form>
	</div>
	</div>

</body>
</html>