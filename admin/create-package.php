<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";
 $con = mysqli_connect($servername, $username, $password, $dbname);
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$pname=$_POST['packagename'];
$ptype=$_POST['packagetype'];	
$plocation=$_POST['packagelocation'];
$pprice=$_POST['packageprice'];	
$pfeatures=$_POST['packagefeatures'];
$pdetails=$_POST['packagedetails'];	
$pimage=$_FILES["packageimage"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
$sql="INSERT INTO TblTourPackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) VALUES('$pname','$ptype','$plocation','$pprice','$pfeatures','$pdetails','$pimage')";
$result = $con->query($sql);
if($result)
{
$msg="Package Created Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Package Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <div class="page-container">
<div class="left-content">
	   <div class="mother-grid-inner">
<?php include('includes/header.php');?>
				</div>
 	<div class="grid-form">
  <div class="grid-form1" align="center">
  	       <h3>Create Package</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="form">
							<form class="form1" name="package" method="post" enctype="multipart/form-data">
								<div class="form2">
									<label>Package Name</label>
									<div class="p_name">
										<input type="text" name="packagename" id="packagename" placeholder="Create Package" required>
									</div>
								</div>
<div class="form">
									<label>Package Type</label>
									<div class="type">
										<input type="text" class=" 1" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" required>
									</div>
								</div>

<div class="form">
									<label>Package Location</label>
									<div class="location">
										<input type="text" class=" 1" name="packagelocation" id="packagelocation" placeholder=" Package Location" required>
									</div>
								</div>

<div class="form">
									<label>Package Price in PKR</label>
									<div class="price">
										<input type="text" class=" 1" name="packageprice" id="packageprice" placeholder=" Package Price is PKR" required>
									</div>
								</div>

<div class="form">
									<label>Package Features</label>
									<div class="feature">
										<input type="text" class=" 1" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" required>
									</div>
								</div>		


<div class="form">
									<label>Package Details</label>
									<div class="detail">
										<textarea class=" " rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required></textarea> 
									</div>
								</div>															
<div class="form">
										<label>Package Image</label><br><input type="file" name="packageimage" id="packageimage" required>
									</div><br><br>
								<div class="row">
			
				<button type="submit" name="submit" class="btn_create">Create</button>

				<button type="reset" class="btn_reset">Reset</button>
			</div>
	
					</div>
					
					</form>

      <div class="panel-footer">
	 </div>
    </form>
  </div>
 	</div>
<div class="inner-block">
</div>
</div>
</div>
					<?php include('includes/sidebarmenu.php');?>
							</div>


</body>
</html>
<?php } ?>