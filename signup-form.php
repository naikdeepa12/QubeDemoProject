<?php
// Include config file
session_start();
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
        <h2>Complete Registration</h2>
		<div class="error"></div>
		<div class="success"></div>
        <form id="frm-mobile-verification" method="post" >
            <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter the 10 digit mobile" value="<?php echo $_SESSION['mobno']; ?>" readonly>
            </div>  
			<div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" >
            </div> 
			<div class="form-group">
                <label>Email ID</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email id" >
            </div> 
            <div class="form-group">
				<input type="button" id="btnregister" name="btnregister" class="btn btn-primary" value="REGISTER" onClick="register();">
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
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email ID is required'
                    },
                    emailAddress: {
                        message: 'The Email ID is not valid'
                    }
                }
            }
        }
    });
});
</script> 
</body>
</html>