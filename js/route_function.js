
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
function display_routes() {
  $.ajax({
    url:"../src/display_routes.php",
    dataType:"json",
    method:"POST",
    success:function(data){
      var count=Object.keys(data).length;
      for (var i = 0; i < count; i++)
      {
      $("#route").append('<tr class="gradeX"><td class="text-center">'+ (i+1) +'</td><td class="text-center">'+ data[i]['source'] +'</td><td class="text-center">'+ data[i]['dest'] +'</td><td class="text-center">'+ data[i]['creattime'] +'</td><td class="text-center">'+ data[i]['updatetime'] +
      '</td><td class="actions text-center"><a href="#" class="btn btn-info" onClick="edit_route('+ (i+1) +','+ data[i]['RouteId'] +');"><i class="fa fa-pencil"></i></a><a href="#" class="btn btn-danger" onClick="remove_route('+ (i+1) +','+ data[i]['RouteId'] +');"><i class="fa fa-trash-o"></i></a></td></tr>')
    }
			$("#datatable-default").DataTable();
    }
  });

}
$("#assignroute").on("submit",function(e)
{
	e.preventDefault();
	var s=$("#source").val();
	var d=$("#dest").val();

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
    url:"../src/add_route.php",
    dataType:"json",
    method:"POST",
		data:$("#assignroute").serialize(),
    success:function(response){
      if(response.val1=='insert' && response.true=='true')
			{
				$('#msg').html("<font color='green'>Inserted Successfully</font>");
				window.location.reload();
			}
			else if(response.val1=='update' && response.true=='true'){
				$('#msg').html("<font color='green'>Updated Successfully</font>");
				$("#r_id").val('');
				window.location.reload();
			}
			else {
				$('#msg').html("<font color='red'>Something went wrong..plz try again !</font>");
			}
    }
  });
}
});
function edit_route(param,param1) {
  // alert(param)
	$("#routeform").show();
	$("#routetable").hide();
	$("#r_id").val(param1);
	$("#source").val(document.getElementById("datatable-default").rows[param].cells[1].innerHTML);
	$("#dest").val(document.getElementById("datatable-default").rows[param].cells[2].innerHTML);
}
function remove_route(param,param1) {
  var con = confirm("Do You want to Remove the Route permanantly!");
  if (con == true) {
            $.ajax({
            url:"../src/removeDetails.php",
            method:"POST",
            data:({id:param1,tblName:'RouteMaster',colName:'RouteId'}),
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
