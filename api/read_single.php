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
	
    $item->contact = $data['number'];
	
    $item->getSingleUser();

    if($item->contact != null){       
       echo json_encode(array("type"=>"success", "message"=>"User Exist!"));      
    }
    else{
        echo json_encode(array("type"=>"error", "message"=>"Mobile No. does not exist"));
    }
?>