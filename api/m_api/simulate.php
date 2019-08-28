<?php 
include_once '../../models/initialization.php';

///1. obtain the access token 
$consumer_key = 'CXUCtBAC7IuCW49a3lHMJZyjVoEztmAr';
$consumer_secret = 'WcoWz82VKfZS6ibL';
$auth = new Auth($consumer_key, $consumer_secret);

//get access token 
$headers = ['Content-Type: application/json; charset=utf8'];
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$access_token = $auth->Access_Token($headers, $access_token_url);// check file mpesa_accesstoken.php.  

//Simulate Payments
$simulate_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

$ShortCode  = '600136'; // Shortcode. Same as the one on register_url.php
$amount     = '50'; // amount the client/we are paying to the paybill
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
//print_r($curl_response);
echo $curl_response;
?>