<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";
 $con = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES('$fname','$email','$mobile','$subject','$description')";
$result = $con->query($sql);
if($result)
{
$msg="Enquiry  Successfully submited";
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
    <title>TMS | Tourism Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
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
    <div class="top-header">
        <?php include('includes/header.php');?>
        <div class="banner-1 ">
                <h1 style="visibility: visible;"> Tourism Management System</h1>
        
        <div class="privacy" align="center">
                <h3 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Enquiry Form Password</h3>
                <form name="enquiry" method="post">
                        <b>Full name</b> <br><input type="text" name="fname" class="" id="fname" placeholder="Full Name" required="">
                    </p>
                    <p style="width: 350px;">
                        <b>Email</b> <br><input type="email" name="email" class="" id="email" placeholder="Valid Email id" required="">
                    </p>
                    <p style="width: 350px;">
                        <b>Mobile No</b> <br><input type="text" name="mobileno" class="" id="mobileno" maxlength="10" placeholder="10 Digit mobile No" required="">
                    </p>
                    <p style="width: 350px;">
                        <b>Subject</b> <br><input type="text" name="subject" class="" id="subject" placeholder="Subject" required="">
                    </p>
                    <p style="width: 350px;">
                        <label>Description</label><br>
                        <textarea name="description" class="" rows="6" cols="50" id="description" placeholder="Description" required=""></textarea>
                    </p>

                    <p style="width: 350px;">
                        <button type="submit" name="submit1" class="bbtn">Submit</button><br><br><br><br><br><br>
                        
                    </p>
                </form>
        </div>
        </div>
        <?php include('includes/footer.php');?>
</body>

</html>