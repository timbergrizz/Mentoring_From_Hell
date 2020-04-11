<?php
require("result/lib/tester.php");

$query =  "
INSERT INTO topic (
    title,
    description,
    created
) VALUES (
    'MySQL',
    'MySQL is ....',
    NOW()
);";


if(!mysqli_query($conn, $query)){
    echo mysqli_error($conn);
}

?>