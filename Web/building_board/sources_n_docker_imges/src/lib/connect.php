<?php


$host = 'db'; // service name from docker-compose.yml
$user = 'root';
$password = 'root';
$db = 'building_board';
$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
  echo 'connection failed' . $conn -> connect_error;
  }
  
function query_return_arr($conn, $sql){

    $result = mysqli_query($conn, $sql);
    $result_arr = mysqli_fetch_array($result);

    return $result_arr;
}
?>
