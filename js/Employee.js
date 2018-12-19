
  $("#mapDiv").hide();
$('.pass_show').append('<span class="ptxt">Show</span>');
displayEmpInfo();
displayEmpTblData();

$(document).on('click', '.pass_show .ptxt', function () {

  $(this).text($(this).text() == "Show" ? "Hide" : "Show");

  $(this).prev().attr('type', function (index, attr) { return attr == 'password' ? 'text' : 'password'; });

});

function loadDiv(param) {
  if (param == "menu1") {
    $("#VisitHistoryTblDiv").hide();
    $("#adminInfoDiv").show();
    $("#RouteTableTblDiv").hide();
    $("#mapDiv").hide();
    $("#ChangePasswordDiv").hide();
    $("#ShopKeeperTableDiv").hide()

    fetchAdminInfo(1);
  }
  else if (param == "menu2") {
    $("#VisitHistoryTblDiv").hide();
    $("#RouteTableTblDiv").show();
    $("#adminInfoDiv").hide();
    $("#ChangePasswordDiv").hide();
    $("#ShopKeeperTableDiv").hide()
    $("#mapDiv").hide();
  }
  else if (param == "menu4") {
      $("#VisitHistoryTable tbody").empty();
    $("#VisitHistoryTblDiv").show();
    $("#RouteTableTblDiv").hide();
    $("#adminInfoDiv").hide();
    $("#ChangePasswordDiv").hide();
    $("#ShopKeeperTableDiv").hide()
    $("#mapDiv").hide();
    VisitHistory();
  }
  else {
    $("#VisitHistoryTblDiv").hide();
    $("#ChangePasswordDiv").show();
    $("#RouteTableTblDiv").hide();
    $("#ShopKeeperTableDiv").hide()
    $("#adminInfoDiv").hide();
    $("#mapDiv").hide();
  }
}
function fetchAdminInfo(param) {
  $.ajax({
    url: "../src/fetchAdminInfo.php",
    method: "POST",
    dataType: 'json',
    success: function (response) {

      $("#name").html(response.fname + " " + response.lname);
      $("#aemail").html(response.email);
      $("#contact_number").html(response.contact_number);
      $("#firm").html(response.firm);
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback

    }
  })
}


function displayEmpInfo() {
  $.ajax({
    url: "../src/fetchSalesInfo.php",
    method: "POST",
    dataType: 'json',
    success: function (response) {

      var img = '<img src="'+response.eprofilePic+'" alt="'+response.efname+" " + response.elname+'" class="img-circle" data-lock-picture="'+response.eprofilePic+'" />';
      var prof = '<img src="'+response.eprofilePic+'" alt="'+response.efname+" " + response.elname+'" class="img-circle" data-lock-picture="'+response.eprofilePic+'" />';
     $('#profilePic').html(img);
     $('#image').html(prof);
     $('#sellerName').html(response.efname+" " + response.elname);
      $("#emp_name").html(response.efname + " " + response.elname);
      $("#emp_email").html(response.eemail);
      $("#emp_address").html(response.eaddress);
      $("#joindate").html(response.ejoin_date);
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback

    }
  })
}

function VisitHistory(){
  $("#mapDiv").hide();
  var FunCall_var = 1;
  $.ajax({
    url: "../src/fetchVisitsListforEmp.php",
    method : "POST",
    dataType : 'json',
    data : ({FunCall: FunCall_var}),
    success : function (response){
      //alert("visit History");

            var count = Object.keys(response).length;
            if(count <= 0){
             $("#VisitHistoryTable").hide();
            }
        else{
            $("#VisitHistoryTable").show();
          for (var i = 0; i < count; i++) {
            $("#VisitHistoryData").append('<tr><td>'+ (i+1) +'</td><td>'
            + response[i].RouteName+'</td><td>'
            + response[i].assignDate +'</td><td>'
            + response[i].TotalRouteCnt
            +'</td><td>'+response[i].status+'=Complete</td></tr>');
         }
            $("#VisitHistoryTable").DataTable();
        }
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback
    }
  });
}

function displayEmpTblData() {
  var FunCall_var = 0;
    $("#mapDiv").hide();
  $.ajax({
    url: "../src/fetchVisitsListforEmp.php",
    method: "POST",
    dataType: 'json',
    data : ({FunCall: FunCall_var}),
    success: function (response) {

      var count = Object.keys(response).length;
      if(count <= 0){
       $("#RouteTable").hide();
      }
  else{
      $("#RouteTable").show();
    for (var i = 0; i < count; i++) {
      $("#RouteTableData").append('<tr><td>'+ (i+1) +'</td><td>'
      + response[i].RouteName+'</td><td>'
      + response[i].assignDate +'</td><td>'
      + response[i].TotalRouteCnt
      +'</td><td class="actions"><a class="" title="View All Shops" onclick="return GotoRouteDetails(\''+ response[i].RouteId +'\',\''+response[i].status+'\',\''+response[i].AssignId+'\');"><i class="fa fa-eye"></i></a></td></tr>');
   }
      $("#RouteTable").DataTable()
  }
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback
    }
  });
}

function GotoRouteDetails(RouteId,status,id){
$("#mapDiv").hide();
var startBtn = '',startFlag = "";

  $.ajax({
    url: "../src/fetchShopkeeperInfo.php",
    method: "POST",
    data: ({ RouteId: RouteId}),
    dataType: 'json',
    success: function (response) {

      var count = Object.keys(response).length;
      if(count < 1){
      $("#ShopKeeperTableDiv").hide();
      }
  else{

    $("#ShopKeeperTableData tr").remove();
      $("#ShopKeeperTableDiv").show();
    for (var i = 0; i < count; i++) {


  startBtn = '<button type="button" title="Start Joureny" id="start'+i+'" onclick="Start('+id+','+i+');" class=""><i class="fa fa-paper-plane"></i></button><button style="display:none;" type="button" title="Stop Joureny" id="stop'+i+'" onclick="return StopJourney('+ status +','+i+');"  class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-square"></i></button>';


     $("#destlat").val(response[i].latitude);
     $("#destlng").val(response[i].longitude);

      $("#ShopKeeperTableData").append('<tr><td>'+ (i+1) +'</td><td>'
      + response[i].contactPerson+'</td><td>'
      + response[i].contactNumber+ "/" +response[i].contactNumber2+'</td><td>'
      + response[i].email+'</td><td>'
      + response[i].address +", "+ response[i].address2 +", "+ response[i].country +", "+response[i].state +", "+response[i].city +", "+response[i].pincode
      +'</td><td>'+startBtn+'</td></tr>');
   }
      $("#ShopKeeperTable").DataTable();
  }
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback
    }
  });

}
function Start(id,rowid){
$("#routeassignid").val(id);
 $("#mapDiv").show();
 $.ajax({
   type:'POST',
   url:'../src/updateAssignStatus.php',
   data:({AssignId:id,status:1}),
   dataType:'json',
   success:function(response){
     if(response){
       $('#stop'+rowid).show();
       $('#start'+rowid).hide();
     }else {
       $('#stop'+rowid).hide();
       $('#start'+rowid).show();
     }
   }
 });
 var i=0;
  var slat = document.getElementById('clatitude').value;
 var slong = document.getElementById('clongitude').value;
  var destlat = document.getElementById('destlat').value;
 var destlng = document.getElementById('destlng').value;
 var map = new google.maps.Map(document.getElementById('map1'), {
   zoom: 8,
   center: {lat:18.5328444, lng:18.5328444}  //india
 });
 $("#right-panel").val("");
 var directionsService = new google.maps.DirectionsService;
 var directionsDisplay = new google.maps.DirectionsRenderer({

   map: map,
   panel: document.getElementById('right-panel')
 });

 directionsDisplay.addListener('directions_changed', function() {
   computeTotalDistance(directionsDisplay.getDirections());
 });

 displayRoute({
   location:new google.maps.LatLng(slat,slong)
   },{
   location:new google.maps.LatLng(destlat,destlng)
   } , directionsService,  directionsDisplay);
   setInterval(function(){
    getLocation();
    var slat = document.getElementById('clatitude').value;
    var slong = document.getElementById('clongitude').value;
    // slat = parseFloat(slat) + (i*0.0002);
    // slong = parseFloat(slong) + (i*0.0002);
    var destlat = document.getElementById('destlat').value;
    var destlng = document.getElementById('destlng').value;

     i=i+1;
    displayRoute({
      location:new google.maps.LatLng(slat,slong)
      },{
      location:new google.maps.LatLng(destlat,destlng)
      } , directionsService,  directionsDisplay);
    }, 30000);
   function displayRoute(origin, destination, service, display) {
     service.route({
       origin: origin,
       destination: destination,
       waypoints: [],
       travelMode: 'DRIVING',
       avoidTolls: true
     }, function(response, status) {
       if (status === 'OK') {
         display.setDirections(response);
       } else {

       }
     });
   }
 // StartJourney();
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
function StopJourney(param,rowid){
  $.ajax({
    type:'POST',
    url:'../src/updateAssignStatus.php',
    data:({AssignId:param,status:0}),
    dataType:'json',
    success:function(response){
      if(!response){
        $('#stop'+rowid).show();
        $('#start'+rowid).hide();
      }else {
        $('#stop'+rowid).hide();
        $('#start'+rowid).show();
      }
    }
  });
}

function updatePassword(salerId) {
  // alert("ok");
  var Pass = $('#NewPassword').val();
  if(Pass == ''){
    var msg = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Please Enter password!</strong></font></div>";
				$('#msg').html(msg);

				window.setTimeout(function () {
					$(".alert").fadeTo(500, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 3000);
  }else{
    $.ajax({
      url: "../src/updateSalerPassword.php",
      method: "POST",
      data: ({ saler_id: salerId, Pass: Pass }),
      success: function (data) {
        response = JSON.parse(data);
        if (response['success'] == 'true') {
          var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Password Updated SuccessFully</strong></font></div>";
				$('#msg').html(msg);

				window.setTimeout(function () {
					$(".alert").fadeTo(500, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 3000);
        }
        else {
          alert("Password Changing Failed");
        }
        document.getElementById("PassResetForm").reset();
      }
    });
  }

}
