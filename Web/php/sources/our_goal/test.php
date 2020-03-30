<?php
    $file_list = scandir('./data');
    var_dump($file_list)

    $counter = 2;
    while($counter < count($file_list)){
        echo "<li>$file_list[$counter]</li>";
        $counter++;
    }
    
?>