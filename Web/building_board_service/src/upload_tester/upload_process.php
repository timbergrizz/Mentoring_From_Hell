<?php
$target_dir = "uploads/"; // 파일 업로드 되는 위치
$target_flie = $target_dir . basename($_FILES["file_upload"]["name"]); // 파일 업로드되는 경로 + 파일
$upload_checker = 1; // 업로드 유효성 확인용


print_r($_FILES["file_upload"]);
die();// 어떤 형식으로 넘어오는지 우선 확인하기 위해 사용


if(file_exists($target_flie)){ // 파일명 중복 확인.
    echo "file name is already used.";
    $upload_checker = 0;
}

if ($uploadOk == 0) { // 파일 업로드 유효성 검사 실패. 파일 업로드가 이루어지지 않음
    echo "Sorry, your file was not uploaded.";
} else { // 파일 업로드가 이루어짐.
    if (move_uploaded_file($_FILES["file_uplaod"]["tmp_name"], $target_file)) {
    print("file successfully uploaded");

    } else {
        echo error_clear_last();
        
    }
}


?>