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

$user->fullnames = $data->fullnames;
$user->phone = $data->phone;
$user->email = $data->email;
$user->username = $data->username;
$user->password = $data->password;

//find user by email 
$usermail = $user->find_user_by_email($user->email);

if($usermail){
    echo json_encode(array('message'=>'User Email in use'));
    die();
}

///create user 
if($user->create()){
    echo json_encode(array('message'=>'User Created'));
}else{
    echo json_encode(array('message'=>'User Not Created'));
}