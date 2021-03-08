<?php
$cookie_name = "username";
$cookie_value = "pakita2003";

if (isset($_GET['username'])) {
    $cookie_value = $_GET['username'];
}

$cookie_exp_time = time() + 60 * 60 * 24 * 365;
setcookie($cookie_name, $cookie_value, $cookie_exp_time);

?>

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
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!<br>";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name] . "<br>";
    }
    ?>
</body>

</html>