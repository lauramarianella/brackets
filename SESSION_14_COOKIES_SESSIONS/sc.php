<?php
session_start();
$results[0] = array("id" => 1, "name" => "Pakita", "img" => "imgs/Pakita.jpg", "weight" => 35);
$results[1] = array("id" => 2, "name" => "Fedora", "img" => "imgs/Fedora.jpg", "weight" => 5);
$results[2] = array("id" => 3, "name" => "Hopper", "img" => "imgs/Hopper.jpg", "weight" => 6);
?>

<!--Ini: process submitted form-->
<?php
$action = isset($_GET["action"]) ? $_GET["action"] : "";
if ($action === "add") {
    $item = array(
        "item_id"       => $_POST["hidden_id"],
        "item_name"     => $_POST["hidden_name"],
        "item_weight"   => $_POST["hidden_weight"],
        "item_quantity" => $_POST["quantity"],
    );
    if (isset($_SESSION["shopping_cart"])) {
        $ids = array_column($_SESSION["shopping_cart"], "item_id");
        if (in_array($item["item_id"], $ids)) {
            $key = array_search($item["item_id"], $ids);
            $_SESSION["shopping_cart"][$key]["item_quantity"] = $_POST["quantity"];
        } else {
            array_push($_SESSION["shopping_cart"], $item); //new item added to the shopping cart
        }
    } else {
        $_SESSION["shopping_cart"] = array($item); //1st time we set an item in the shopping cart
    }
}

if ($action === "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["item_id"] == $_GET["id"]) {
            unset($_SESSION["shopping_cart"][$keys]);
            echo "<script>window.location='$_SERVER[PHP_SELF]'</script>";
        }
    }
}
?>
<!--Fin: process submitted form-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Ini: show the list of animals-->
    <?php foreach ($results as $row) { ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&id=<?php echo $row["id"] ?>">
            <h4><?php echo $row["id"] ?></h4>
            <h4><?php echo $row["name"] ?></h4>
            <img src="<?php echo $row["img"] ?>" width="200px" height="150px" />
            <h4><?php echo $row["weight"] ?>kg</h4>
            q<input type="text" name="quantity" value="1" />
            id<input type="hidden" name="hidden_id" value="<?php echo $row["id"] ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["name"] ?>" />
            <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"] ?>" />
            <input type="submit" name="add" />
        </form>
    <?php } //end foreach
    ?>
    <!--End: show the list of animals-->

    <!--Ini: show the selected animals-->
    <table>
        <tr>
            <th>Name</th>
            <th>Q</th>
            <th>Weight</th>
            <th>P</th>
            <th>T</th>
        </tr>
        <?php
        if (isset($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                <tr>
                    <td><?php echo isset($values["item_name"]) ? $values["item_name"] : ""; ?></td>
                    <td><?php echo isset($values["item_quantity"]) ? $values["item_quantity"] : ""; ?></td>
                    <td><?php echo isset($values["item_weight"]) ? '$ ' . $values["item_weight"] : ""; ?></td>
                    <td>subtotal</td>
                    <td><?php echo isset($values["item_id"]) ? "<a href=$_SERVER[PHP_SELF]?action=delete&id=$values[item_id]><span class=\"text-danger\">Remove</span></a>" : "" ?></td>
                </tr>
        <?php } //end: foreach
        } //end: if (isset($_SESSION["shopping_cart"])) {
        ?>
    </table>
    <!--Fin: show the selected animals-->
</body>

</html>