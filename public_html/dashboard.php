<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard | JSOFT Themes | JSOFT-Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

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
		<section class="body">

			<!-- start: header -->
      <?php include 'header.php';?>
      <!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
      <?php include 'left_side_bar.php';?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						<div class="row">
						<div class="col-md-6">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Shops List <span class="badge badge-pill badge-info" id="countshoplist"> </span></h2>
									<p class="panel-subtitle"> No Of Shops Available On Your Software.</p>
								</header>
								<div class="panel-body">

									<div id="shopList" style=" height: 500px; position: relative; overflow: auto;">
									</div>


								</div>
							</section>
						</div>
						<div class="col-md-6">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Sales Mans List <span class="badge badge-pill badge-info" id="countsalesman"> </span></h2>
									<p class="panel-subtitle"> No Of Sales Available On Your Software. </p>
								</header>
								<div class="panel-body">
									<div id="salesManList" style=" height: 500px; position: relative; overflow: auto;">
									</div>


								</div>
							</section>
						</div>
					</div>


					<!-- start: page -->

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

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		<script src="assets/javascripts/theme.js"></script>
		<script src="assets/javascripts/theme.custom.js"></script>
		<script src="assets/javascripts/theme.init.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/nosleep/0.6.0/NoSleep.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/nosleep/0.6.0/NoSleep.min.js"></script>
		<!-- <script src="assets/javascripts/dashboard/examples.dashboard.js"></script> -->
    <script>
		$( document ).ready(function() {
	  });
		</script>
		<script>


		function displaySalesManList() {

		  $.ajax({
		    url: "../src/fetchDashboardData.php",
		    method: "POST",
		    dataType: 'json',
		    success: function (response) {
		      var count = Object.keys(response).length;
          $("#countsalesman").val(count);
		      var work_id = 0;
					var markers = [];
					var dist1 = [];
		      for (var i = 0; i < count; i++) {
						markers.push({
		        title: response[i].fname+" "+response[i].lname+" "+response[i].contact_number,
		        lat: response[i].Latitude,
		        lng: response[i].Longitude,
						description: response[i].address
		        });
		        }
						var mapOptions = {
								center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
								zoom: 8,
								mapTypeId: google.maps.MapTypeId.ROADMAP
						};
						var infoWindow = new google.maps.InfoWindow();
						var latlngbounds = new google.maps.LatLngBounds();
						var map = new google.maps.Map(document.getElementById("salesManList"), mapOptions);
						var i = 0;

						var interval = setInterval(function () {
								var data = markers[i]
								var myLatlng = new google.maps.LatLng(data.lat, data.lng);
								var icon = "icon14";
								icon = "http://maps.google.com/mapfiles/kml/pal2/" + icon + ".png";
								var marker = new google.maps.Marker({
										position: myLatlng,
										map: map,
										title: data.title,
										animation: google.maps.Animation.DROP,
										icon: new google.maps.MarkerImage(icon)
								});
								(function (marker, data) {
										google.maps.event.addListener(marker, "click", function (e) {
												infoWindow.setContent(data.description);
												infoWindow.open(map, marker);
										});
								})(marker, data);
								latlngbounds.extend(marker.position);
								i++;
								if (i == markers.length) {
										clearInterval(interval);
										var bounds = new google.maps.LatLngBounds();
										map.setCenter(latlngbounds.getCenter());
										map.fitBounds(latlngbounds);
								}
						}, 80);
		    },

		    error: function (jqXhr, textStatus, errorMessage) { // error callback
		    }
		  });
		}
		function displayShopKeeperList() {

		  $.ajax({
		    url: "../src/fetchShopKeeperList.php",
		    method: "POST",
		    dataType: 'json',
		    success: function (response) {

		      var count = Object.keys(response).length;
					$("#countshoplist").val(count);
		      var work_id = 0;
					var markers = [];
					var dist1 = [];
		      for (var i = 0; i < count; i++) {
						markers.push({
		        title: response[i].contactPerson+" "+response[i].contactNumber,
		        lat: response[i].Latitude,
		        lng: response[i].Longitude,
						description: response[i].address+" "+response[i].address2+" "+response[i].city+" "+response[i].state+" "+response[i].country+" "+response[i].pincode
		        });
		        }
						var mapOptions = {
								center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
								zoom: 8,
								mapTypeId: google.maps.MapTypeId.ROADMAP
						};
						var infoWindow = new google.maps.InfoWindow();
						var latlngbounds = new google.maps.LatLngBounds();
						var map = new google.maps.Map(document.getElementById("shopList"), mapOptions);
						var i = 0;
						var interval = setInterval(function () {
								var data = markers[i]
								var myLatlng = new google.maps.LatLng(data.lat, data.lng);
								var icon = "icon48";
								icon = "http://maps.google.com/mapfiles/kml/pal3/" + icon + ".png";
								var marker = new google.maps.Marker({
										position: myLatlng,
										map: map,
										title: data.title,
										animation: google.maps.Animation.DROP,
										icon: new google.maps.MarkerImage(icon)
								});
								(function (marker, data) {
										google.maps.event.addListener(marker, "click", function (e) {
												infoWindow.setContent(data.description);
												infoWindow.open(map, marker);
										});
								})(marker, data);
								latlngbounds.extend(marker.position);
								i++;
								if (i == markers.length) {
										clearInterval(interval);
										var bounds = new google.maps.LatLngBounds();
										map.setCenter(latlngbounds.getCenter());
										map.fitBounds(latlngbounds);
								}
						}, 80);
		    },
		    error: function (jqXhr, textStatus, errorMessage) { // error callback

		    }
		  });
		}





		function computeTotalDistance(result) {
			var total = 0,time=0;
			var myroute = result.routes[0];

			for (var i = 0; i < myroute.legs.length; i++) {

				time += (Math.floor(myroute.legs[i].duration.value / 60));
				total += myroute.legs[i].distance.value;
			}
			total = total / 1000;
			document.getElementById('total').innerHTML = total + ' km';
			document.getElementById('time').innerHTML = time + ' (in minute)';
		}

		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript">
		</script>
	</body>
</html>
