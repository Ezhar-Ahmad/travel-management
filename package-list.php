<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS  | Package List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Package List</h1>
	</div>

<div class="rooms">
<?php $sql = "SELECT * from tbltourpackages";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">

				<div class="btm-dt room-midle">
					<table border="2px" align="center">
                        
 <tr>
    <th>Package Name</th>
    <th>Package Type</th>
    <th>Package Location</th>
      <th>Package Features</th>                        
    <th>Package Price</th>
     <th>Package Image</th>                        
   
  </tr>
                        
                        <tr><td><h4><?php echo htmlentities($result->PackageName);?></h4></td>
                      <td><h6><?php echo htmlentities($result->PackageType);?></h6></td>
                            <td><p><b></b> <?php echo htmlentities($result->PackageLocation);?></p></td>
                            <td><p><b></b> <?php echo htmlentities($result->PackageFetures);?></p></td>
                            					<td><h5>PKR <?php echo htmlentities($result->PackagePrice);?></h5>
                                                    <td><p><b></b><div class="btm-img room-left">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>">
				</div></p></td>
                     </table>
				</div>
				<div class="btm-btn">
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
                      
				</div>
<br><br>
			</div>
<?php }} ?>
		</div>
<?php include('includes/footer.php');?>
    </div>
</body>
</html>
