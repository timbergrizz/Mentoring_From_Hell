<?php   
    require_once("lib/tester.php");

    $id_filtered = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "delete from topic where author_id = ".$id_filtered;
    
    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with removing data. Ask for administrator.";
        print(mysqli_error($conn));
    }
    $sql = "delete from author where id = ".$id_filtered;
    
    if(!mysqli_query($conn, $sql)){
        echo "There was a problem with removing data. Ask for administrator.";
        print(mysqli_error($conn));
    }else
        header('Location: author.php');

    
?>