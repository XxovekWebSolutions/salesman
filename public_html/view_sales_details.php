<?php
session_start();
$admin_id = $_SESSION['admin_id'];
$emp_id = $_SESSION['Emp_id'];
if(isset($emp_id)){
?>
<!doctype html>
<html class="fixed">
	<head>

		<meta charset="UTF-8">

		<title>Salesman Page</title>
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
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

<style media="screen">
.pass_show{position: relative}
.pass_show .ptxt {
position: absolute;
top: 50%;
right: 25px;
z-index: 1;
color: #f36c01;
margin-top: -10px;
cursor: pointer;
transition: .3s ease all;}
.pass_show .ptxt:hover{color: #333333;}
html.fixed .page-header{left:0px;}
html.fixed .content-body {margin-left: 0px;}
</style>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="view_sales_details.php" class="logo">
						<img src="../img/logo/sales.png" height="46" alt="Porto Admin" />
					</a>

				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<span id="profilePic" ></span>

							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name" id="sellerName"></span>
								<span class="role">Sales Person</span>
							</div>
							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="../src/logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

      <div class="inner-wrapper">
        <section role="main" class="content-body">
          <header class="page-header">
						<h2>User Profile</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>User Profile</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open=""></a>
						</div>
					</header>

          <!-- start: page -->

          <div class="row">
            <div class="col-md-4 col-lg-3">
								<section class="panel">
									<header class="panel-heading bg-tertiary">
										<div class="panel-heading-profile-picture">
										<span id="image"></span>
										</div>
									</header>
									<div class="panel-body">
										<h4 class="text-semibold mt-sm" id="emp_name"></h4>
										<h5 class="text-semibold mt-sm" id="joindate"></h5>
										<hr class="solid short">
										<h5 class="text-semibold mt-sm" >Address</h5>

										<p id="emp_address"></p>
										<hr class="solid short">

										<div class="widget-summary widget-summary-xs">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-envelope"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title" id="emp_email"></h4>
												</div>
											</div>
										</div>
										<hr class="solid short">
										<p><a href="#"  id="menu1" onclick="loadDiv('menu1');"><i class="fa fa-phone mr-xs" ></i> Admin Details</a></p>
										<p><a href="#" onclick="loadDiv('menu2');" id="menu2"><i class="fa fa-taxi mr-xs"></i>Today's Visits</a></p>
										<p><a href="#" onclick="loadDiv('menu4');" id="menu4"><i class="fa fa-history mr-xs"></i> Visits History</a></p>
										<p><a href="#" onclick="loadDiv('menu3');" id="menu3"><i class="fa fa-edit mr-xs"></i> Change Password</a></p>
									</div>
								</section>





							</div>

             <div class="col-md-8 col-lg-9" >

								 <section class="panel-group mb-xlg" id="adminInfoDiv" style="display: none;">
								   <div class="widget-twitter-profile">
									   <div class="top-image">
								       <img src="assets/images/widget-twitter-profile.jpg" alt="">
										 </div>

								     <div class="profile-info">
								       <div class="profile-picture">
								         <img src="assets/images/!logged-user.jpg" alt="">
								       </div>
								       <div class="profile-account">
								         <h3 class="name text-semibold" id="name"></h3>
								         <a href="#" class="account" id="aemail"></a>
								       </div>
								       <ul class="profile-stats">
												 <li>
												 <h5 class="stat text-uppercase">Working Firm</h5>
												 <h4 class="count" id="firm"></h4>
											 </li>
								         <li>
								           <h5 class="stat text-uppercase">Contact Number</h5>
								           <h4 class="count" id="contact_number"></h4>
								         </li>
								       </ul>
								     </div>

								     <div class="profile-quote">
								       <blockquote>
								         <!-- <p id="paradig">
								           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus consectetur aliquet. Curabitur tincidunt convallis mi, ac elementum purus bibendum vitae.
								         </p> -->
								       </blockquote>
								       <!-- <div class="quote-footer">
								         <span class="datetime">4:27 PM - 15 Jul 2014</span>
								         -
								         <a href="#">Details</a>
								       </div> -->
								     </div>
								   </div>
								 </section>



									 <section class="panel"  id="ChangePasswordDiv"  style="display: none;" >
										 <form class="form-horizontal" id="PassResetForm" onsubmit="return updatePassword(2);">
 										  <h3 class="mb-xlg" align="center">Change Password</h3>
 										  <fieldset class="mb-xl">
 										    <div class="form-group">
 										      <label class="col-md-3 control-label" for="NewPassword">New Password</label>
 										      <div class="col-md-8 pass_show">
														<input type="password" class="form-control" id="NewPassword"
       															autocomplete="new-password"
       															onblur="this.setAttribute('readonly', 'readonly');"
       															onfocus="this.removeAttribute('readonly');" readonly required>
																	</div>
												  </div>
													<div class="form-group">
														<label class="col-md-3 control-label"></label>
															<div class="col-md-8">
															<span id="msg"></span>
													</div>
 										    </div>
 										  </fieldset>
 										  <div class="panel-footer">
 										    <div class="row">
 										      <div class="col-md-9 col-md-offset-3">
 										        <button type="submit" class="btn btn-primary" >Change Password</button>
 										        <button type="reset" class="btn btn-default">Clear</button>
 										      </div>
 										    </div>
 										  </div>
 										</form>
									 </section>


								 <section class="panel" id="RouteTableTblDiv" >
							     <header class="panel-heading">
							       <div class="panel-actions">
							         <a href="#" class="fa fa-caret-down"></a>
							         <a href="#" class="fa fa-times"></a>
							       </div>
							       <h2 class="panel-title">Today's Visits List</h2>
							     </header>
							     <div class="panel-body">
							       <table class="table table-bordered table-striped mb-none" id="RouteTable">
							         <thead>
												 <tr>
													<th>Sr.No</th>
													<th>Route Name</th>
													<th>Date</th>
													<th>Total Shops</th>
													<th>Action</th>
												</tr>
							         </thead>
							         <tbody id="RouteTableData"></tbody>
							       </table>
							     </div>
							   </section>

								 <section class="panel" id="VisitHistoryTblDiv" style="display:none" >
							     <header class="panel-heading">
							       <div class="panel-actions">
							         <a href="#" class="fa fa-caret-down"></a>
							         <a href="#" class="fa fa-times"></a>
							       </div>
							       <h2 class="panel-title">Previous Visit's History</h2>
							     </header>
							     <div class="panel-body">
							       <table class="table table-bordered table-striped mb-none" id="VisitHistoryTable">
							         <thead>
												 <tr>
													<th>Sr.No</th>
													<th>Route Name</th>
													<th>Date</th>
													<th>Total Shops</th>
													<th>Status</th>
												</tr>
							         </thead>
							         <tbody id="VisitHistoryData"></tbody>
							       </table>
							     </div>
							   </section>

								 <section class="panel" id="ShopKeeperTableDiv" style="display:none" >
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title">Shops Details</h2>
									</header>
									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none" id="ShopKeeperTable">
											<thead>
												<tr>
													<th>Sr.No</th>
													<th>Contact Person</th>
													<th>Shop Contact</th>
													<th>Email</th>
													<th>Address</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="ShopKeeperTableData"></tbody>
										</table>
									</div>
								</section>


 		 		 				<section class="panel" id="mapDiv">
 		 		 				<header class="panel-heading">
 		 		 					<div class="panel-actions">
 		 		 						<a href="#" class="fa fa-caret-down"></a>
 		 		 						<a href="#" class="fa fa-times"></a>
 		 		 					</div>
 		 		 					<h2 class="panel-title">Sales Mans List </h2>
 		 		 					<p class="panel-subtitle"> No Of Sales Available On Your Software. </p>
 		 		 				</header>
 		 		 				<div class="panel-body">
 		 		 					<input type="hidden" id="clatitude"/>
 		 		 					<input type="hidden" id="clongitude"/>
 		 		 					<input type="hidden" id="destlat"/>
 		 		 					<input type="hidden" id="destlng"/>
									<input type="hidden" id="routeassignid"/>
 		 		 				<!-- <button class="btn-btn-primary" onclick="start('18.5045','73.9414')"> Start </button> -->
 		 		 				<div class="row">
 		 		 				<div class="col-sm-6">
 		 		 					<div class="form-group">
 		 		 				<div id="map1"  style=" height: 500px; position: relative; overflow: auto;">
 		 		 				</div>
 		 		 				 </div> </div>
 		 		 				 <div class="col-sm-6">
 		 		 					<div class="form-group">
 		 		 						<div id="right-panel" style=" height: 500px; position: relative; overflow: auto;">
 		 		 							<font color="purple" size="4px;"><p>Total Distance: <span id="total"></span></p></font>
 		 		 							<font color="purple" size="4px;"><p>Total Time: <span id="time"></span></p></font>
 		 		 						</div>
 		 		 				 </div> </div>
 		 		 			 </div>
 		 		 		 </div>
 		 		 	 </section>

            </div>
					</div>



          <!-- end: page -->
        </section>
      </div>

	</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
	  <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
	  <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<script src="../js/Employee.js"></script>
		<script type="text/javascript">
	getLocation();
		function showPosition1(position) {
   var routeassignid = $('#routeassignid').val();
	 $("#clatitude").val(position.coords.latitude);
	 $("#clongitude").val(position.coords.longitude);
	 $.ajax({
		 url: "../src/savesalesManAssignTransaction.php",
		 method: "POST",
		 data: ({
			 latitude:position.coords.latitude,
			 longitude:position.coords.longitude,
			 routeassignid:routeassignid
			}),
		 dataType: 'json',
		 success: function (response) {
			 var count = Object.keys(response).length;
		 }
	 });
		}

		function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition1);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
		}


		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript">
		</script>



	</body>
</html>
<?php
}
else{
	header('Location:sales_person_signin.php');
}
?>
