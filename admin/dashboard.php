<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="grid-inner">
<!--header start here-->
<?php include('includes/header.php');?>
<!--header end here-->
<!--four-grids here-->
		<div class="four-grids" style="
    margin-left: 50px;
">
					<div class=" four-grid">
						<div class="four-agileits">
							<div class="four-text">
								<h3>User</h3>

								<?php $sql = "SELECT id from tblusers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
					?>			<h4> <?php echo htmlentities($cnt);?> </h4>
				
								
							</div>
							
						</div>
					</div>
					<div class="four-grid">
						<div class="four-agileinfo">
							<div class="four-text">
								<h3>Bookings</h3>
										<?php $sql1 = "SELECT BookingId from tblbooking";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt1=$query1->rowCount();
					?>
								<h4><?php echo htmlentities($cnt1);?></h4>

							</div>
							
						</div>
					</div>
					<div class="four-grid">
						<div class="four">
							<div class="four-text">
								<h3 align="center">Enquiries</h3><center>
												<?php $sql2 = "SELECT id from tblenquiry";

$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$cnt2=$query2->rowCount();
					?>
								<h4><?php echo htmlentities($cnt2);?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="four-grid">
						<div class="four-wthree">
							<div class="four-text">
								<h3>Toatal packages</h3>
<?php $sql3 = "SELECT PackageId from tbltourpackages";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt3=$query3->rowCount();
					?>
								<h4><?php echo htmlentities($cnt3);?></h4>
								
							</div>
							
						</div>
					</div>
						<div class="clearfix"></div>
				</div>

		<div class="four-grids" style="
    margin-left: 50px;
">
					<div class="four-grid">
						<div class="four-w3ls">
							<div class="four-text">
								<h3>Issues Riaised</h3>
												<?php $sql5 = "SELECT id from tblissues";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$cnt5=$query5->rowCount();
					?>
								<h4><?php echo htmlentities($cnt5);?></h4>
								
							</div>
							
						</div>
					</div>
				</div>
</div>
</div>
				<?php include('includes/sidebarmenu.php');?>		
							</div>
</body>
</html>
<?php } ?>