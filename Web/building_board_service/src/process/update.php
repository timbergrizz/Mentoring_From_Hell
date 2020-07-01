<?php   

    require_once("../lib/connect.php");

    settype($_POST['id'], 'integer');
    $filtered =  Array(
        'id' => mysqli_real_escape_string($conn, $_POST['id']),
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'content'=> mysqli_real_escape_string($conn, $_POST['content'])
    );
    
    authentication($filtered['id'], $conn);

    $sql = "
    update article
    set
        title= '{$filtered['title']}', 
        content = '{$filtered['content']}'
    where id={$filtered['id']}
    ";

    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
    {
        $redirection_link = "Location: ../view.php?id=".$filtered['id'];
        header($redirection_link);
    }

?>