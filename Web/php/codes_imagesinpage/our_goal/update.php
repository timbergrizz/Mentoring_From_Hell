<?php
    require_once('lib/print.php');
    require('view/top.php');
?>
        <h2>Update - <?= $_GET['id'] ?> </h2>
        
    <p><a href="./create.php">Create</a>
    <?php
    if (isset($_GET['id'])){
        echo '<a href="./update.php?id='.$_GET['id'].'">Edit</a>';
    }
    ?>
    </p>
    <form action="update_process.php" method="post">
        <p><input type="text" name="title" value="<?php print_title() ?>"></p>
        <input type="hidden" name="old_title" value="<?=$_GET['id'] ?>">
        <textarea name="description" cols="30" rows="10" placeholder="description">
<?php
        print_description();
?>
</textarea>
<br>
        <input type="submit">
    </form>
    <?php
    require('view/bottom.php');
    ?>