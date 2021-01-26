		
		<div class="error"></div>
		<div class="success"></div>
		<p>OTP is sent to Your Mobile Number</p>
        <form id="frm-mobile-verification">
            <div class="form-group">
                <label>Enter the OTP</label>
				<input type="number"  id="mobileOtp" class="form-control" placeholder="Enter the OTP">
            </div>  
            <div class="form-group">
				<input id="verify" type="button" class="btn btn-primary" value="Verify" onClick="verifyOTP();">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>