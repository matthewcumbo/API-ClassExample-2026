<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "DELETE"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes/initialize.php");

// Create a new instance of the User class
// This allows us to use its structure and functions
$user = new User($db);

// $user->id = isset($_GET["id"]) ? $_GET["id"] : die();


// Check if ID is provided in query string
if(isset($_GET["id"])){
    $user->id = $_GET["id"];
}
else{
    // if not, Error 401 (Bad Request)
    http_response_code(401);
    echo json_encode(array("message" => "User ID was not provided."));
    die();
}


if($user->delete()){
    http_response_code(200);
    echo json_encode(array("message" => "User deleted."));
}
else{
    http_response_code(500);
    echo json_encode(array("message" => "User not deleted."));
}