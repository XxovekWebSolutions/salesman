<?php
session_start();
$a_id=$_SESSION['admin_id'];
if(isset($_SESSION['admin_id']))
{
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Profile Page for Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
            <?php include 'header.php';?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'left_side_bar.php';?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Profile Page</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>Profile Page</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

                    <!-- start: page -->
                    <form class="col-xs-12" method="POST" id="sign_up">
                    <section class="panel-body">
                    <div class="row form-group ">
							</div>
							<div class="row form-group">
                                <input type="hidden" value="<? echo $a_id ?>" name="a_id">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" name="fname" id="fname"   class="form-control" autocomplete="off" required/>
								</div>
							</div>
								<div class="col-sm-4">
									<div class="form-group">
                                        <input type="text" id="lname" name="lname" class="form-control" autocomplete="off" required/>

								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                                <input type="email" id="email" name="email"  class="form-control" autocomplete="off" required/>

							</div>
						</div>
						</div>
							<div class="row form-group">
							</div>
							<div class="row form-group">
								<div class="col-sm-4">
									<div class="form-group">
                                    <input type="text" id="cnum" name="phone"  class="form-control" autocomplete="off" required/>

									</div>
								</div>
								<div class="col-sm-4">
								<div class="form-group">
									<input type="text" id="firm" name="cname"  class="form-control" autocomplete="off" required/>
							</div>
						</div>
                        <div class="col-sm-4">
								<div class="form-group">
									<input type="password" id="pwd" name="pwd" class="form-control" autocomplete="off" required/>
							</div>
						</div>
							</div>



					<div class="row form-group">
					</div>
					<footer class="panel-footer">
						<div class="row">
						<span id="msg"></span>
							<div class="col-sm-5"></div>
							<div class="col-sm-4">
								<input type="submit" class="btn btn-primary" value="Edit" name="salesid" id="salesid"/>
								<input type="submit" class="btn btn-primary" value="Update" name="salesmanid" id="salesmanid" style="display:none;"/>

								<button type="reset" class="btn btn-default">Reset</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
					</footer>
                </form>
					<!-- end: page -->
				</section>
			</div>

			<?php include "rightSidebar.php" ?>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
    <script src="../js/pages-signup.js"></script>

	</body>
</html>
<?php
}
else
{
    header("Location:pages-signin.php");
}
?>
