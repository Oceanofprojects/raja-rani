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

/*
    "PG_HOST": "ep-shrill-disk-******.eu-central-1.aws.neon.tech",
    "PG_PORT": "5432",
    "PG_DB": "php-neon",
    "PG_USER": "daniil.bazhenov",
    "PG_PASSWORD": "**********",
    "PG_ENDPOINT": "ep-shrill-disk-******"*/
?>