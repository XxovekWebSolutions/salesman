$(document).ready(function(){
	display_profile();
})
$('#sign_up').on("submit", function (event) {
	event.preventDefault();
	$.ajax({
		url: "../src/adminRegistration.php",
		method: "POST",
		dataType: "json",
		data: $('#sign_up').serialize(),
		success: function (response) {
			if (response.true) {
				if(response.flag == 0)
					window.location = 'pages-signin.php';
				if(response.flag == 1)
					window.location.reload();
}
			else {
				alert("something went wrong");
			}
		}
	})
});
function checkEmailAvailability(param) {
	jQuery.ajax({
		url: "../src/check_email_availablity.php",
		data: { email: param },
		type: "POST",
		success: function (response) {
			if (response == "<span class='status-not-available' style='color:red'> Email Id Already Exists.</span>") {
				$("#email").val('');
			}
			$("#email-availability").html(data);
		},
		error: function () { }
	});
}

function validatePassword() {
	var password = document.getElementById("pwd");
	var confirm_password = document.getElementById("pwd_confirm");
	if (password.value != confirm_password.value) {
		confirm_password.value = '';
		alert("Passwords Doesn't Match");
	}
}
$("#Salessignin").on("submit", function (e) {
	e.preventDefault()
	$.ajax({
		url: "../src/authenticateSales.php",
		method: "POST",
		dataType: "json",
		data: $("#Salessignin").serialize(),
		success: function (response) {
			if (response.true == 'true') {
				window.location = "view_sales_details.php";
			}
			else {
				var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Please Enter Correct Username or password!</strong></font></div>";
				$('#msg').html(msg);
			}
			window.setTimeout(function () {
				$(".alert").fadeTo(500, 0).slideUp(500, function () {
					$(this).remove();
				});
			}, 3000);
		}
	});
});

$("#signin").on("submit", function (e) {
	e.preventDefault();
	$.ajax({
		url: "../src/authenticateAdmin.php",
		method: "POST",
		dataType: "json",
		data: $("#signin").serialize(),
		success: function (response) {
			if (response.true == 'true') {
				window.location = 'index.php';
			}
			else {
				var msg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Please Enter Correct Username or password!</strong></font></div>";
				$('#msg').html(msg);

				window.setTimeout(function () {
					$(".alert").fadeTo(500, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 3000);
			}
		}
	});
});
function display_profile()
{
	$.ajax({
		url: "../src/fetch_admin.php",
		method: "POST",
		dataType: "json",
		success: function (response) {
			$("#fname").val(response.fname);
			$("#lname").val(response.lname);
			$("#firm").val(response.firm);
			$("#pwd").val(response.pwd);
			$("#cnum").val(response.cnum);
			$("#email").val(response.email);

		}
	});
}
