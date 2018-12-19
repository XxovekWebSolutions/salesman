<?php
session_start();
if(isset($_SESSION['admin_id'])){
	 ?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<!-- <title>Blank Page | Okler Themes | Porto-Admin</title> -->
		<title> Route </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
				  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<!-- <link rel="stylesheet" href="assets/stylesheets/theme.css" /> -->
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		 <!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<script src="assets/vendor/jquery/jquery.js"></script>

	</head>
	<body>
		<section class="body">
			<!-- start: header -->
			<?php include 'header.php';?>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'left_side_bar.php';?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Shops On Route</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add Shops to Routes </span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<header class="panel-heading">
				      <h2 class="text-center">Add Shops on Routes</h2>
					</header>
					<div class="wizard-tabs">
						<ul class="wizard-steps">
							<li class="active">
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge "  onclick="showstable();">SHOW ROUTES DETAILS</span>
								</a>
							</li>
							<li >
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge" onclick="showform();">	ADD ROUTE DETAILS</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="panel-body" id="routeform" style="display:none;">
						<span id="msg"></span>
						<form class="col-xs-12" method="POST" id="assignroute">
							<section class="panel">

								<div class="panel-body">
									<div class="form-group">
										<h4><label class="col-sm-3 control-label">Route <span class="required">*</span></label></h4>
										<div class="col-sm-9">
											<select data-plugin-selectTwo  name="source" id="source"   class="form-control populate" >
												<option value="">	Route</option>
											</select>
												<input type="hidden" name="r_id" id="r_id" class="form-control"  />
										</div>
									</div>
									<div class="form-group">
										<h4><label class="col-sm-3 control-label">Shop <span class="required">*</span></label></h4>
										<div class="col-sm-9">
											<select data-plugin-selectTwo  name="shop" id="shop" class="form-control populate" >
												<option value="">	Shop</option>
											</select>
										</div>
									</div>
								</div>
								<footer class="panel-footer">
									<div class="row">
										<span id="msg"></span>
										<div class="col-sm-9 col-sm-offset-3 text-center">
											<button type="submit" class="btn btn-primary" value="Submit">Submit</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
									</div>
								</footer>
							</section>
						</form>

					</div>
				<div class="panel-body" id="routetable" >
					<div class="row form-group">
					</div>
					<div class="table table-responsive">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="text-center">Sr.No.</th>
								<th class="text-center">Route</th>
								<th class="text-center">ShopKeeper Name</th>
								<th class="text-center">Contact No.</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody id="route" >
						</tbody>
					</table>
					</div>
				</div>
					<!-- end: page -->
				</section>
			</div>
			<!-- </div> -->
			<?php include 'rightSidebar.php';?>

		</section>
		<!-- Vendor -->

		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- <script src="assets/javascripts/tables/examples.datatables.default.js"></script> -->
		<script src="../js/validate.js" type="text/javascript"></script>
		<script src="../js/additional-methods.js" type="text/javascript" ></script>
		<script src="../js/route-details.js" type="text/javascript" ></script>

		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript"></script>
	</body>
</html>
<?php
}else {
	header('Location:../index.php');
}
?>
