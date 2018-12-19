
function displaybankdetails()
{
		var checkBox = document.getElementById("bankdetails");
		var text = document.getElementById("account");
		var text1 = document.getElementById("ifsc");
		var text2 = document.getElementById("branch");

		if (checkBox.checked == true){
				text.style.display = "block";
				text1.style.display = "block";
				text2.style.display = "block";
		}
		else {
			text.style.display = "none";
			text1.style.display = "none";
			text2.style.display = "none";
			checkBox.checked = false;
	 }
}

function checkuseremailavailability()
{

	var useremail = document.getElementById("emailid").value;
	$.ajax({
			     url:"../src/checkAvailablityOfUser.php",
			     dataType:'json',
			     data:{email:useremail,tblName:"SalesManMaster"},
			     success:function(data)
			    {
			      	if(data['true'] == 'true')
				      {
					    $("#emailid").val('');
	 	           $("#checkemail1").html("Email id already exists");
			        setTimeout(function() {
    			         $('#checkemail1').fadeOut('fast');
					            }, 1000);
			   	    }
			 	   else {
				   	$("#checkemail1").html(" ");
				    }
			    }
	    });
 }

function checkusermobilenoavailability()
{
	var usermobile = document.getElementById("mobileno").value;
	$.ajax({
			url:"../src/checkAvailablityOfMobile.php",
			dataType:'json',
			data:{mobile1:usermobile,tblName:"SalesManMaster"},
			success:function(data)
			{
				if(data['true'] == 'true')
				{
					$("#mobileno").val(' ');
	 	$("#checkmobile1").html("Mobile no already exists");
			setTimeout(function() {
    			$('#checkmobile1').fadeOut('fast');
					}, 1000);
				}
				else {
					$("#checkmobile1").html(" ");
				}
			}
	   });
}
