<?php 
require_once("../lib/connect.php");


$filtered = array (
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'password' => mysqli_real_escape_string($conn, $_POST['password'])
);

$sql = "select id, password from user where id='{$filtered['id']}'";

if(!($result = query_return_arr($conn, $sql))){
    echo "Login Failed. Check your ID.<a href='../login.php'>Return to login page</a>";
    exit();
}else if($filtered['password'] != $result['password']){
    
    echo "Login Failed. Check your password. <a href='../login.php'>Return to login page</a>";
    exit();
    
}

echo "Login Success";


?>