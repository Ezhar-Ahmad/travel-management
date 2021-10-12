<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO  tblissues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Info successfully submited ";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
}
}
?>	
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
	<div tabindex="-1" role="dialog">
				<div role="document">
					<div >
							<section>
							<form name="help" method="post">
								<div>
									<div class="writ">
										<h4>HOW CAN WE HELP YOU</h4>
											<ul>
												
												<li class="na-me">
													<select id="country" name="issue" class="frm-field required sect" required="">
														<option value="">Select Issue</option> 		
														<option value="Booking Issues">Booking Issues</option>
														<option value="Cancellation"> Cancellation</option>
														<option value="Refund">Refund</option>
														<option value="Other">Other</option>														
													</select>
												</li>
											
												<li class="descrip">
									<input class="special" type="text" placeholder="description"  name="description" required="">
												</li>
													<div class="clearfix"></div>
											</ul>
                                        <br>
											<div class="sub-bn">
												<form>
													<button type="submit" name="submit" class="bbtn">Submit</button>
												</form>
											</div>
									</div>
								</div>
								</form>
							</section>
					</div>
				</div>
			</div>
</html>