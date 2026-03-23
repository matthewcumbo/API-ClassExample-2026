<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PATCH");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

// Create a new instance of the Comment class
// This allows us to use its structure and functions
$comment = new Comment($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// fill in Comment instance properties with decoded values from request
$comment->id = $data->id;
$comment->userId = $data->userId;

if($comment->updateUserId()){
    echo json_encode(array("message" => "Comment User Id updated."));
}
else{
    echo json_encode(array("message" => "Comment User Id not updated."));
}






?>