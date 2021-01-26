<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
    include_once '../config/database.php';
    include_once '../class/user.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);
	
	$data = json_decode(file_get_contents('php://input'), true);
		
	$item->name = $data['name'];
	$item->email = $data['email'];
	$item->contact = $data['number'];
	    	
	$item->getSingleUser();
	
	if($item->id  == null)
	{
		$item->name = $data['name'];
		$item->email = $data['email'];
		$item->contact = $data['number'];
	
		if($item->createUser()){
			echo json_encode(array("type"=>"success", "message"=>"Record Saved Successfully!!"));       
		} else{
			echo json_encode(array("type"=>"error", "message"=>"User could not be created!"));
		}
	}
	else
	{
		echo json_encode(array("type"=>"error", "message"=>"Mobile No. already exist!"));
	}
?>
