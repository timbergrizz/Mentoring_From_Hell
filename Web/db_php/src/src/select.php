<?php
require_once("result/lib/tester.php");

$query = "select * from topic where id=7"; // For single row
$result = mysqli_query($conn, $query);

$result_arr = mysqli_fetch_array($result);

echo "<h1>".$result_arr['title']."</h1>";
echo "<p>".$result_arr['description']."</p>";


$query = "select * from topic"; // For multi row
$result = mysqli_query($conn, $query);

while ($result_arr = mysqli_fetch_array($result)){

    echo "<h1>".$result_arr['title']."</h1>";
    echo "<p>".$result_arr['description']."</p>";
}

?>