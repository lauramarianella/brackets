<?php

class Item
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $img;

    function __construct($id, $n, $d, $p, $i)
    {
        $this->id           = $id;
        $this->name         = $n;
        $this->description  = $d;
        $this->price        = $p;
        $this->img          = base64_encode($i);
    }
}

$arrResponse = array();
$arrItems = array();

$arrResponse[0] = false;
$arrResponse[1] = 'Error, try again later';
$arrResponse[2] = [];

include "_dbConnection.php";
if (isset($connect)) {
    $sql = "SELECT i.* FROM items i ORDER BY i.id ASC";
    $stmt = $connect->prepare($sql);
    $stmt->execute();

    try {

        if (true) { //this is wrong, it is just for demonstration purpose
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative

            foreach ($stmt->fetchAll() as $k => $row) {
                $item = new Item($row["id"], $row['name'], $row["description"], $row["price"], $row["image"]);
                array_push($arrItems, $item);
            }
        } else {

            $stmt->setFetchMode(PDO::FETCH_NUM);

            foreach ($stmt->fetchAll() as $k => $row) {
                $item = new Item($row[0], $row[1], $row[2], $row[4], $row[3]);
                array_push($arrItems, $item);
            }
        }

        $connect = null;

        $arrResponse[0] = true;
        $arrResponse[1] = '';
        $arrResponse[2] = $arrItems;
    } catch (PDOException $e) {
        $error = "Connection failed: " . $e->getMessage();

        $arrResponse[0] = false;
        $arrResponse[1] = 'Error, try again later';
        $arrResponse[2] = [];
    }
}

header('Content-Type: application/json');

$myJSON = json_encode($arrResponse);

echo $myJSON;
