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
		<title> Salesman Customer </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<!-- <link rel="stylesheet" href="assets/stylesheets/theme.css" /> -->
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<!-- <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" /> -->
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
		  <link href="TableStyle.css" rel="stylesheet" type="text/css">

	</head>
<style>

table.table td:nth-child(6){
     max-width: 100px;
     overflow: hidden;
     text-overflow: ellipsis;
     white-space: nowrap;
}
table.table td:nth-child(6):hover{
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
						<h2>Salesmans</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Salesman Registeration</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<header class="panel-heading">
				<h2 class="text-center">Salesman Registeration</h2>
					</header>
					<div class="wizard-tabs">
						<ul class="wizard-steps">
							<li class="active">
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " id="showsalesman" onclick="showsalesmaninfotable();">SHOW SALESMAN</span>
								</a>
							</li>
							<li >
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " onclick="showsalesform();">	ADD SALESMAN</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="panel-body" id="salesform">
						<span id="msg"></span>
						<form name="formsubmit" id="submitformdata"  method="post" enctype="multipart/form-data"  >
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="firstname" id="firstname"  placeholder="First Name" class="form-control" autocomplete="off" />
									<input type="hidden" name="emp_id" id="emp_id"/>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="lastname" id="lastname"  placeholder="Last Name" class="form-control" autocomplete="off" />
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<input type="email" name="emailid" id="emailid" maxlength="255" placeholder="Email" class="form-control" onblur="checkuseremailavailability();" autocomplete="off" />
									<span id="checkemail"> </span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

					</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" name="mobileno" id="mobileno" placeholder="Mobile"  class="form-control" onblur="checkusermobilenoavailability();" autocomplete="off" />
									<span id="checkmobile"></span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">

										<input type="date" name="birthdate" id="birthdate" placeholder="Date of birth"  class="form-control">
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-4">
								<div class="form-group">
									<select data-plugin-selectTwo  name="gender" id="gender" placeholder="Gender" class="form-control populate" >
										<option value="">	 Gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>

						</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">
										<div class="col-lg-9">
											<div class="form-group">
										<div class="checkbox-custom chekbox-primary">
					<input type="checkbox"  name="bankdetails" id="bankdetails" class="form-control" onclick="displaybankdetails();"/>
					<label class="control-label"><h4 style="font:bold">Bank Details</h4></label>
					</div>
				</div>
				</div>
					<div class="col-lg-3"></div>
					<div class="mb-md hidden-lg hidden-xl"></div>

				</div>

				<div class="row form-group">
				</div>
				<div class="row form-group">
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" name="account" id="account"  placeholder="Account" class="form-control" autocomplete="off" style="display:none"/>
				</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-4">
				<div class="form-group">
					<input type="text" name="ifsc" id="ifsc"  placeholder="IFSC" class="form-control" autocomplete="off" style="display:none" />
		</div>
	</div>
	<div class="mb-md hidden-lg hidden-xl"></div>

	<div class="col-lg-4">
		<div class="form-group">
			<input type="text" name="branch" id="branch"  placeholder="branch" class="form-control" autocomplete="off" style="display:none" />
</div>
</div>
<div class="mb-md hidden-lg hidden-xl"></div>

		</div>
				<div class="row form-group">
					<div class="col-lg-4">
						<div class="form-group">
							<select data-plugin-selectTwo  name="status" id="status" placeholder="Status" class="form-control populate" >
								<option value="">	Status</option>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
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
					<select data-plugin-selectTwo  name="state" id="state" placeholder="State" onChange="getCity(this.value);" class="form-control populate" >
						<option value="">	State</option>

					</select>
				</div>
				<div class="mb-md hidden-lg hidden-xl"></div>

				</div>
				<div class="row form-group">
				</div>
				<div class="row form-group">
					<div class="col-lg-4">
						<div class="form-group">
							<select data-plugin-selectTwo  name="city" id="city" placeholder="City" class="form-control populate" >
								<option value="">	city</option>
							</select>
						</div>
					</div>
					<div class="mb-md hidden-lg hidden-xl"></div>


						<div class="col-lg-4">
					<div class="form-group">
						<input type="text" name="salespincode" id="salespincode"  placeholder="pincode" class="form-control" autocomplete="off"  />

					</div>
				</div>
				<div class="mb-md hidden-lg hidden-xl"></div>

				<div class="col-lg-4">
					<input type="text" name="mobileno1" id="mobileno1" placeholder="Contact Number"  class="form-control"  autocomplete="off" />


				</div>
				<div class="mb-md hidden-lg hidden-xl"></div>

				</div>
				<div class="row form-group">
				</div>

				<div class="row form-group">
					<div class="row form-group">
					</div>
					<div class="col-lg-4">

						<textarea  name="address" id="address"  placeholder="Address1"  class="form-control" autocomplete="off" style=" margin-top: 40px;" ></textarea>

					</div>
					<div class="mb-md hidden-lg hidden-xl"></div>

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

					<div class="col-lg-4">
				<div class="form-group">
						<div class="fileupload fileupload-new"  data-provides="fileupload" style="margin-top:40px;" >
							<div class="input-append">
								<div class="uneditable-input" style="width: 200px;"  >
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview" id="profile"></span>
								</div>
								<span class="btn btn-default btn-file" >
									<span class="fileupload-exists">Change</span>
									<span class="fileupload-new">Upload ur photo</span>
									<!-- <span ></span> -->
									<input type="file" name="imgname" id="profile"   accept="image/*" >
								</span>
								<span style="color:black;font-weight:bold" id="profilePic" ></span>

								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
				</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

				</div>
				<div class="row form-group">
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-lg-5"></div>
						<div class="col-lg-4">
							<input type="submit" class="btn btn-primary" value="Add" name="salesid" id="salesid"/>
							<input type="submit" class="btn btn-primary" value="Update" name="salesmanid" id="salesmanid" style="display:none;"/>

							<button type="reset" class="btn btn-default">Reset</button>
						</div>
						<div class="col-lg-3"></div>
						<div class="mb-md hidden-lg hidden-xl"></div>

					</div>
				</footer>
			</form>
					</div>
				<div class="panel-body" id="salestable" style="display:none;">
					<div class="row form-group">
					</div>
					<div class="table-responsive">


					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="text-center" >Sr No</th>
								<th class="text-center">Full Name</th>
								<th class="text-center" >Email</th>
								<th class="text-center">Mobile</th>
								<th class="text-center">Status</th>
								<th class="text-center" >Address</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody id="salesmaninfodata" >
						</tbody>
					</table>
					</div>
				</div>
					<!-- end: page -->
				</section>

				<?php include 'rightSidebar.php';?>
			</div>
			<!-- </div> -->
		</section>
		<!-- Vendor -->

		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<!-- <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
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
		<script src="../js/rules.js" type="text/javascript" ></script>
		<script src="../js/country_state_city.js" type="text/javascript" ></script>
		<script src="../js/availability.js" type="text/javascript" ></script>
		<script src="../js/all_function.js" type="text/javascript" ></script>
    <script src="../js/mdtimepicker.js"></script>

		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript"></script>
	</body>
</html>
<?php
}
else {
	header("Location:pages-signin.php");
}
?>
