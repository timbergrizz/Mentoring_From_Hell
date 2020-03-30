<?php
    require('view/top.php');
    ?>

    <h2><?php
        print_title();
        ?>
        </h2>
    <p><a href="./create.php">Create</a>
    <?php
    if (isset($_GET['id'])){
    
    ?>
    <a href="./update.php?id=<?=$_GET['id']?>">Edit</a> 
    <form action="./delete_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" value="delete">
    </form>
    <?php }?>
    </p>
        <?php
        print_description()
        ?>

    <?php
    require('view/bottom.php');
    ?>