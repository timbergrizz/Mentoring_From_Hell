<?php
echo "MySql connection tester<br>";
 
$db = mysqli_connect("db", "root", "rootroot", "building_board");
 
if($db){
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패<br>";
}
 
$result = mysqli_query($db, 'SELECT VERSION() as VERSION');
$data = mysqli_fetch_assoc($result);
echo $data['VERSION'];
?>
