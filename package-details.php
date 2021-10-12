<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$comment=$_POST['comment'];
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Booked Successfully";
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
<title>TMS | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $(function() {
        $("#datepicker,#datepicker1").datepicker();
    });
</script>
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
<?php include('includes/header.php');?>
<div class="banner-3">
		<h1> Package Details</h1>

</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form name="book" method="post" class="pgk-dt-form">
		<div class="selectroom_top">
			<div class="st-dt selectroom_right" align="center">
                <form>
					<table border="2px" align="center">
                        
 <tr>
    <th>Package Name</th>
    <th>Package Type</th>
    <th>Package Location</th>
      <th>Package Features</th>                        
    <th>Package Price</th>
     <th>Package Image</th>  
     <th>Comment</th>
    <th>Package Details</th>
  </tr>
                        
                        <tr><td><h4><?php echo htmlentities($result->PackageName);?></h4></td>
                      <td><h6><?php echo htmlentities($result->PackageType);?></h6></td>
                            <td><p><b></b> <?php echo htmlentities($result->PackageLocation);?></p></td>
                            <td><p><b></b> <?php echo htmlentities($result->PackageFetures);?></p></td>
                            					<td><h5>PKR <?php echo htmlentities($result->PackagePrice);?></h5>
                                                    <td><p><b></b><div class="btm-img room-left">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>">
				</div></p></td>

                    <td>
						<input class="special" type="text" name="comment" required=""></td>
                                        <td><p><b></b> <?php echo htmlentities($result->PackageDetails);?></p></td>
                     </table>
                <br>
					
				<div class="bnr-right">
                    <br>
                    <br>
                    <br>
				<label>From</label>
				<input type="text" placeholder="dd-mm-yyyy"  name="fromdate" required="">
			<div class="bnr-right">
				<label class="inputLabel">To</label>
				<input id="datepicker1" type="text" placeholder="dd-mm-yyyy" name="todate" required="">
			</div>
                    </form>
			</div>
				<div class="grand">
					<p>Grand Total</p>
					<h3>PKR.800</h3>
				</div>
                <br>
			</div>
				<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p>	

		</div>
		<div class="selectroom_top">
	
			<div class="selectroom-info">
				<ul>
					<?php if($_SESSION['login'])
					{?>
						<li class="spe">
					<button type="submit" name="submit2" class="bbtn" style="">Book</button><br><br>
						</li>
						<?php } else {?>
							<li class="sigi" style="margin-top: 1%">
							<a href="signup.php" class="bbtn" > Book</a></li>
							<?php } ?>
					<div class="clearfix"></div>
				</ul>
			</div>
			
		</div>
		</form>
 
<?php }} ?>
</div>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
</body>
</html>