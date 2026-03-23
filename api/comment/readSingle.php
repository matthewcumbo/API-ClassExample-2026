<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

// Create a new instance of the Comment class
// This allows us to use its structure and functions
$comment = new Comment($db);

$comment->id = isset($_GET["id"]) ? $_GET["id"] : die();

$result = $comment->readSingle();
$num = $result->rowCount();

if($num > 0){
    $comment_info = array(
        'id'        => $comment->id,
        'comment'   => $comment->comment,
        'userId'    => $comment->userId,
        'postId'    => $comment->postId,
    );
    print_r(json_encode($comment_info));
}
else{
    echo json_encode(array("message"=>"No Comments found."));
}


?>