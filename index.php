<?php
// Include config file
require_once '/config/database.php';
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
		.error {    color: #483333;    padding: 10px;    background: #ffbcbc;    border: #efb0b0 1px solid;    border-radius: 3px;    margin: 0 auto;    margin-bottom: 20px;    width: 350px;    display:none;    box-sizing: border-box;}
		.success {    color: #483333;    padding: 10px 20px;    background: #cff9b5;    border: #bce4a3 1px solid;    border-radius: 3px;    margin: 0 auto;    margin-bottom: 20px;    width: 350px;    display:none;    box-sizing: border-box;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
		<div class="error"></div>
        <form id="frm-mobile-verification">
            <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" id="mobile" name="mobile"  class="form-control" placeholder="Enter the 10 digit mobile">
            </div>  
            <div class="form-group">
				<input type="button" class="btn btn-primary" value="Send OTP" onClick="sendOTP();">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
<script src="js/verification.js"></script> 	
<script>
$(document).ready(function() {
    $('#frm-mobile-verification').bootstrapValidator({
        container: '.error',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'Mobile No. is required'
                    },
					regexp: {
					  regexp: /^\d{10}$/,
					  message: 'Please supply a valid 10 digit Mobile No.'
					}
                }
            }
        }
    });
});
</script>
</body>
</html>