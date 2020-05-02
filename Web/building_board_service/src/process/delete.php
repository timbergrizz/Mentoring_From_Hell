<?php
require_once("../lib/connect.php");

    $filtered_id = $_POST['id'];
    settype($filtered_id, "int");

    $sql = "select user_id from article where id = ".$filtered_id;
    $result = query_return_arr($conn, $sql);
    
    if($_SESSION['user_id'] != $result['user_id']){
        die("Access Denied. <a href='index.php'>Return Home</a>");
    }else{
        $sql = "delete from article where id=".$filtered_id;
        mysqli_query($conn, $sql);
        header('Location: ../index.php');
    }
?>