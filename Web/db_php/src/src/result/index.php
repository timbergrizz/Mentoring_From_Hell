<?php
require_once("lib/tester.php");

$query = "select * from topic";
$result = mysqli_query($conn, $query);

$html_return = ' ';

while ($result_arr = mysqli_fetch_array($result)){
  $html_return = $html_return."<li><a href='index.php?id=".$result_arr['id']."'>".$result_arr['title']."</a></li>";
  }

  

$article = array(
  'title' =>'Welcome',
  'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit'
);
if($_GET['id']){

  $query = "select * from topic where id ={$_GET['id']} "; 
  $result = mysqli_query($conn, $query);

  $result_arr = mysqli_fetch_array($result);
  $article['title'] = $result_arr['title'];
  $article['desc'] = $result_arr['description'];
  
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
    <a href="create.php">create</a>
    <h2><?=$article['title']?></h2>
    <?=$article['desc']?>
  </body>
</html>