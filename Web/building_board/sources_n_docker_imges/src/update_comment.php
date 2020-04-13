<?php
require_once("lib/connect.php");

$filtered_id = $_GET['id'];
settype($filtered_id, "int");

$sql = "select user_id, article_id, comment from comment where id = ".$filtered_id;
$result = query_return_arr($conn, $sql);

if($user_id != $result['user_id']){
    die("Access Denied. <a href='index.php'>Return Home</a>");
}
$filtered_comment = htmlspecialchars($result['comment']);

?>



<html>
<head>
<meta charset="utf-8">
<title>Edit Comment</title>
</head>
<body>
<h1>Edit Comment</h1>
<form action="process/update_comment.php" method="POST">
    <p><input type="hidden" name="article_id" value="<?=$result['article_id'] ?>">
    <p><input type="hidden" name="id" value="<?=$filtered_id ?>"></p>
    <p><textarea name="comment"><?=$filtered_comment ?></textarea></p>
    <p><input type="submit"></p>
</form>
</body>
</html>