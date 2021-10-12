<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit6']))
	{
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_SESSION['login'];

$sql="update tblusers set FullName=:name,MobileNumber=:mobileno where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
		<h1 style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">TMS-Tourism Management System</h1>

<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy" align="center">
		<h3 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Change Password</h3>
		<form name="chngpwd" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	<p style="width: 350px;">
		
			<b>Name</b>  <br><input type="text" name="name" value="<?php echo htmlentities($result->FullName);?>" class=" " id="name" required="">
	</p> 

<p style="width: 350px;">
<b>Mobile Number</b><br>
<input type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" id="mobileno"  required="">
</p>

<p style="width: 350px;">
<b>Email Id</b><br>
	<input type="email" name="email" value="<?php echo htmlentities($result->EmailId);?>" id="email" readonly>
			</p>
<p style="width: 350px;">
<b>Last Updation Date : </b>
<?php echo htmlentities($result->UpdationDate);?>
</p>

<p style="width: 350px;">	
<b>Reg Date :</b>
<?php echo htmlentities($result->RegDate);?>
			</p>
<?php }} ?>

			<p style="width: 350px;">
<button type="submit" name="submit6" class="bbtn">Updatee</button>
			</p>
			</form>
</div>
    </div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>