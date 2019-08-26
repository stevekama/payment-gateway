<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../models/initialization.php';

if($_POST['action'] == 'FETCH_USER'){
    $user = new Users();
    $user->id = $session->user_id;
    $userData = $user->find_user_by_id();
    if($userData){
        echo json_encode($userData);
    }
} 

 if($_POST['action'] == 'LOGOUT'){ 
     if($session->is_logged_in()){
         $session->logout();
         echo json_encode(array('message'=>'success'));
     }
 } ?>