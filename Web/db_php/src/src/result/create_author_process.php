<?php   
    require_once("lib/tester.php");


    $filtered = Array (
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
    );
    
    $sql = "
    INSERT INTO author
    (name, profile)
    VALUES (
        '{$filtered['name']}',
        '{$filtered['profile']}'
    )
    ";

    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with saving data. Ask for administrator.";
        echo(mysqli_error($conn));
    }else
    header('Location: author.php');
?>