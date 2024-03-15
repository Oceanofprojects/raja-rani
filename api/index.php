<?php


header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$response = array(
		'message'=>'Hello world'
	);
	echo json_encode($response);
}else{
	http_response_code(405);
	$response = array(
		'message'=>'EERRRRR'
	);
	echo json_encode($response);
}


?>