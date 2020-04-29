<?php
require_once("lib/connect.php");


$return = "<a href=\"login.php\">Sign In</a></p>"; 

if(isset($_SESSION['user_id'])){ //로그인 되어있을때만 작동
  $sql = "select id, nickname from user where id = '{$user_id}'"; //세션으로 알려진 user.id를 통해 user table에서 정보 가져오기
  
  if($user = query_return_arr($conn, $sql)) { // sql 받아온것 확인
    $return = "Hello! ".$user['nickname']."
    <p><a href='process/logout.php'>Sign Out</p>
    <p><a href='create.php'>Create New Article</a></p>
    ";
  }

}

$sql = "select * from article order by id desc";
$html_return = ' ';

$result = mysqli_query($conn, $sql);


while ($result_arr = mysqli_fetch_array($result)){ 

  $article_list = Array(
    'id' => $result_arr['id'],
    'title' => $result_arr['title'],
    'content' => $result_arr['content'],
    'created' => $result_arr['created']
  );
  $html_return .= "<li><a href='view.php?id=".$article_list['id']."'>".$article_list['title']."</a></li>";
  }


?>
<!doctype html>

<html>
  <head>
    <meta charset="utf-8">
    <title>WELCOME</title>
  </head>
  <body>
    <h1>WELCOME</h1>
    <?=$return?>
    <ol>
      <?=$html_return?>
    </ol>
    
    </form>
  </body>
</html>