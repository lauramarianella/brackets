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
    $name = $_GET["name"];
    $age = (int)$_GET["age"];
    $dogage = $age * 7;
    echo "Hi {$name}! You are {$age} years old!\n";
    echo "That's {$dogage} in dog years!";
    ?>
</body>

</html>