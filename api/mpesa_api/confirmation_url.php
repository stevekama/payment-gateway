<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../models/initialization.php';

$response = '{
    "ResultCode": 0, 
    "ResultDesc": "Confirmation Received Successfully"
}';

// DATA
$m_response = file_get_contents('php://input');

$jsonMpesaResponse = json_decode($m_response, true); // We will then use this to save to database

// log the response
$logFile = "MPESAConfirmationResponse.txt";

// write to file
$log = fopen($logFile, "a");

fwrite($log, $m_response);
fclose($log);

echo $response;