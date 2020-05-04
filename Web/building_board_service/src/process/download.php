<?php
require_once("../lib/connect.php");

$filename = $_GET["filename"];                      
$file_dir = "../uploads/".$filename;  

echo($file_dir);
die();

header('Content-Type: application/x-octetstream');
header('Content-Length: '.filesize($file_dir));
header('Content-Disposition: attachment; filename='.$reail_filename);
header('Content-Transfer-Encoding: binary');

$fp = fopen($file_dir, "r");
fpassthru($fp);
fclose($fp);

?>
