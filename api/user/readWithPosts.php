<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

$user = new User($db);
$post = new Post($db);


$result = $user->read();
$num = $result->rowCount();

if($num > 0){
    $users_list = array();
    $users_list['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post->userId = $id;
        $postsResult = $post->readByUserId();

        $postsNum = $postsResult->rowCount();
        if($postsNum > 0){
            $postsList = array();
            $postsList["data"] = array();

            while($postRow = $postsResult->fetch(PDO::FETCH_ASSOC)){
                extract($postRow);

                $post_item = array(
                    "id"        => $id,
                    "title"     => $title,
                    "content"   => $content,
                    "userId"    => $userId,
                );
                array_push($postsList['data'], $post_item);
            }
        }
        else{

        }

        $user_item = array(
            "id"        => $id,
            "username"  => $username,
            "firstName" => $firstName,
            "lastName"  => $lastName,
            "age"       => $age,
            "posts"     => $postsList
        );

        array_push($users_list['data'], $user_item);
    }

    echo json_encode($users_list);
}
else{
    echo json_encode(array("message"=>"No users found."));
}



// call the necessary function(s)
    // read function from User
    // readByUserId function from Post
// structure results (json)
// return results (with response codes)