<?php if($_SESSION['login'])
{?>
<div class="top-header">
	<div class="container">
		<ul>
			<li class="hm"><a href="index.php"><i>Tourism System</i></a>
            <a href="profile.php">My Profile</a>
            <a href="change-password.php">Change Password</a>
            <a href="tour-history.php">My Tour History</a>
            <a href="issuetickets.php">Issue Tickets</a>
                <ul class="tp-hd-rgt"> 
			<li class="tol">Welcome :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sigi"><a href="logout.php" >/ Logout</a></li>
        </ul>
            </li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft">
				<li class="hm"><a href="admin/index.php">Admin Login</a></li>
		</ul>
		<ul class="tp-hd-rgt"> 
			<li class="tol">Toll Number : 123-4568790</li>				
			<li class="sig"><a href="signup.php" >Sign Up</a></li> 
			<li class="sigi"><a href="login.php">/ Sign In</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<?php }?>
<div class="footer-btm">
	<div class="container">
	<div class="navigation">
			<nav>
						<ul class="navigation">
                                 <li><a href="index.php">Home</a></li>
								<li><a href="package-list.php">Tour Packages</a></li>
							<li><a href="aboutus.html">About</a></li>
								<li><a href="page.php?type=contact">Contact Us</a></li>
								<?php if($_SESSION['login']){?>
								<li>Need Help?<a href="wu.php"> / Write Us </a> </li>
								<?php } else { ?>
								<li><a href="enquiry.php"> Enquiry </a>  </li>
								<?php } ?>
								<div class="clearfix"></div>
						</ul>
					</nav>
				</div>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>