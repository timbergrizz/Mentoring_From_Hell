<?php   

    require_once("lib/tester.php");

    settype($_POST['id'], 'integer');
    $filtered =  Array(
        'id' => mysqli_real_escape_string($conn, $_POST['id']),
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'desc'=> mysqli_real_escape_string($conn, $_POST['description'])
    );
    

    $sql = "
    update topic
    set
        title= '{$filtered['title']}', 
        description = '{$filtered['desc']}'
    where id={$filtered['id']}
    ";
    
    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
        echo "Data Successfully Saved <a href=./index.php> return home</a>";

?>