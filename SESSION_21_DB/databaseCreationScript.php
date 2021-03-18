<?php
$mySqlhost  = "localhost:3306"; //127.0.0.1
$username   = "root";
$password   = "";
/**
 * no this time because we are creating the database  
 * $myDB       = "mystoredb2";
 * */
$charset = "utf8mb4";
$dsn = "mysql:host=$mySqlhost;charset=$charset"; //data source name
try {
    $connect = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "<h1 class=\"text-danger\">Connection failed: </h1>" . "<p>" . $e->getMessage() . "</p>";
    //throw new PDOException($e->getMessage());
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    try {
        //1) drop database in case it exists
        $sql = "DROP DATABASE IF EXISTS mystoredb2";

        $connect->exec($sql);
        echo "Database dropped successfully<br>";

        //1) create database
        $sql = "CREATE DATABASE mystoredb2";

        $connect->exec($sql);
        echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    ?>

    <?php
    $connect = null;
    ?>
</body>

</html>