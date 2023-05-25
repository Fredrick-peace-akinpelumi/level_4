<?php
require_once('Users.php');
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Headers:Content-Type');


$_POST = json_decode(file_get_contents("php://input"));
$name = $_POST->name;
$email = $_POST->email;
$password = password_hash($_POST->password, PASSWORD_DEFAULT) ;

// $name = "Williams Sunday";
// $email = "sunday100@gmail.com";
// $password = password_hash("fishfish", PASSWORD_DEFAULT);

$users = new User;
$result = $users->createUser($name, $email, $password);
$response = [];
if($result){
    $response['success'] = true;
}else{
    $response['success'] = false;
}

echo json_encode($response);