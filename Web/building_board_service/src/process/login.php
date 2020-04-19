<?php 
require_once("../lib/connect.php");


$filtered = array (
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'password' => mysqli_real_escape_string($conn, $_POST['password'])
);


$sql = "select id, password from user where id='{$filtered['id']}'";

if(!($result = query_return_arr($conn, $sql))){
    header('Location: ../login.php?error=id');
    exit();
}else if($filtered['password'] != $result['password']){
    header('Location: ../login.php?error=password');
    exit();

}

    session_start();
    $_SESSION["user_id"] = $filtered['id'];
    header('Location: ../index.php');
?>