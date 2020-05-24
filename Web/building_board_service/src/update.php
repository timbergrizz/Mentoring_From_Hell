<?php
    require_once("lib/connect.php");

    $filtered_id = $_GET['id'];
    settype($filtered_id, "int");

    $sql = "select user_id, title, content from article where id = ".$filtered_id;
    $result = query_return_arr($conn, $sql);

    if($_SESSION['user_id'] != $result['user_id']){
        die("Access Denied. <a href='index.php'>Return Home</a>");
    }
    $filtered = Array(
        'title' => htmlspecialchars($result['title']),
        'content' => htmlspecialchars($result['content']),
    );

?>



<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Article</title>
  </head>
  <body>
    <h1>Edit Article</h1>
    <form action="process/update.php" method="POST">
        <p><input type="hidden" name="id" value="<?=$filtered_id ?>"></p>
        <p><input type="text" name="title" value="<?=$filtered['title'] ?>" ></p>
        <p><textarea name="content"><?=$filtered['content'] ?></textarea></p>
        <p><input type="submit"></p>
    </form>
  </body>
</html>