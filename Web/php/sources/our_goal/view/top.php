<?php 
require_once('lib/print.php'); ?>

<!doctype html>
<html>
    <head>
        <title>George Orwell - <?php
        print_title();
        ?></title>
        <meta charset="utf-8">
    </head>

    <body>
        <h1><a href="index.php">George Orwell</a></h1>

        <ol>
        <?php
            print_list();
        ?>
    </ol>