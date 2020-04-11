<?php   
    require_once("lib/tester.php");

    $sql = "
    insert into topic
    (title, description, created)
    values (
        '{$_POST['title']}',
        '{$_POST['description']}',
        now()
    )
    ";

    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
        echo "Data Saved <a href=./index.php> return home</a>";
    
    
?>