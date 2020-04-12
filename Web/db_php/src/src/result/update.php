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
  'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit'
);


$edit_button = '';

if($_GET['id']){
    $id_filtered = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "select * from topic where id ={$id_filtered} "; 
    $result = mysqli_query($conn, $query);

    $result_arr = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars( $result_arr['title']);
    $article['desc'] = htmlspecialchars($result_arr['description']);


    $edit_button = '<a href="update.php?id='.$_GET['id'].'">edit</a>';
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
    <form action="update_process.php" method="POST">
        <input type="hidden" name='id' value="<?=$id_filtered ?>">
        <p><input type="text" name="title" value="<?=$article['title'] ?>"></p>
        <p><textarea name="description" placeholder="Description"><?=$article['desc'] ?></textarea></p>
        <input type="submit">
    </form>

      </form>
    </body>
</html>