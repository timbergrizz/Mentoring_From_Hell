<?php
require_once("../lib/connect.php");

$filename = $_GET["filename"];                      
$file_dir = "../uploads/".$filename;  

header('Content-Type: application/x-octetstream');
header('Content-Length: '.filesize($file_dir));
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');



if(file_exists($filename)){
    $fp = fopen($file_dir, "r");
    fpassthru($fp);
    fclose($fp);
}

?>
