<?php
require_once("../lib/connect.php");


$filtered = Array(
    "user_id" => mysqli_real_escape_string($conn, $_POST["user_id"]),
    "title" => mysqli_real_escape_string($conn, $_POST["title"]),
    "content" => mysqli_real_escape_string($conn, $_POST["content"])
);


if($_FILES["file_upload"]['size']!=0){ // 파일 존재시에만 작동
    $target_dir = "../uploads/"; // 파일 업로드 되는 위치
    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]); // 파일 업로드되는 경로 + 파일
    $upload_checker = 1; // 업로드 유효성 확인용

    echo $target_file;
    die();

    
    if(file_exists($target_file)){ // 파일명 중복 확인.
        echo "file name is already used.\n";
        die();
        $upload_checker = 0;
    
    }
    if ($upload_checker == 0) { // 파일 업로드 유효성 검사 실패. 파일 업로드가 이루어지지 않음
        echo "Sorry, your file was not uploaded.";
        die();
    } else { // 파일 업로드가 이루어짐.
    
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            $filtered_file = Array(
                "filename" => mysqli_real_escape_string($conn, $_FILES["file_upload"]["name"]),
                "filesize" => mysqli_real_escape_string($conn, $_FILES["file_upload"]["size"])
            );
        } else {
            echo "there is an error";
            die();
        }
    }
}

var_dump($filtered_file);
die();

$sql = "
insert into article
(title, content, user_id)
values (
    '{$filtered['title']}',
    '{$filtered['content']}',
    '{$filtered['user_id']}',
    '{$filtered_file['filename']}',
    '{$filtered_file['filesize']}'
)
";

    
if(!mysqli_query($conn, $sql)){
    echo "There was a problem with saving data. Ask for administrator.";
    print(mysqli_error($conn));
}else
    header('Location: ../index.php');


?>