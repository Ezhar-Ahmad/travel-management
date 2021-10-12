<?php
session_start();
error_reporting(0);
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
<title>TMS | admin manage packages</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
</head> 
<body>
   <div class="page-container">
<div class="left-content">
	   <div class="mother-grid-inner">
				<?php include('includes/header.php');?>
				  
				</div>
<div class="agile-grids" style="
    margin-left: 50px;
">				
				<div class="tables">
					<div class="table-info">
					  <h2>Manage Packages</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Name</th>
							<th>Type</th>
							<th>Location</th>
							<th>Price</th>
							<th>Creation Date</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from TblTourPackages";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->PackageName);?></td>
							<td><?php echo htmlentities($result->PackageType);?></td>
							<td><?php echo htmlentities($result->PackageLocation);?></td>
							<td>$<?php echo htmlentities($result->PackagePrice);?></td>
							<td><?php echo htmlentities($result->Creationdate);?></td>
							<td><a href="update-package.php?pid=<?php echo htmlentities($result->PackageId);?>"><button type="button" class="btn-view">View Details</button></a></td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
			</div>

</div>
</div>
						<?php include('includes/sidebarmenu.php');?>	
							</div>
							
</body>
</html>
<?php } ?>