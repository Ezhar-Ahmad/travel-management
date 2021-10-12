<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status=1;
$sql = "UPDATE tblenquiry SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();
$msg="Enquiry  successfully read";
}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin manage Issues</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
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
   <!--/content-inner-->
<div class="left-content">
	   <div class="grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				   	
				</div>
<!--heder end here-->
<div class="grids" style="
    margin-left: 50px;
">	
				<!-- tables -->
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="tables">
					<div class="table-info">
					  <h2>Manage Issues</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th>Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>Issues </th>
							<th>Description </th>
							<th>Posting date </th>
							<th>Action </th>
							
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT tblissues.id as id,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tblissues.Issue as issue,tblissues.Description as Description,tblissues.PostingDate as PostingDate from tblissues join tblusers on tblusers.EmailId=tblissues.UserEmail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td width="120">#00<?php echo htmlentities($result->id);?></td>
							<td width="50"><?php echo htmlentities($result->fname);?></td>
								<td width="50"><?php echo htmlentities($result->mnumber);?></td>
							<td width="50"><?php echo htmlentities($result->email);?></td>
						
							<td width="200"><?php echo htmlentities($result->issue);?></a></td>
							<td width="400"><?php echo htmlentities($result->Description);?></td>
							
								<td width="50"><?php echo htmlentities($result->PostingDate);?></td>
			

<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/tms/admin/updateissue.php?iid=<?php echo ($result->id);?>');">View </a>
</td>

</tr>
						 <?php } }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>
		
<div class="inner-block">

</div>

						<?php include('includes/sidebarmenu.php');?>
							
						


</body>
</html>
<?php } ?>