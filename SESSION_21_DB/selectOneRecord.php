<?php include "_dbConnection.php" ?>

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
        $id = 2;
        $query = "SELECT * FROM items WHERE id=? ORDER BY id ASC";
        $stmt = $connect->prepare($query);
        $stmt->execute([$id]);

        //PDO::FETCH_NUM
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        if ($row) {
        ?>
            <div style="border:1px solid #333; background-color:#fbd2d7; border-radius:5px; padding:16px;" align="center">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"style="width:200px; height: 200px;"/>'; ?><br />
                <h4><?php echo $row["name"]; ?></h4>
                <h4><?php echo $row["description"]; ?></h4>
                <h4>$ <?php echo $row["price"]; ?></h4>
            </div>
        <?php
        } //End foreach ($stmt->fetchAll() as $k => $row) {
        $connect = null;
        ?>
    </div>

</body>

</html>