<?php
require_once("../lib/connect.php");

    $filtered_id = $_POST['comment_id'];
    settype($filtered_id, "int");

    $sql = "select user_id, article_id from comment where id = ".$filtered_id;
    $result = query_return_arr($conn, $sql);

    $article_id = $result['article_id'];

    authentication_comment($filtered_id, $conn);

    $sql = "delete from comment where id=".$filtered_id;
    mysqli_query($conn, $sql);


    $redirection_link = "Location: ../view.php?id=".$article_id;
    header($redirection_link);

?>