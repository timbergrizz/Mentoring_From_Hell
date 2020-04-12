<?php   
    require_once("lib/tester.php");


    $filtered = Array (
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'desc' => mysqli_real_escape_string($conn, $_POST['description']), 
        'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
    );
    
    $sql = "
    insert into topic
    (title, description, created, author_id)
    values (
        '{$filtered['title']}',
        '{$filtered['desc']}',
        now(),
        '{$filtered['author_id']}'
    )
    ";

    
    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
        echo "Data Successfully Saved <a href=./index.php> return home</a>";
    
    
?>