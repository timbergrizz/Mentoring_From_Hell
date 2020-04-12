<?php
require_once("lib/tester.php");

$query = "select * from topic";
$result = mysqli_query($conn, $query);

$html_return = ' ';

while ($result_arr = mysqli_fetch_array($result)){
  $html_return = $html_return."<li><a href='index.php?id=".$result_arr['id']."'>".htmlspecialchars($result_arr['title'])."</a></li>";
  }

  

$article = array(
  'title' =>'Welcome',
  'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
  'author' => ''
);

if($_GET['id']){
  $id_filtered = mysqli_real_escape_string($conn, $_GET['id']);
  $query = "select * from topic left join author on topic.author_id = author.id where topic.id ={$id_filtered}"; 
  $result = mysqli_query($conn, $query);

  $result_arr = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars( $result_arr['title']);
  $article['desc'] = htmlspecialchars($result_arr['description']);
  $article['author'] = "By ".htmlspecialchars($result_arr['name']);

  $edit_button = '<a href="update.php?id='.$id_filtered.'">edit</a>';
  $delete_button = '<form action="delete_process.php" method="post">
    <input type="hidden" name="id" value="'.$id_filtered.'">
    <input type="submit" value="delete">
  </form>';
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
      <?=$html_return?>
    </ol>
    <p><a href="author.php">author management</a></p>
    <a href="create.php">create</a>
    <?=$edit_button ?>
    <?=$delete_button ?>
    <h2><?=$article['title']?></h2>
    <p><?=$article['desc']?></p>

    <p><?=$article['author']?></p>

  </body>
</html>