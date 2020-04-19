<?php 
require_once("../lib/connect.php");

$filtered = array (
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
    'nickname' => mysqli_real_escape_string($conn, $_POST['nickname'])
);

$sql = "select id from user where id='{$filtered['id']}'";

if($_POST['id']==null){
    echo "Enter ID";
    exit();
}else if($_POST['password']==null){
    echo "Enter Password";
    exit();
}else if($_POST['nickname']==null){
    echo "Enter Nickname";
    exit();
}

if($result = query_return_arr($conn, $sql)){
    die("The ID you wrote is already used. Please use another ID");
}



$sql = "
insert into user (id, password, nickname)
values ('{$filtered['id']}', '{$filtered['password']}', '{$filtered['nickname']}')
";


if(!mysqli_query($conn, $sql)){
    echo "There was a problem with saving data. Ask for administrator.";
    error_log(mysqli_error($conn));
}else
    echo "Sign Up Success. <a href=../login.php> return home</a>";

?>