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
    if (!isset($_POST["btnInsert"])) {
    ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <input type="text" name="name" value="New Product cat" /><br />
            <input type="text" name="description" value="Description: inserting image" /><br />
            <input type="text" name="price" value="500" /><br />
            <input type="file" name="image" />
            <input type="submit" name="btnInsert" value="Insert" /><br />
        </form>
    <?php
    } else {

        $name           = isset($_POST["name"]) ? $_POST["name"] : null;
        $description    = isset($_POST["description"]) ? $_POST["description"] : null;
        $price          = isset($_POST["price"]) ? $_POST["price"] : null;
        $file           = isset($_FILES["image"]) ? file_get_contents($_FILES['image']['tmp_name']) : null;
        //echo $_FILES['image']["size"] . '<br/>';
        //https://www.w3schools.com/php/php_file_upload.asp
        // Check file size
        if ($_FILES['image']["size"] > 976563) {
            echo $_FILES['image']["size"] . '<br/>';
            echo "Sorry, your file is too large.<br/>";
        } else {
            include '_dbConnection.php';
            try {
                $sql = "INSERT INTO items(name, description, price, image) VALUES (:name, :description, :price, :image)";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':image', $file);
                $stmt->execute();

                $last_id = $connect->lastInsertId();
                echo "New record created successfully. Last inserted ID is: " . $last_id;
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $connect = null;
        }
    }
    ?>
</body>

</html>