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
    <?php
    $id      = (isset($_GET["id"])) ? $_GET["id"] : null;
    $search1 = (isset($_GET["search1"])) ? $_GET["search1"] : null;
    $search2 = (isset($_GET["search2"])) ? $_GET["search2"] : null;

    if (isset($_POST["btnUpdate"])) {
        //$id             = $_POST["id"];
        $name           = $_POST["name"];
        $description    = $_POST["description"];
        $price          = $_POST["price"];
        $file           = isset(($_FILES["image"]['tmp_name'])) ? file_get_contents($_FILES['image']['tmp_name']) : null;
        try {
            $sql = "UPDATE items";

            if (!empty($name) && !empty($description) && !empty($price) && !empty($file)) {
                $sql .= " SET name = :name ,description = :parameter2 ,price = :price ,image = :image";
            }
            /*if (!empty($file)) {
                $sql .= " ,image = :image";
            }*/

            $sql .= " WHERE id = :id";

            $stmt = $connect->prepare($sql);
            if (!empty($name) && !empty($description) && !empty($price)) {
                $stmt->bindParam(':name', $name); //parameter1
                $stmt->bindParam(':parameter2', $description); //parameter2
                $stmt->bindParam(':price', $price); //parameter3
            }
            if (!empty($file)) {
                $stmt->bindParam(':image', $file); //parameter3
            }

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            echo "Record updated successfully.";
            echo "<a href=\"search_1_update.php?search1=$search1&search2=$search2\"><span class=\"text-danger\">Go back</span></a>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        $query = "SELECT * FROM items WHERE id=? ORDER BY id ASC";
        $stmt = $connect->prepare($query);
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        if ($row) {
    ?>
            <div style="border:1px solid #333; background-color:#fbd2d7; border-radius:5px; padding:16px;" align="center">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id ?>&search1=<?php echo $search1 ?>&search2=<?php echo $search2 ?>" enctype="multipart/form-data">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"style="width:200px; height: 200px;"/>'; ?><br />
                    Hidden...<input type=" text" name="id" value="<?php echo $row['id'] ?>" /><br />
                    <input type="text" name="name" value="<?php echo $row["name"]; ?>" /><br />
                    <input type="text" name="description" value="<?php echo $row["description"]; ?>" /><br />
                    <input type="text" name="price" value="<?php echo $row["price"]; ?>" /><br />
                    <input type="file" name="image" /><br />
                    <input type="submit" name="btnUpdate" value="Update" /><br />
                </form>
            </div>
    <?php
        } //End if ($row) {
    } //End if (isset($id)) {
    ?>



    <?php $connect = null; ?>
</body>

</html>