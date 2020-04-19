<?php
require_once("../lib/connect.php");


$filtered = Array(
    "article_id" => mysqli_real_escape_string($conn, $_POST["article_id"]),
    "comment" => mysqli_real_escape_string($conn, $_POST["comment"]),
    "user_id" => $user_id
);

$sql = "insert into comment(comment, article_id, user_id)
values('".$filtered['comment']."', '".$filtered['article_id']."', '".$filtered['user_id']."')";

if(!(mysqli_query($conn, $sql))){
    die("Failed to create comment. Ask for manager <a href='index.php'>Return Home</a>");
}else{    
    $redirection_link = "Location: ../view.php?id=".$filtered['article_id'];
    header($redirection_link);
}

?>