<?php


$host = 'localhost'; // service name from docker-compose.yml
$user = 'root';
$password = 'rootroot';
$db = 'building_board';
$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
  echo 'connection failed';
  }
  
function query_return_arr($conn, $sql){

    $result = mysqli_query($conn, $sql);
    $result_arr = mysqli_fetch_array($result);

    return $result_arr;
}

session_start();

function authentication($filtered_id, $conn){
  $sql = "select user_id from article where id = ".$filtered_id;
  $result = query_return_arr($conn, $sql);

  
  if($_SESSION['user_id'] != $result['user_id']){
      die("Access Denied. <a href='index.php'>Return Home</a>");
  }

}

?>
