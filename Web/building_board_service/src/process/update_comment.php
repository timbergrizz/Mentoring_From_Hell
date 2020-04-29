<?php   

    require_once("../lib/connect.php");

    settype($_POST['id'], 'integer');
    $filtered =  Array(
        'comment' => mysqli_real_escape_string($conn, $_POST['comment']),
        'id'=> $_POST['id']
    );
    
    if($_FILES["name"] != NULL){ // 파일 존재시에만 작동
        $target_dir = "uploads/"; // 파일 업로드 되는 위치
        $target_file = $target_dir . basename($_FILES["file_upload"]["name"]); // 파일 업로드되는 경로 + 파일
        $upload_checker = 1; // 업로드 유효성 확인용

        if(file_exists($target_file)){ // 파일명 중복 확인.
            echo "file name is already used.";
            $upload_checker = 0;
        
        }
        if ($upload_checker == 0) { // 파일 업로드 유효성 검사 실패. 파일 업로드가 이루어지지 않음
            echo "Sorry, your file was not uploaded.";
        } else { // 파일 업로드가 이루어짐.
        
            if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
            
                print("file successfully uploaded");
        
            } else {
            
                echo "there is an error";
            }
        }
    }

    $sql = "
    update comment
    set
        comment = '{$filtered['comment']}'
    where id={$filtered['id']}
    ";

    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
    {
        $redirection_link = "Location: ../view.php?id=".$_POST['article_id'];
        header($redirection_link);
    }

?>