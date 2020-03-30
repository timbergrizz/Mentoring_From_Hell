<?php
$data = file_get_contents('./data/',$_GET['id'])

?>

<form action="update_process.php" method="post">
    <p><input type="text" value=<?php echo $_GET['id'];?>></p>
    <textarea name="" id="" cols="30" rows="10">
        <?php
        echo $data;
        ?>
    </textarea>
    <input type="submit">
</form>

<?php

?>