
	display_work();
getRoute_name();
getSalesman_name();

function showform()
{
	$("#assignwork")[0].reset();
	$("#routeform").show();
	$("#routetable").hide();
	$('#map1').hide();
}
function showstable()
{
$("#routetable").show();
$("#routeform").hide();
}
function getRoute_name()
{
    $.ajax({
              type: "POST",
              url: "../src/get_route.php",
              success: function(msg)
             {
                    $("#source").html(msg);
              }
            });
}
function getSalesman_name()
{
    $.ajax({
              type: "POST",
              url: "../src/get_Salesman.php",
              success: function(msg)
             {
                    $("#salesmansid").html(msg);
              }
            });
}
function display_work() {
  $.ajax({
    url:"../src/display_work_details.php",
    dataType:"json",
    method:"POST",
    success:function(data){
      var count=Object.keys(data).length;
			var status = '',map;
      for (var i = 0; i < count; i++)
      {
				if(data[i]['status'] == 0){
						status = '<span class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">Inactive</span>';
						map = '';
				}else {
					status = '<span class="mb-xs mt-xs mr-xs btn btn-xs btn-success">Active</span>';
					map = '<a href="#" class="btn btn-success" onClick="display_route('+(i+1)+','+ data[i]['wid'] +',\''+ data[i]['sname']+'\');"><i class="fa fa-map-marker"></i></a>';
				}
      $("#route").append('<tr class="gradeX"><td class="text-center">'+ (i+1) +'</td><td class="text-center">'+ data[i]['route'] +'</td><td class="text-center">'+ data[i]['sname'] +'</td><td class="text-center">'+ status +
      '</td><td class="text-center">'+ data[i]['adate'] +'</td><td class="actions text-center"><a href="#" class="btn btn-info" onClick="edit_route('+ (i+1) +','+ data[i]['wid'] +');"><i class="fa fa-pencil"></i></a><a href="#" class="btn btn-danger" onClick="remove_route('+ (i+1) +','+ data[i]['wid'] +');"><i class="fa fa-trash-o"></i></a>'+map+'</td></tr>');
    }
					$("#datatable-default").DataTable();
    }

  });

}
function display_route(id,param,param1){
$('#map2').hide();
	$.ajax({
		type:'get',
		url:'../src/getlatlongcurrentposition.php',
		dataType:"json",
		data:{assignid:param,name:param1},
		success:function(data){
			var desc = "";
				 var markers = [];
			var latlng = new google.maps.LatLng(data.latitude,data.longitude);
			var geocoder = geocoder = new google.maps.Geocoder();
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
							if (results[1]) {
									desc=results[1].formatted_address;
									markers.push({
								 title:data.name ,
								 lat: data.latitude,
								 lng: data.longitude,
								 description: desc
								 });
								 var mapOptions = {
										center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
										zoom: 8,
										mapTypeId: google.maps.MapTypeId.ROADMAP
								};
								var infoWindow = new google.maps.InfoWindow();
								var latlngbounds = new google.maps.LatLngBounds();
								var map = new google.maps.Map(document.getElementById("map1"), mapOptions);
								var i = 0;
								var interval = setInterval(function () {
										var data = markers[i];
										var myLatlng = new google.maps.LatLng(data.lat, data.lng);
										var icon = "icon13";
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

								}, 80);
							}
					}
			});
		}
	});
}
$("#assignwork").on("submit",function(e)
{
	e.preventDefault();
	var d=$("#assigndate").val();
	var s=$("#source").val();
	var sm=$("#salesmansid").val();
	// var st=$("#status").val();
	var wt=$("#wtime").val();

	if((s.length==0) || (d.length==0) || (sm.length==0) ||  (wt.length==0))
	{
		var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> All Fields are Required!</strong></font></div>";
		$('#msg').html(msg);
		window.setTimeout(function () {
			$(".alert").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 3000);
	}
	else {
	$.ajax({
    url:"../src/add_sales_work.php",
    dataType:"json",
    method:"POST",
		data:$("#assignwork").serialize(),
    success:function(response){
      if(response.true)
			{
				if(response.flag == 1){
					$('#msg').html("<font color='green'>Inserted Successfully</font>");
					window.location.reload();
				}else {
					$('#msg').html("<font color='green'>Updated Successfully</font>");
						$("#w_id").val('');
						window.location.reload();
				}
}
			else {
				$('#msg').html("<font color='red'>Something went wrong..plz try again !</font>");
			}
    }
  });
}
});
function edit_route(param,param1) {
	$("#routeform").show();
	$("#routetable").hide();
	$("#w_id").val(param1);
	$.ajax({
	    url: "../src/fetch_work_detail.php",
	    method: "POST",
	    dataType:"json",
	    data: {w_id:param1},
	    success: function(data)
	    {
				$("#assigndate").val(data[0]['adate']);
				$("#wtime").val(data[0]['wtime']);
				$("#status").append("<option value=" + data[0]['status'] + " selected=selected>" + data[0]['status'] + "</option>").trigger('change');
			$("#source").append("<option value=" + data[0]['Rid'] + " selected=selected>" + data[0]['route'] + "</option>").trigger('change');
			$("#salesmansid").append("<option value=" + data[0]['sid'] + " selected=selected>" + data[0]['sname'] + "</option>").trigger('change');
	    }
	  });


}
function remove_route(param,param1) {
  var con = confirm("Do You want to delete the Route permanantly!");
  if (con == true) {
            $.ajax({
            url:"../src/removeDetails.php",
            method:"POST",
            data:({id:param1,tblName:'salesManAssign',colName:'AssignId'}),
						dataType:'json',
            success:function(data)
            {
						if(response.true){
							$("#"+param).closest('tr').remove();
                window.location.reload();
						}

            }
            });
          } else {

          }
}
function load_shops(param){
	$("#shops").html(" ");
	$("#shops").html("<font size='4' >List of Shops :</font><br>");
	var map = new google.maps.Map(document.getElementById('map2'), {
		zoom: 8,
		center: {lat:20.5937, lng: 78.9629}  //india
	});

	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer({
		// draggable: true,
		map: map

	});
	$.ajax({
							url:"../src/load_shops.php",
							method:"POST",
							dataType:"json",
	            data:({rid:(param.value)}),
	            success:function(data)
	            {
	              var markers = [];
								var count=Object.keys(data).length;
	      				for (var i = 0; i < count; i++)
	      				{
								$("#shops").append(data[i]['shops']+'<br>');
								markers.push({
				        title: data[i].shops,
				        lat: data[i].latitude,
				        lng: data[i].longitude,
								description: data[i].address
				        });
								}

								$("#scount").html("No.Of Shops :" +count);
								var mapOptions = {
										center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
										zoom: 10,
										mapTypeId: google.maps.MapTypeId.ROADMAP
								};
								var infoWindow = new google.maps.InfoWindow();
								var latlngbounds = new google.maps.LatLngBounds();
								var map = new google.maps.Map(document.getElementById("map2"), mapOptions);
								var i = 0;

								var interval = setInterval(function () {
										var data = markers[i]
										var myLatlng = new google.maps.LatLng(data.lat, data.lng);
										var icon = "red-dot";
										// http:// google.com/mapfiles/ms/micons
										icon = "http://maps.google.com/mapfiles/ms/micons/" + icon + ".png";
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

								}, 80);
								// displayRoute({
								// 	location:new google.maps.LatLng(data[0]['latitude'],data[0]['longitude'])
								// 	},{
								// 	location:new google.maps.LatLng(data[count-1]['latitude'],data[count-1]['longitude'])
								// 	} , directionsService,  directionsDisplay);
	            }
	});
}
