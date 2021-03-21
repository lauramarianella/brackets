<?php
$search1 = isset($_GET["search1"]) ? $_GET["search1"] : null;
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
    <div class="col-md-4">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                <h4 class="text-info">Search...</h4>
                <h4 class="text-info"><input type="text" name="search1" value="" placeholder="Name..." /></h4>

                <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Search" />

            </div>
        </form>
    </div>
    <?php if (isset($search1)) { ?>
        <div>
            <?php
            if (!empty($search1)) {
                include "_dbConnection.php";
                $sql = "SELECT i.* FROM items i WHERE i.name LIKE :parameter ORDER BY i.id ASC";
                $stmt = $connect->prepare($sql);

                $stmt->bindValue(':parameter', '%' . $search1 . '%'); //NOTE IT IS NOT bindParam function

                $stmt->execute();

                //PDO::FETCH_NUM
                $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative

                echo "<h1>Using Driver PDO</h1>";
                echo "<h3>List of Products</h3>";
                foreach ($stmt->fetchAll() as $k => $row) {
            ?>
                    <div style="border:1px solid #333; background-color:#fbd2d7; border-radius:5px; padding:16px;" align="center">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"style="width:200px; height: 200px;"/>'; ?><br />
                        <h4><?php echo $row["id"]; ?></h4>
                        <h4><?php echo $row["name"]; ?></h4>
                        <h4><?php echo $row["description"]; ?></h4>
                        <h4>$ <?php echo $row["price"]; ?></h4>
                    </div>
            <?php
                } //End foreach ($stmt->fetchAll() as $k => $row) {
                $connect = null;
            } //end if (!(is_null($name)) { 
            ?>
        </div>

    <?php  }  //end: if (isset($search1)) {
    ?>

</body>

</html>