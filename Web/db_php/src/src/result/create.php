<?php
require_once('lib/tester.php');

$query = "select * from topic";
$result = mysqli_query($conn, $query);

$html_return = ' ';

while ($result_arr = mysqli_fetch_array($result)){
  $html_return = $html_return."<li><a href='index.php?id=".$result_arr['id']."'>".$result_arr['title']."</a></li>";
  }
  

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$html_return ?>
    </ol>
    <a href="create.php">create</a>
    <form action="create_process.php" method="POST">
      <p><input type="text" name="title" placeholder="Title"></p>
      <p><textarea name="description" placeholder="Description"></textarea></p>
      <input type="submit">
    </form>

      </form>
    </body>
</html>