<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>function</title>
    </head>
    <body>
        <h1>Function</h1>
        <h2>Basic</h2>
        <?php
            function basic(){
                print("Loremsdcasdczasdcasdc<br>");

                print("Loremsdcasdczasdcasdc<br>");
            }

            basic();
            basic();
            basic();
        ?>
        <h2>Parameter &amp; argument</h2>
        <?php
        function sum($a, $b){
            echo ($a+$b)."<br>";
        }
        sum(2,4);
        sum(4,8);
        ?>
        <h2>return</h2>
        <?php
            function sum2($a, $b){
                return $a+$b;
            }


            print(sum2(1, 2));
        ?>
    </body>
</html>