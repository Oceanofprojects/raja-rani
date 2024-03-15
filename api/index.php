<?php


header('Content-Type: application/json');

if(!isset($_GET['api'])){
	$response = array(
		'status'=>false,
		'data'=>[],
		'message'=>'API not found !'
	);
	echo json_encode($response);
	exit;
}
if($_GET['api'] == 'test'){
	$response = array(
		'message'=>'Hello world'
	);
	echo json_encode($response);
}else if($_GET['api'] && $_GET['api'] == 'live'){
	$host = $_ENV['PG_HOST'];
	$port = $_ENV['PG_PORT'];
	$db = $_ENV['PG_DB'];
	$user = $_ENV['PG_USER'];
	$password = $_ENV['PG_PASSWORD'];
	$endpoint = $_ENV['PG_ENDPOINT'];

	$connection_string = "host=" . $host . " port=" . $port . " dbname=" . $db . " user=" . $user . " password=" . $password . " options='endpoint=" . $endpoint . "' sslmode=require";
	$dbconn = pg_connect($connection_string);

	if (!$dbconn) {
	    die("Connection failed: " . pg_last_error());
	}

	echo "Connected successfully";

}else{
	http_response_code(405);
	$response = array(
		'message'=>'EERRRRR'
	);
	echo json_encode($response);
}



?>