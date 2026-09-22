
<nav class="navbar navbar-default uppercase navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand " href="index.php" style="color: black;">  <b class="hidden-xs hidden-sm"><? echo $fixed[fixed_website]; ?> | </b>  admin </a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav visible-xs visible-sm" style="padding: 10px;">
				<? include 'index_menu_all.php'; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a style="color: black;" href="../" target="_blank">
						<?
						$fixed_select_status_SL = " SELECT fixed_status_id FROM fixed";
						$fixed_select_status_QR = mysqli_query($con,$fixed_select_status_SL);
						$fixed_select_status  = mysqli_fetch_array($fixed_select_status_QR);

						$fixed_status_nav_SL = " SELECT * FROM fixed_status WHERE fixed_status_id = '$fixed_select_status[fixed_status_id]'";
						$fixed_status_nav_QR = mysqli_query($con,$fixed_status_nav_SL);
						$fixed_status_nav   = mysqli_fetch_array($fixed_status_nav_QR);
						echo " สถานะเว็บไซต์ :   ".$fixed_status_nav[fixed_status_name];

						?> 
					</a>
				</li>
				<li>
					<a style="color: black;" href="../" target="_blank">
						<span class="glyphicon glyphicon-home"></span> เข้าสู่เว็บไซต์หลัก 
					</a>
				</li>
				<li>
					<a style="color: black;">
						<span class="glyphicon glyphicon-user"></span> ชื่อเข้าใช้ :  <? echo $login_admin[admin_user]; ?> 
					</a>
				</li>
				<li>
					<a style="color: black;" href="index_Logout.php">
						<span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>