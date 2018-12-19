<!doctype html>
<html class="fixed">
	<head>

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

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="assets/images/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Reset Password</h2>
					</div>
					<div class="panel-body">
						<div class="alert alert-info">
							<p class="m-none text-semibold h6">Enter new password to reset !</p>
						</div>

						<form id="reset" method="post">
							<div class="form-group mb-lg">
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" id="pwd" placeholder="Password" class="form-control input-lg" pattern=".{6,}" title="Six or more characters" autocomplete="off" required/>
								</div>
							</div>
							<div class="form-group mb-lg">
								<div class="input-group input-group-icon">
									<input name="pwd_confirm" type="password" id="pwd_confirm" placeholder="Confirm Password" class="form-control input-lg" pattern=".{6,}" title="Six or more characters" autocomplete="off" required onchange = "validatePassword()"/>
								</div>
							</div>
							<span class="input-group-btn text-right">
								<button class="btn btn-primary btn-lg" type="submit" >Reset!</button>
							</span>
							<p class="text-center mt-lg">Remembered? <a href="pages-signin.php">Sign In!</a>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
<script type="text/javascript">
function validatePassword(){
	var password = document.getElementById("pwd");
	var confirm_password = document.getElementById("pwd_confirm");
if(password.value != confirm_password.value) {
	alert("Passwords Doesn't Match");
}
}
$("#reset").on("submit",function(e){
	e.preventDefault();
var email="<?php echo $_REQUEST['emailid'] ?>";
  var password = $("#pwd_confirm").val();
alert(password);
    $.ajax({
     url:"../src/password_update_reset.php",
     method:"POST",
		 dataType:"json",
     data:{emailid:email,pwd:password},
     success:function(response){
			 alert(response)

         if(response.true=='true'){
           alert("Password Reset Successully");
           window.location.href = 'pages-signin.php';
       }
       else {
				 alert("f");
       }

     }
    });
});
</script>
	</body>
</html>
