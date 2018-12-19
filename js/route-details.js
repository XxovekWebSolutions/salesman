display_routes();
getRoute_name();
getShop_name();
function showform()
{
	$("#assignroute")[0].reset();
	$("#routeform").show();
	$("#routetable").hide();
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
function getShop_name()
{
    $.ajax({
              type: "POST",
              url: "../src/get_Shops.php",
              success: function(msg)
             {
                    $("#shop").html(msg);
              }
            });
}
function display_routes() {
  $.ajax({
    url:"../src/display_route_details.php",
    dataType:"json",
    method:"POST",
    success:function(data){
      var count=Object.keys(data).length;
      for (var i = 0; i < count; i++)
      {
      $("#route").append('<tr class="gradeX"><td class="text-center">'+ (i+1) +'</td><td class="text-center">'+ data[i]['route'] +'</td><td class="text-center">'+ data[i]['sname'] +'</td><td class="text-center">'+ data[i]['sphone'] +
      '</td><td class="actions text-center"><a href="#" class="btn btn-info" onClick="edit_route('+ (i+1) +','+ data[i]['RdId'] +');"><i class="fa fa-pencil"></i></a><a href="#" class="btn btn-danger" onClick="remove_route('+ (i+1) +','+ data[i]['RdId'] +');"><i class="fa fa-trash-o"></i></a></td></tr>')
    }
						$("#datatable-default").DataTable();
    }

  });

}
$("#assignroute").on("submit",function(e)
{
	e.preventDefault();
	var s=$("#source").val();
	var d=$("#shop").val();

	if((s.length==0) || (d.length==0))
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
    url:"../src/addRouteDetails.php",
    dataType:"json",
    method:"POST",
		data:$("#assignroute").serialize(),
    success:function(response){
      if(response)
			{
				if(response.flag == 1){
					var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='Green'> Inserted Successfully!</strong></font></div>";
					$('#msg').html(msg);
					window.location.reload();
				}else {
					var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='Green'> Updated Successfully!</strong></font></div>";
					$('#msg').html(msg);
					$("#r_id").val('');
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
	$("#r_id").val(param1);
	var source=document.getElementById("datatable-default").rows[param].cells[1].innerHTML;
	var shop=document.getElementById("datatable-default").rows[param].cells[2].innerHTML;
	$.ajax({
	    url: "../src/fetch_route_detail.php",
	    method: "POST",
	    dataType:"json",
	    data: {rdid:param1},
	    success: function(data)
	    {
			$("#source").append("<option value=" + data[0]['rid'] + " selected=selected>" + source + "</option>").trigger('change');
			$("#shop").append("<option value=" + data[0]['sid'] + " selected=selected>" + shop + "</option>").trigger('change');
	    }
	  });


}
function remove_route(param,param1) {
  var con = confirm("Do You want to delete the Route permanantly!");
  if (con == true) {
            $.ajax({
            url:"../src/removeDetails.php",
            method:"POST",
            data:({id:param1,tblName:'RouteDetails',colName:'routeDetailId'}),
						dataType:'json',
            success:function(response)
            {
						if(response.true){
							$("#"+param).closest('tr').remove();
								window.location.reload();
						}

            }
            });
          } else {
            // window.location.reload();
          }
}
