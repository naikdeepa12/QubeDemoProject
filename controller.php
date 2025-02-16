<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"]) {
            case "send_otp":
                
				$mobile_number = $_POST['mobile_number'];
				
				$_SESSION['mobno'] = $mobile_number;
                $apiKey = urlencode('cff8YFhUMtY-C9iyujOYAJHKuwGyBAFRmsnirnCwEE');
                $numbers = array('91'.$mobile_number);
                $sender = urlencode('TXTLCL');
				
                $otp = rand(100000, 999999);
				//$otp = 123456;
                $_SESSION['session_otp'] = $otp;
                $message = rawurlencode("Your One Time Password is " .$otp);
                
				$numbers = implode(',', $numbers);
				
				$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
				
				$ch = curl_init('https://api.textlocal.in/send/');
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				$response = curl_exec($ch);
				
				if ($response === false) 
					$response = curl_error($ch);

				//echo stripslashes($response);

				curl_close($ch);
				
				require_once ("verify.php");
                exit();
				
                break;
                
            case "verify_otp":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
				
			case "send_otp_signin":
                
                $mobile_number = $_POST['mobile_number'];
                $_SESSION['mobno'] = $mobile_number;
                $apiKey = urlencode('cff8YFhUMtY-C9iyujOYAJHKuwGyBAFRmsnirnCwEE');
                 $numbers = array('91'.$mobile_number);
                $sender = 'TXTLCL';
                $otp = rand(100000, 999999);
				//$otp = 123456;
                $_SESSION['session_otp'] = $otp;
                $message = rawurlencode("Your One Time Password is " .$otp);
                $numbers = implode(',', $numbers);
				$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
				
				$ch = curl_init('https://api.textlocal.in/send/');
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				$response = curl_exec($ch);
				curl_close($ch);
				
				require_once ("verify-signin.php");
                exit();
				
                break;
				
			case "verify_otp_signin":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
?>
