<!doctype html>
<html>
    <head>
        <title>George Orwell - Welcome</title>
        <meta charset="utf-8">
    </head>

    <body>
        <h1><a href="index.php">George Orwell</a></h1>
        <ol>
            <?php
                $file_list = scandir('./data'); 
                $counter = 0;
                while($counter < count($file_list)){
                    if($file_list[$counter]!= '.' && $file_list[$counter] != '..'){
                    echo "<li><a href=\"index.php?id=$file_list[$counter]\">$file_list[$counter]</a></li>";
                    }
                    $counter++;
                }
        ?>
    </ol>
        <?php
        
        if(isset($_GET["id"])){

            echo file_get_contents("./data/".$_GET['id']);
        }else {
            echo "Welcome";
        }
        ?>
        </body>
</html>