<?php
$mySqlhost  = "localhost"; //127.0.0.1
$username   = "root";
$password   = "";
$myDB       = "mystoredb2";
$charset = "utf8mb4";
$dsn = "mysql:host=$mySqlhost;dbname=$myDB;charset=$charset"; //data source name
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>

<body>
  <div>
    <h1>Using Driver PDO</h1>
    <h3>List of Products</h3>
    <?php
    /**
     * Prepare vs. Query
     * Prepare precompiles the statement, and can run faster when it is run multiple times.
     * Prepare requires an “execute” statement whereas query does not.
     * Prepare precompiles*/
    //$stmt = $connect->query("SELECT * FROM items ORDER BY id ASC");
    $stmt = $connect->prepare("SELECT * FROM items ORDER BY id ASC");
    $stmt->execute();

    //PDO::FETCH_NUM
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative

    foreach ($stmt->fetchAll() as $k => $row) {
    ?>
      <div style="border:1px solid #333; background-color:#fbd2d7; border-radius:5px; padding:16px;" align="center">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"style="width:200px; height: 200px;"/>'; ?><br />
        <h4><?php echo $row["name"]; ?></h4>
        <h4>$ <?php echo $row["price"]; ?></h4>
      </div>
    <?php
    } //End foreach ($stmt->fetchAll() as $k => $row) {
    $connect = null;
    ?>
  </div>

</body>

</html>