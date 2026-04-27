<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes/initialize.php");

$post = new Post($db);
$comment = new Comment($db);

$result = $post->read();
$num = $result->rowCount();

if($num > 0){
    $posts_list = array();
    $posts_list['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $comment->postId = $id;
        $commentsResult = $comment->readByPostId();

        $commentsNum = $commentsResult->rowCount();
        if($commentsNum > 0){
            $commentsList = array();
            $commentsList["data"] = array();

            while($commentRow = $commentsResult->fetch(PDO::FETCH_ASSOC)){
                extract($commentRow);
                // print_r($commentRow);
                $comment_item = array(
                    "id"        => $id,
                    "comment"   => $comment,
                    "postId"    => $postId,
                    "userId"    => $userId,
                );
                array_push($commentsList['data'], $comment_item);
            }
        }
        else{

        }

        $post_item = array(
            "id"        => $id,
            "title"     => $title,
            "content"   => $content,
            "userId"    => $userId,
            "comments"  => $commentsList    
        );

        // if($commentsList!=null){
        //     $post_item["comments"] = $commentsList;
        // }

        array_push($posts_list['data'], $post_item);
    }

    echo json_encode($posts_list);
}
else{
    echo json_encode(array("message"=>"No users found."));
}

