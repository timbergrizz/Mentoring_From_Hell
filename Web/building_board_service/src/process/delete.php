<?php
require_once("../lib/connect.php");

    $filtered_id = $_POST['id'];
    settype($filtered_id, "int");

    

    authentication($filtered['id'], $conn);
    
    $sql = "delete from article where id=".$filtered_id;
    mysqli_query($conn, $sql);
    header('Location: ../index.php');

?>