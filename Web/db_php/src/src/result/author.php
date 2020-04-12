<?php
require_once("lib/tester.php");

$query = "select * from author";
$result = mysqli_query($conn, $query);

$table_return = "";
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    
    <a href="index.php">topics</a>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>profile</td>
            <td></td>
            <td></td>
        </tr><?php

    while($result_arr = mysqli_fetch_array($result)){
    $filtered = Array (
        'id' => htmlspecialchars($result_arr['id']),
        'name' => htmlspecialchars($result_arr['name']),
        'profile' => htmlspecialchars($result_arr['profile'])
        
    );

    ?>
    <tr>
        <td><?=$filtered['id']?></td>
        <td><?=$filtered['name']?></td>
        <td><?=$filtered['profile']?></td>
        <td><a href='author.php?id=<?=$filtered['id']?>'>update</a></td>
        <td>


<form action = 'delete_author_process.php' method='post' onsubmit="if(!confirm('Are You Sure?')) {return false;}">
        <input type='hidden' name='id' value='<?=$filtered['id']?>'>
        <input type='submit' value='remove'>
        </form>
        <td>    
    </tr>
    <?php
    }
?>
    </table>


    <?php

    $author_mode = "Create Author";
    $action = 'create_author_process.php';
    $placeholder = Array (
        'name' => "name",
        'profile' => 'profile'
    );
    $id_send = "";

    $value = Array(
        'name' => '',
        'profile' =>''
    );
    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "select * from author where id = ".$filtered_id;
    
        $result = mysqli_query($conn, $query);
        $result_arr = mysqli_fetch_array($result);

        $author_mode = "Update Author";
        $action = "update_author_process.php";
        $value['name']=htmlspecialchars($result_arr['name']);
        $value['profile'] = htmlspecialchars($result_arr['profile']);

        $id_send = '<input type="hidden" name="id" value="'.$filtered_id.'">';
    }

    
    ?>
    <h3><?=$author_mode ?></h3>

    <form action="<?=$action ?>" method="POST">
        <?=$id_send ?>
        <p><input type="text" name="name" value="<?=$value['name'] ?>"></p>
        <p><textarea name="profile"><?=$value['profile'] ?></textarea></p>
        <p><input type="submit" value="<?=$author_mode ?>"></p>';
    </form>
  </body>
</html>