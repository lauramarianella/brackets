<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mySqlhost  = "localhost:3306"; //127.0.0.1
$username   = "root";
$password   = "";
$myDB       = "mystoredb2";

$connect = mysqli_connect($mySqlhost, $username, $password, $myDB);
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
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
    <h1>Using Driver MySQLi</h1>
    <h3>List of Products</h3>
    <?php
    $query = "SELECT * FROM items ORDER BY id ASC";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) { //()mysqli_fetch_array
    ?>
        <div style="border:1px solid #333; background-color:#ffff00; border-radius:5px; padding:16px;" align="center">
          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"style="width:200px; height: 200px;"/>'; ?><br />
          <h4><?php echo $row["name"]; ?></h4>
          <h4><?php echo $row["description"]; ?></h4>
          <h4>$ <?php echo $row["price"]; ?></h4>
        </div>
    <?php
      } //End while ($row = mysqli_fetch_assoc($result)) {
    } //End if (mysqli_num_rows($result) > 0) {
    mysqli_close($connect);
    ?>
  </div>

</body>

</html>