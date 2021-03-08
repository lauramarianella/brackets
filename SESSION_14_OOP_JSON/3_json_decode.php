<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //##########################################
    echo '<h1>from JSON to object</h1>';
    $strJsonUser1 = '{"name":"Hopper","color":"#451638"}';
    $obj1 = json_decode($strJsonUser1);
    echo "name: $obj1->name <br/>";
    echo "color: $obj1->color <br/>";
    ?>

    <hr />
    <?php
    //##########################################
    echo '<h1>from JSON to an associative array</h1>';
    $strJsonUser1 = '{"name":"Hopper","color":"#451638"}';
    $assoArray = json_decode($strJsonUser1, true);
    foreach ($assoArray as $key => $value)
        echo "$key: $value <br/>";

    ?>


    <hr />
    <?php
    echo '<h1>from JSON to an array</h1>';
    //##########################################
    $myArray = '[1,"1",{"name":"Hopper","color":"#451638"},[{"name":"Pakita","color":"#000000"},{"name":"Fedora","color":"#ffffff"}]]';
    $obj2 = json_decode($myArray, true);

    echo "$obj2[0] <br/>";
    echo "$obj2[1] <br/>";
    var_dump($obj2[2]);
    echo "<br/>";
    var_dump($obj2[3]);
    echo "<br/>";
    ?>

</body>

</html>