<?php
    require('view/top.php');
    ?>

    <h2>
            Create
        </h2>
    <p><a href="./create.php">Create</a></p>
        <form action="create_process.php" method="post">
            <p><input type="text" name="title" placeholder="Title"></p>
            <p><textarea name="description" placeholder="Description"></textarea></p>
            <input type="submit">
        </form>

    <?php
    require('view/bottom.php');
    ?>