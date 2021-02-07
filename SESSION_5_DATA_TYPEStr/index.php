<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="color:red;text-align:center;">Sessions 5: Echoing and Strings practice</h1>
    <hr>
    <?php

    $p1 = "<p style=\"color:blue;\">This is a blue paragraph</p>";
    echo $p1;
    $p2 = '<p style="color:red;">This is a red paragraph</p>';
    $apostrophe = 'Tim O\'Reilly';
    echo $p2;
    echo $apostrophe . "<br>";

    echo 'You can also have embedded newlines in
    strings this way as it is
    okay to do' . "<br>";

    echo "Using dollar sign \$p1" . "<br>";
    echo "You deleted C:\\*.*?" . "<br>";
    echo 'This will not expand: \n a newline' . "<br>";
    ?>
    <!--#############################################-->
    <hr>
    <?php
    $a = 2;
    $b = 3;
    function namedFunction($var1, $var2)
    {
        return "$var1 + $var2 = " . $var1 + $var2;
    }
    echo 'Using a named function: ' . namedFunction($a, $b);
    ?>
    <!--#############################################-->
    <hr>
    <?php
    function stringToArray($str)
    {
        $myArray = explode('-', $str);
        print_r($myArray) . "<br>";
        //echo ($myArray) . "<br>";
    }

    echo stringToArray("String-separated-by-semicolon") . "<br>";
    ?>

    <!--#############################################-->
    <hr>
    <?php
    $str = '12345';
    echo "Original $str, reversed string: " . strrev($str) . "<br>";
    ?>
    <!--#############################################-->
    <hr>
    <?php
    /***
     * Write a PHP script that renders html code as text
     */
    $anchor = '<a href="https://www.champlainonline.com/champlainweb/" target="blank">Visit CRH</a>';
    echo $anchor . "<br>";
    echo htmlentities($anchor) . "<br>";

    $p1 = "<p style=\"color:red;\">This is a red paragraph</p>";
    echo $p1;
    echo htmlentities($p1) . "<br>";
    ?>
    <!--#############################################-->
    <hr>
    <?php
    $anony1 = function ($a, $b) {
        echo '+' . $a + $b . '<br>';
    };
    $anony2 = function ($a, $b) {
        echo '-' . abs($a - $b) . '<br>';
    };
    $anony3 = $anony1;

    echo $anony1(1, 2);
    ?>
    <?php
    function callback($myFunction, $param1, $param2)
    {
        $myFunction($param1, $param2);
    }
    callback($anony1, 5, 6);
    callback($anony2, 5, 6);
    callback($anony3, 3, 5);
    $anony3 = $anony2;
    callback($anony3, 3, 5);
    ?>

    <!--#############################################-->
    <hr>
    <?php
    $anony1 = function ($a, $b) {
        echo '+' . $a + $b . '<br>';
    };
    $anony2 = function ($a, $b) {
        echo '-' . abs($a - $b) . '<br>';
    };
    $anony3 = $anony1;

    echo $anony1(1, 2);
    ?>
    <?php
    //arrow functions
    $result = (fn ($a, $b) => $a + $b);
    echo $result(5, 6) . '<br>';

    $result2 = (fn ($a, $b) => $a > $b ? $a : $b);
    echo $result2(5, 6) . '<br>';
    echo $result2(5, 4) . '<br>';
    ?>
</body>

</html>