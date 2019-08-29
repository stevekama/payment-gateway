<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../models/initialization.php';

///1. obtain the access token 
$access_token = $_POST['token']; // check file mpesa_accesstoken.php.  

//Simulate Payments
$simulate_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

$ShortCode  = $_POST['code']; // Shortcode. Same as the one on register_url.php
$amount     = $_POST['amount']; // amount the client/we are paying to the paybill
$msisdn     = '254708374149'; // phone number paying 
$billRef    = 'inv950'; // This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $simulate_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
$curl_post_data = array(
    'ShortCode' => $ShortCode,
    'CommandID' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'Msisdn' => $msisdn,
    'BillRefNumber' => $billRef
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;
?>