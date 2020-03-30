<?php
    function print_title(){
    if(isset($_GET["id"])){
        echo htmlspecialchars($_GET["id"]);
    }else {
        echo "Welcome";
    }
}
    function print_description(){
        if(isset($_GET["id"])){
            $baseNam = basename($_GET['id']);
            echo htmlspecialchars(file_get_contents("./data/".$baseNam));
        }else {
            echo "Hello World!";
        }
    }
    function print_list(){
        $file_list = scandir('./data'); 
        $counter = 0;
        while($counter < count($file_list)){
            $file_list_secured = htmlspecialchars($file_list[$counter]);
            if($file_list[$counter]!= '.' && $file_list[$counter] != '..'){
            echo "<li><a href=\"index.php?id=".$file_list_secured."\">".$file_list_secured."</a></li>";
            }
            $counter++;
        }
    }
?>