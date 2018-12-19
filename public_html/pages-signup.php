<!doctype html>
<html class="fixed">
	<head>
<title>Register New User</title>
		<!-- Basic -->
		<meta charset="UTF-8">

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
 <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="../img/logo/sales.png" height="64" width="100" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form id="sign_up" method="post">
							<span id="EmailVerification"></span><br>
							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>First Name</label>
										<input name="fname" type="text" minlength="2" class="form-control input-lg" pattern="[A-Za-z]{1,32}" autocomplete="off" required/>
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Last Name</label>
										<input name="lname" type="text" minlength="2" class="form-control input-lg" pattern="[A-Za-z]{1,32}" autocomplete="off" required/>
									</div>
								</div>
							</div>

							<div class="form-group mb-lg">
								<label>Company / Firm / Shop </label>
								<input name="cname" type="text" class="form-control input-lg" autocomplete="off" required/>
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Address</label>
								<strong id="email-availability" style="float:right" ></strong>
								<input id="email" name="email" type="email" onBlur="checkEmailAvailability(this.value);" class="form-control input-lg" autocomplete="off" required/>
							</div>

							<div class="form-group mb-lg">
								<label>Mobile</label>
								<input name="phone" type="text" pattern="[7-9]{1}[0-9]{9}" title="number should start with 7,8 or 9" class="form-control input-lg" autocomplete="off" required/>
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input id="pwd" name="pwd" type="password" class="form-control input-lg" pattern=".{6,}" title="Six or more characters" autocomplete="off" required/>
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Password Confirmation</label>
										<input id="pwd_confirm" name="pwd_confirm" type="password" class="form-control input-lg" onchange = "validatePassword()" autocomplete="off" required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<!-- <div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div> -->
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs" name="signup">Sign Up</button>
									<button type="submit"  class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							<p class="text-center">Already have an account? <a href="pages-signin.php">Sign In!</a>

						</form>
					</div>
				</div>

				<!-- <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
			</div>
		</section>
		<!-- end: page -->

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
