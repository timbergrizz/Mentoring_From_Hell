<?php   

    require_once("../lib/connect.php");

    settype($_POST['id'], 'integer');
    $filtered =  Array(
        'comment' => mysqli_real_escape_string($conn, $_POST['comment']),
        'id'=> $_POST['id']
    );
    

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