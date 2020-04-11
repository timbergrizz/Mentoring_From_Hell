<?php


$host = 'db'; // service name from docker-compose.yml
$user = 'root';
$password = 'root';
$db = 'opentutorials';
$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
  echo 'connection failed' . $conn -> connect_error;
  }

?>
