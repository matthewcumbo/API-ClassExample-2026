<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

// Create a new instance of the User class
// This allows us to use its structure and functions
$post = new Post($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// fill in user instance properties with decoded values from request
$post->title = $data->title;
$post->content = $data->content;
$post->userId = $data->userId;

if($post->create()){
    echo json_encode(array("message" => "Post created."));
}
else{
    echo json_encode(array("message" => "Post not created."));
}