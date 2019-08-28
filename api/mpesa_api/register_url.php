<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../models/initialization.php';

$consumer_key = 'CXUCtBAC7IuCW49a3lHMJZyjVoEztmAr';
$consumer_secret = 'WcoWz82VKfZS6ibL';
$auth = new Auth($consumer_key, $consumer_secret);

//get consumer key 
$headers = ['Content-Type: application/json; charset=utf8'];
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$access_token = $auth->Access_Token($headers, $access_token_url);

//Register url 
$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$shortCode = '600136'; // provide the short code obtained from your test credentials

/* This two files are provided in the project. */
$confirmationUrl = 'confirmation_url.php'; // path to your confirmation url. can be IP address that is publicly accessible or a url
$validationUrl = 'validation.php'; // path to your validation url. can be IP address that is publicly accessible or a url

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'ShortCode' => $shortCode,
  'ResponseType' => 'Confirmed',
  'ConfirmationURL' => $confirmationUrl,
  'ValidationURL' => $validationUrl
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;