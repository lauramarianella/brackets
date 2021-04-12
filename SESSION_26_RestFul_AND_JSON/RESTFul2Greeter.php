<?php
# This is our first basic PHP web service to say hello given a name query parameter!
header('Content-Type: application/json');


$name = empty($_GET["name"]) ? "Provide your name" : $_GET["name"];

$cc = empty($_POST["cc"]) ? "" : $_POST["cc"];

$method = $_SERVER['REQUEST_METHOD'];

$arrResponse = array($method, "The name is $name", $cc);
$myJSON = json_encode($arrResponse);

echo $myJSON;
