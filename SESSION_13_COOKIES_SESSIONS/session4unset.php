<?php
session_start();
if (isset($_SESSION['views'])) {
    echo "Page 4 :: Unsetting session 'views' ...";
    unset($_SESSION['views']);
} else {
    echo "Page 4 :: You need to create a session to delete it after ...";
}
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

</body>

</html>