<?php 
    unlink("./data/".$_POST['id']);
    header('Location: /~kangjongwook/PHP/our_goal/index.php');
?>