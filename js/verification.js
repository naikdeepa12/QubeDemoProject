function sendOTP() {
	$(".error").html("").hide();
	var number = $("#mobile").val();
	if (number.length == 10 && number != null) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			data : input,
			success : function(response) {
				$(".wrapper").html(response);
			}
		});
	} else {
		$(".error").html('Please enter a valid Mobile No.')
		$(".error").show();
	}
}


function verifyOTP() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				if(response.type == "error")
				{
					$("." + response.type).html(response.message)
					$("." + response.type).show();
				}
				else{					
					window.location = "http://localhost/php_test/signup-form.php";
				}
			},
			error : function() {
				alert("ss");
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.')
		$(".error").show();
	}
}

function register() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	
	var name = $("#name").val();
	var number = $("#mobile").val();
	var email = $("#email").val();
	
	var input = {
		"name" :  name ,
		"number" :  number,
		"email" : email
	};
	debugger;
	$.ajax({
		url : 'http://localhost/php_test/api/create.php',
		type : 'POST',
		dataType : "json",
		contentType: "application/json",
		data : JSON.stringify(input),
		success : function(response) {
			if(response.type == "error")
			{
				$("." + response.type).html(response.message)
				$("." + response.type).show();
			}
			else{
				$(".success").html(response.message)
				$(".success").show();
				$("#btnregister").hide();
			}
		}, 
		error: function(response){
			debugger;
			alert(response);
		}
		});
}

function sendOTPsignin() {
	$(".error").html("").hide();
	var number = $("#mobile").val();
	if (number.length == 10 && number != null) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp_signin"
		};
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			data : input,
			success : function(response) {
				$(".wrapper").html(response);
			}
		});
	} else {
		$(".error").html('Please enter a valid number!')
		$(".error").show();
	}
}

function verifyOTPsignin() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp_signin"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				if(response.type == "error")
				{
					$("." + response.type).html(response.message)
					$("." + response.type).show();
				}
				else{
					var number = $("#mobno").val();
	
					var input1 = {
						"number" : number
					};
					$.ajax({
						url : 'http://localhost/php_test/api/read_single.php',
						type : 'POST',
						dataType : "json",
						contentType: "application/json",
						data : JSON.stringify(input1),
						success : function(response) {
							if(response.type == "error")
							{
								$("." + response.type).html(response.message)
								$("." + response.type).show();
							}
							else{					
								window.location = "http://localhost/php_test/user-details.php";
							}
						},
						error: function(response){
							alert(response);
						}
					});
				}
			},
			error : function() {
				alert("ss");
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.')
		$(".error").show();
	}
}
