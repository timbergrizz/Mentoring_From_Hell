<?php
require_once("lib/connect.php");
?>
<!doctype html>


<html>
  <head>
    <meta charset="utf-8">
    <title>Create New Article</title>
  </head>
  <body>
    <h1>Create New Article</h1>
    <form action="process/create.php" method="POST"  enctype="multipart/form-data">
        <p><input type="hidden" name="user_id" value="<?=$_SESSION['user_id'] ?>"></p>
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="content" placeholder="content"></textarea></p>
        <p>
          <input type="file" name="file_upload" id="file_upload">
          <input type="submit" value="Upload Image" name="submit"> 
        </p>
        <p><input type="submit"></p>
    </form>
  </body>
</html>