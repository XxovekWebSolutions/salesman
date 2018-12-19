function showsalesform()
{
	$("#submitformdata")[0].reset();
	$("#gender").select2("val", "");
	$("#status").select2("val", "");
	$("#country").select2("val", "");
	$("#state").select2("val", "");
	$("#city").select2("val", "");
	$("#salesform").show();
	$("#salesmanid").hide();
	$("#salesid").show();
	$("#salestable").hide();
	$("#profilePic").html(' ');
}

function setAddress1(f)
{
	if(f.checkaddress.checked == true) {
    f.address2.value = f.address.value;
  }
	else {
		f.address2.value = '';

	}
}

function display_salesman()
{
    $.ajax({
        type: "POST",
				dataType:"json",
        url: "../src/display_salesman.php",
    }).done(function(data) {
			if(!(data)){
				$("#salesmaninfodata").html('<tr ><td></td><td></td><td></td><td></td><td  style="color:black;">No data available in table</td></tr>');
			}
			else
			{
        var count = Object.keys(data).length;
        for (var i = 0; i < count; i++)
         {

            var sales_id = parseInt(data[i]['Emp_id']);
						var uploadimg = ' <img src='+data[i]['profilePic']+' class="img-circle" alt="user profile" width="40" height="30"> ';
            $('#salesmaninfodata').append('<tr><td class="text-center" >' + uploadimg+ '</td><td class="text-center"><button type="button" class="btn btn-link" data-toggle="collapse" title="Update Salesman Information" data-target="#demo" onclick="updatesalesinfo(' + sales_id + ');">' + data[i]['fullname'] + '</button></td><td class="text-center">' + data[i]['email'] + '</td><td class="text-center">'+ data[i]['mobile'] +'</td><td class=" text-center">' + data[i]['status'] +
						'</td><td class=" text-center">' + data[i]['address'] + '</td><td class=" text-center"><button type="button" class="btn btn-info " data-toggle="collapse" title="Update Salesman Information" data-target="#hidecustomerfield" name="submit"  onclick="updatesalesinfo(' + sales_id + ');"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger" title="Remove Salesman" name="submit"  id="' + sales_id + '" onClick="removesalesman(' + sales_id + ');" ><i class="fa fa-trash-o"></i></button><button type="button" class="btn btn-primary" title="Assign Work" name="submit"  id="' + sales_id + '" onClick="Assignwork(' + sales_id + ');" ><i class="fa fa-thumbs-up"></i></button></td></tr>');
        }
       }
      $("#datatable-default").DataTable({
       });
    }).fail(function(jqXHR, textStatus) {
        alert('Request Failed');
  })
}


function updatesalesinfo (param)
{

$("#salesform").show();
$("#salestable").hide();
$("#salesmanid").show();
$("#salesid").hide();
$.ajax({
    url: "../src/fetchSalesInfo.php",
    method: "POST",
    dataType:"json",
    data: {saleinfo:param},
    success: function(data)
    {
      $("#firstname").val(data['efname']);
      $("#lastname").val(data['elname']);
      $("#emailid").val(data['eemail']);
      $("#mobileno").val(data['emobile']);
			$("#mobileno1").val(data['emobile1']);
      $("#birthdate").val(data['edob']);
      $("#emp_id").val(data['emp_id']);


				document.getElementById("bankdetails").checked = true;
				document.getElementById("account").style.display = "block";
				document.getElementById("ifsc").style.display = "block";
				document.getElementById("branch").style.display = "block";
      $("#account").val(data['eAccountNo']).show();
      $("#ifsc").val(data['eifscCode']).show();
      $("#branch").val(data['ebranch']).show();
      $("#address").val(data['eaddress']);
			$("#address2").val(data['eaddress1']);
			$("#salespincode").val(data['epincode']);
			$("#gender").append("<option value=" + data['egender'] + " selected=selected>" + data['egender'] + "</option>").trigger('change');
			$("#status").append("<option value=" + data['estatus'] + " selected=selected>" + data['estatus'] + "</option>").trigger('change');
			$("#country").append("<option value=" + data['ecountry'] + " selected=selected>" + data['ecountry'] + "</option>").trigger('change');
			$("#state").append("<option value=" + data['estate'] + " selected=selected>" + data['estate'] + "</option>").trigger('change');
			$("#city").append("<option value=" + data['ecity'] + " selected=selected>" + data['ecity'] + "</option>").trigger('change');
			var x = data['eprofilePic'];
			var filename = x.replace(/^.*[\\\/]/, '');
  		document.getElementById("profile").innerHTML = filename;
			var firstaddress = document.getElementById("address").value;
			var secondaddress = document.getElementById("address2").value;
			if (firstaddress === secondaddress)
							document.getElementById("checkaddress").checked = true;
			else
							document.getElementById("checkaddress").checked = false;
    }
  });
}

function updateshopsinfo (param)
{
$("#shopkeeperform").show();
$("#shoptable").hide();
$("#shopmanid").show();
$("#shopid").hide();
$.ajax({
    url: "../src/fetchShopsInfo.php",
    method: "POST",
    dataType:"json",
    data: {shopinfo:param},
    success: function(data)
    {
      $("#contactperson").val(data['efname']);
      $("#emailid").val(data['eemail']);
      $("#mobileno").val(data['emobile']);
			$("#mobileno1").val(data['emobile1']);
      $("#shopkeeper_id").val(data['emp_id']);
      $("#address").val(data['eaddress']);
			$("#address2").val(data['eaddress1']);
			$("#shoppincode").val(data['epincode']);
			$("#country").append("<option value=" + data['ecountry'] + " selected=selected>" + data['ecountry'] + "</option>").trigger('change');
			$("#state").append("<option value=" + data['estate'] + " selected=selected>" + data['estate'] + "</option>").trigger('change');
			$("#city").append("<option value=" + data['ecity'] + " selected=selected>" + data['ecity'] + "</option>").trigger('change');
			var firstaddress = document.getElementById("address").value;
			var secondaddress = document.getElementById("address2").value;
			if (firstaddress === secondaddress)
							document.getElementById("checkaddress").checked = true;
			else
							document.getElementById("checkaddress").checked = false;
    }
  });
}

function showsalesmaninfotable()
{
$("#salestable").show();
$("#salesform").hide();
}


function removesalesman(param)
{
  var t = confirm("Do You want to delete the Salesman permanantly!");
  if (t == true) {
            $.ajax({
            url:"../src/removeDetails.php",
            async: false,
            cache: false,
            method:"POST",
            data:({id:param,tblName:'SalesManMaster',colName:'salesManId'}),
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

          }
}

function removeshopsman(param)
{
  var t = confirm("Do You want to delete the Salesman permanantly!");
  if (t == true) {
            $.ajax({
            url:"../src/removeDetails.php",
            async: false,
            cache: false,
            method:"POST",
            data:({id:param,tblName:'shopKeeperMaster',colName:'shopKeeperId'}),
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

          }
}
function Assignwork(shopId)
{
	window.location.href="assign_salesman.php";
}
function display_shopkeeper()
{
	$.ajax({
			type: "POST",
			dataType:"json",
			url: "../src/display_shopkeeper.php",
	}).done(function(data) {
		if(!(data)){
			$("#shopmaninfodata").html('<tr ><td></td><td></td><td></td><td></td><td  style="color:black;">No data available in table</td></tr>');
		}
		else
		{
			var count = Object.keys(data).length;
			for (var i = 0; i < count; i++)
			 {
					var shops_id = parseInt(data[i]['shop_id']);
	$('#shopmaninfodata').append('<tr><td class="text-center"><button type="button" class="btn btn-link" data-toggle="collapse" title="Update Shopkeeper Information" data-target="#demo" onclick="updateshopsinfo(' + shops_id + ');">' + data[i]['fullname'] + '</button></td><td class="text-center">' + data[i]['email'] + '</td><td class="text-center">'+ data[i]['mobile'] +'</td><td class=" text-center">' + data[i]['city'] +
	'</td><td class=" text-center">' + data[i]['address'] + '</td><td class=" text-center"><button type="button" class="btn btn-info" data-toggle="collapse" title="Update Shopman Information" data-target="#hidecustomerfield" name="submit"  onclick="updateshopsinfo(' + shops_id + ');"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger" title="Remove Salesman" name="submit"  id="' + shops_id + '" onClick="removeshopsman(' + shops_id + ');" ><i class="fa fa-trash-o"></i></button></td></tr>');
			}
		 }
		$("#datatable-default").DataTable({
		 });
	}).fail(function(jqXHR, textStatus) {
			alert('Request Failed');
})
}


function showshopkeepermaninfotable()
{
$("#shoptable").show();
$("#shopkeeperform").hide();
}

function showshopkeeperform()
{
	$("#submitshopkeeperformdata")[0].reset();
	$("#gender").select2("val", "");
	$("#country").select2("val", "");
	$("#state").select2("val", "");
	$("#city").select2("val", "");
	$("#shopkeeperform").show();
	$("#shopmanid").hide();
	$("#shopid").show();
	$("#shoptable").hide();
}
