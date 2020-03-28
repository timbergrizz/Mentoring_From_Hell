<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Array</title>
    </head>
    <body>
        <h1>Array</h1>
        <?php
            $books = array('1984', 'Animal Farm', 'George_orwell');
            echo $books[1]."<br>";
            var_dump(count($books));
            array_push($books, "The Road to Wigan Pier");
            echo $books[3]."<br>";
            var_dump($books);
        ?>
    </body>
</html>