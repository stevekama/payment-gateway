<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../models/initialization.php';

$key = $_POST['key'];
$secret = $_POST['secret'];

$auth = new Auth($key, $secret);

$headers = ['Content-Type: application/json; charset=utf8'];

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$access_token = $auth->Access_Token($headers, $url);

echo $access_token;
?>