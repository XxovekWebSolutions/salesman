function checkshopmobilenoavailability()
{
	var usermobile = document.getElementById("mobileno").value;
	$.ajax({
			url:"../src/checkAvailablityOfMobile.php",
			dataType:'json',
			data:{mobile1:usermobile,tblName:"shopKeeperMaster"},
			success:function(data)
			{
				if(data['true'] == 'true')
				{
					$("#mobileno").val(' ');
	 	$("#checkmobile").html("Mobile no already exists");
			setTimeout(function() {
    			$('#checkmobile').fadeOut('fast');
					}, 1000);
				}
				else {
					$("#checkmobile").html(" ");
				}
			}
	   });
}
function checkshopemailavailability()
{

	var useremail = document.getElementById("emailid").value;
	$.ajax({
			     url:"../src/checkAvailablityOfUser.php",
			     dataType:'json',
			     data:{email:useremail,tblName:"shopKeeperMaster"},
			     success:function(data)
			    {
			      	if(data['true'] == 'true')
				      {
					    $("#emailid").val('');
	 	           $("#checkemail").html("Email id already exists");
			        setTimeout(function() {
    			         $('#checkemail').fadeOut('fast');
					            }, 1000);
			   	    }
			 	   else {
				   	$("#checkemail").html(" ");
				    }
			    }
	    });
 }
