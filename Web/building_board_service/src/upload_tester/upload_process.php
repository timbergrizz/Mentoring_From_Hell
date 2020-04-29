<?php
$target_dir = "uploads/"; // 파일 업로드 되는 위치
$target_file = $target_dir . basename($_FILES["file_upload"]["name"]); // 파일 업로드되는 경로 + 파일
$upload_checker = 1; // 업로드 유효성 확인용


print_r($_FILES["file_upload"]["name"]);

/*
if($_FILES["file_upload"]["name"] == NULL){
    echo "There is no file to upload";
}

if(file_exists($target_file)){ // 파일명 중복 확인.
    echo "file name is already used.";
    $upload_checker = 0;
}
*/
if ($upload_checker == 0) { // 파일 업로드 유효성 검사 실패. 파일 업로드가 이루어지지 않음
    echo "Sorry, your file was not uploaded.";
} else { // 파일 업로드가 이루어짐.

    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
    
        print("file successfully uploaded");

    } else {
    
        echo "there is an error";
    }
}


?>