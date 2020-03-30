<?php
file_put_contents("./data/".$_POST['title'], $_POST['description']);

header('Location: /~kangjongwook/PHP/our_goal/index.php?id='.$_POST['title']);
?>