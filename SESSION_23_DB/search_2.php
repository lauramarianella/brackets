<?php
$search1 = isset($_GET["search1"]) ? $_GET["search1"] : null;
$search2 = isset($_GET["search2"]) ? $_GET["search2"] : null;
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
                <h4 class="text-info"><input type="text" name="search1" value="<?php echo $search1 ?>" placeholder="Name..." /></h4>
                <h4 class="text-info"><input type="text" name="search2" value="<?php echo $search2 ?>" placeholder="Description..." /></h4>
                <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Search" />

            </div>
        </form>
    </div>
    <?php if (isset($search1) || isset($search2)) { ?>
        <div>
            <?php
            $sql = "SELECT i.* FROM items i";
            /***************************************************/
            if (!empty($search1) && !empty($search2)) {
                $sql .= " WHERE";
                $sql .= (!empty($search1)) ? " i.name LIKE :parameter1" : "";
                $sql .= (!empty($search2)) ? " AND i.description LIKE :param2" : "";
            } else if (!empty($search1)) {
                $sql .= " WHERE";
                $sql .= (!empty($search1)) ? " i.name LIKE :parameter1" : "";
            } else if (!empty($search2)) {
                $sql .= " WHERE";
                $sql .= (!empty($search2)) ? " i.description LIKE :param2" : "";
            }

            /***************************************************/
            $sql .= " ORDER BY i.id ASC";

            include "_dbConnection.php";
            $stmt = $connect->prepare($sql);

            (!empty($search1)) ? $stmt->bindValue(':parameter1', '%' . $search1 . '%') : '';
            (!empty($search2)) ? $stmt->bindValue(':param2', "%$search2%") : '';

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
            ?>
        </div>

    <?php  }  //end: if (isset($search1) || isset($search2)) { 
    ?>

</body>

</html>