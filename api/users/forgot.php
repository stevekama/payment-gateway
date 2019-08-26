<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../models/users.php';

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$user = new Users();

$user->email = $data->email;

//find user by email 
$userMail = $user->find_user_by_email($user->email);

if($userMail){
    echo json_encode($userMail);
}