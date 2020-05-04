<?php
require_once("lib/connect.php");

$filtered_id = $_GET['id'];
settype($filtered_id, "int");

$sql = "
select title, content, user_id, filename, article.created, nickname from article left join user on article.user_id=user.id
where article.id={$filtered_id}";


$button = '';

if(gettype($filtered_id)=='integer'){
    $result = query_return_arr($conn, $sql);

    $article = Array(
        'title' => htmlspecialchars($result['title']),
        'content' => htmlspecialchars($result['content']),
        'user_id'=> htmlspecialchars($result['user_id']),
        'created' => htmlspecialchars($result['created']),
        'nickname' => htmlspecialchars($result['nickname']),
        'filename' => htmlspecialchars($result['filename'])    
    );


    if($_SESSION['user_id'] == $article['user_id']){
        $button = ' <form action="process/delete.php" method="post">
                    <input type="hidden" name="id" value="'.$filtered_id.'">
                    <a href="update.php?id='.$filtered_id.'">edit</a>
                    <input type="submit" value="delete">
                    </form>';
    }
  }else {
      die( "Wrong Access. <a href='index.php'>Return Home</a>");
  }

        echo("<p><a href='uploads/{$result['filename']}'> Download File </a></p>");

  $sql = "select comment.id, comment.user_id, comment, nickname, comment.created from comment left join user on comment.user_id = user.id where article_id = ".$filtered_id;
  $result_comment = mysqli_query($conn, $sql);
  $comment_table = '';

  while($result_comment_arr = mysqli_fetch_array($result_comment)){
    $comment_filtered = Array(
        'id' => mysqli_real_escape_string($conn, $result_comment_arr['id']),
        'comment'=> htmlspecialchars($result_comment_arr['comment']),
        'user_id'=> htmlspecialchars($result_comment_arr['user_id']),
        'created' => htmlspecialchars($result_comment_arr['created']),
        'nickname' => htmlspecialchars($result_comment_arr['nickname'])    
    );

    $comment_table .= "
        <tr>
            <td>{$comment_filtered['nickname']}</td>
            <td>{$comment_filtered['comment']}</td>
            <td>{$comment_filtered['created']}</td>
        </tr>
    ";


    if($user_id == $comment_filtered['user_id']){
        $comment_table .= "        
    <tr>
        <td><a href='update_comment.php?id={$comment_filtered['id']}'>edit</td>
        <td>
        ".
        '
        <form action="process/delete_comment.php" method="post">
        <input type="hidden" name="comment_id" value="'.$comment_filtered['id'].'">
        <input type="submit" value="delete">
        </form>'
        ."
        </td>

    </tr>
    ";
    }
}

?>


<html>
  <head>
    <meta charset="utf-8">
    <title>WELCOME</title>
  </head>
  <body>
    <h2><?=$article['title'] ?></h2>
    
    <?=$button?>

    <p>
        Writer : <?=$article['nickname']?>(<?=$article['user_id'] ?>)<br>
        Created : <?=$article['created'] ?>
    </p>
    <p>
        <?=$article['content'] ?>
    </p>

    <p><a href="index.php">Return Home</a></p>


    <form action="process/comment_create.php" method="POST">
        <p><input type="hidden" name="article_id" value="<?=$filtered_id?>"></p>
        <p><textarea name="comment" placeholder="comment"></textarea></p>
        <p><input type="submit"></p>
    </form>

    <h4>Comments  </h4>
    <table>
        <?=$comment_table ?>
    </table>
    </body>
</html>