<!DOCTYPE html>
<html>

<body>

    <?php
    $a = 10;
    $b = 2;
    $myVar = ($b > 0) ? $a / $b : 0;
    echo $myVar;
    echo ("<br>");
    ?>
    <?php
    $a = 9;
    $b = 3;
    $c = 0;
    ($b > 0) ? $c = $a / $b : $c = 0;
    echo $c;
    echo ("<br>");
    ?>
    <?php
    function myFunctionWhenTrue()
    {
        echo 'It is true';
    }

    function myFunctionWhenFalse()
    {
        echo 'It is false';
    }
    $b = 0;
    ($b > 0) ? myFunctionWhenTrue() : myFunctionWhenFalse();
    echo ("<br>");
    ?>

    <?php
    $a = 10;
    $b = 0;
    $c = 5;
    $myVar = ($b > 0) ? $a / $b : (($c > 0) ? $a / $c : 0);
    echo $myVar;
    echo ("<br>");
    ?>

</body>

</html>