		<div class="error"></div>
		<div class="success"></div>
		<p>OTP is sent to Your Mobile Number</p>
        <form id="frm-mobile-verification">
            <div class="form-group">
                <label>Enter the OTP</label>
				<input type="number"  id="mobileOtp" class="form-control" placeholder="Enter the OTP">
				<input type="hidden"  id="mobno" name="mobno" value="<?php echo $_SESSION['mobno']; ?>">
            </div>  
            <div class="form-group">
				<input id="verify" type="button" class="btn btn-primary" value="Verify" onClick="verifyOTPsignin();">
            </div>
            <p>Don't have an account? <a href="index.php">SignUp here</a>.</p>
        </form>