<?php   

    require_once("lib/tester.php");

    settype($_POST['id'], 'integer');
    $filtered =  Array(
        'id' => mysqli_real_escape_string($conn, $_POST['id']),
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile'=> mysqli_real_escape_string($conn, $_POST['profile'])
    );


    $sql = "
    update author
    set
        name = '{$filtered['name']}', 
        profile = '{$filtered['profile']}'
    where id={$filtered['id']}
    ";
    
    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        error_log(mysqli_error($conn));
    }else
    header('Location: author.php');


?>