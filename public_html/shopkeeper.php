<?php
include '../config/connection.php';
session_start();
if(isset($_SESSION['admin_id']))
{
	$admin_id = $_SESSION['admin_id'];
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<!-- <title>Blank Page | Okler Themes | Porto-Admin</title> -->
		<title>Shop Keepers Bussiness Clients </title>
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
	<style>

table.table td:nth-child(5){
     max-width: 100px;
     overflow: hidden;
     text-overflow: ellipsis;
     white-space: nowrap;
}
table.table td:nth-child(5):hover{
    overflow: visible;
    white-space: normal;
    height:auto;
}</style>
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
						<h2>ShopKeepers</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>ShopKeepers Registeration</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<header class="panel-heading">
				<h2 class="text-center">ShopKeeper Registeration</h2>
					</header>
					<div class="wizard-tabs">
						<ul class="wizard-steps">
							<li class="active">
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " id="Shopkeeper" onclick="showshopkeepermaninfotable();">SHOW SHOPKEEPER</span>
								</a>
							</li>
							<li >
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " onclick="showshopkeeperform();">	ADD SHOPKEEPER</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="panel-body" id="shopkeeperform">
						<span id="msg1"></span>
						<form name="submitshopkeeperform" id="submitshopkeeperformdata"  method="post"   >
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="contactperson" id="contactperson"  placeholder="Contact Person" class="form-control" autocomplete="off" />
									<input type="hidden" name="shopkeeper_id" id="shopkeeper_id"/>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<input type="email" name="emailid" id="emailid" maxlength="255" placeholder="Email" class="form-control"  onblur="checkshopemailavailability();" autocomplete="off" />
									<span id="checkemail"> </span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="mobileno" id="mobileno" placeholder="Mobile"  class="form-control" onblur="checkshopmobilenoavailability();" autocomplete="off" />
									<span id="checkmobile"></span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

					</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="mobileno1" id="mobileno1" placeholder="Contact Number"  class="form-control" autocomplete="off" />

							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<select data-plugin-selectTwo  name="country" id="country" placeholder="Country"  onChange="getState(this.value);" class="form-control populate" >
										<option value="">	Country</option>

									</select>
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<select data-plugin-selectTwo  name="state" id="state" placeholder="State" onChange="getCity(this.value);" class="form-control populate" >
										<option value="">	State</option>

									</select>
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>

						</div>
						<div class="row form-group">
						</div>


				<div class="row form-group">
				</div>
				<div class="row form-group">
					<div class="col-lg-4">
				<div class="form-group">
					<div class="form-group">
						<select data-plugin-selectTwo  name="city" id="city" placeholder="City" class="form-control populate" >
							<option value="">	city</option>
						</select>
					</div>
				</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-4">
				<div class="form-group">

				<input type="text" name="shoppincode" id="shoppincode"  placeholder="pincode" class="form-control" autocomplete="off"  />
			</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-4">
				<div class="form-group">

				<textarea  name="address1" id="address"  placeholder="Address1"  class="form-control" autocomplete="off" ></textarea>
			</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

</div>

<div class="row form-group">
	<div class="row form-group">
	</div>
		<div class="col-lg-4">
		<div class="form-group">
			<div class="checkbox-custom chekbox-primary">
		<input type="checkbox"  name="checkaddress" id="checkaddress" class="form-control" onclick="setAddress1(this.form);"/>
		<label class="control-label"><h4 style="font:bold">Check this box if Address1 and Address2 are same</h1></label>
		</div>
			<textarea  name="address2" id="address2"  placeholder="Address2"  class="form-control" autocomplete="off" ></textarea>
		</div>
	</div>
	<div class="mb-md hidden-lg hidden-xl"></div>

</div>

		<footer class="panel-footer">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<input type="submit" class="btn btn-primary" value="Add" name="shopid" id="shopid"/>
					<input type="submit" class="btn btn-primary" value="Update" name="shopmanid" id="shopmanid" style="display:none;"/>
					<button type="reset" id="resetbtn" class="btn btn-default">Reset</button>
				</div>
				<div class="col-lg-3"></div>
				<div class="mb-md hidden-lg hidden-xl"></div>

			</div>
		</footer>
			</form>
		</div>
				<div class="panel-body" id="shoptable" style="display:none;">
					<div class="row form-group">
					</div>
					<div class="table-responsive">


					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="text-center" style="width:20%">Contact Person</th>
								<th class="text-center" style="width:10%" >Email</th>
								<th class="text-center" style="width:10%">Mobile</th>

								<th class="text-center" style="width:10%">city</th>
								<th class="text-center" style="width:40%">Address</th>
								<th class="text-center" style="width:10%">Action</th>
							</tr>
						</thead>
						<tbody id="shopmaninfodata" >
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
		<script src="../js/shopvalidationrules.js" type="text/javascript" ></script>
		<script src="../js/country_state_city.js" type="text/javascript" ></script>

		<script src="../js/shopavailability.js" type="text/javascript" ></script>
		<script src="../js/all_function.js" type="text/javascript" ></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript"></script>
	</body>
	<script type="text/javascript">
		getCountry_name();
		showshopkeepermaninfotable();
		display_shopkeeper();

	</script>
</html>
<?php
}
else {
	header("Location:./");
}
?>
