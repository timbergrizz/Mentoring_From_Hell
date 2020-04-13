<?php
require_once("../lib/connect.php");

$filtered = Array(
    "user_id" => mysqli_real_escape_string($conn, $_POST["user_id"]),
    "title" => mysqli_real_escape_string($conn, $_POST["title"]),
    "content" => mysqli_real_escape_string($conn, $_POST["content"])
);

$sql = "
insert into article
(title, content, user_id)
values (
    '{$filtered['title']}',
    '{$filtered['content']}',
    '{$filtered['user_id']}'
)
";

    
if(!mysqli_query($conn, $sql)){
    echo "There was a problem with saving data. Ask for administrator.";
    error_log(mysqli_error($conn));
}else
    header('Location: ../index.php');


?>