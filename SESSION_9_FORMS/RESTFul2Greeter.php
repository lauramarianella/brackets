<?php
class Person
{
    // Properties
    public $name;
    public $age;
    public $city;
    public $cc;
}
# This is our first basic PHP web service to say hello given a name query parameter!
header('Content-Type: application/json');


$name = empty($_GET["name"]) ? "Provide your name" : $_GET["name"];

$cc = empty($_POST["cc"]) ? "" : $_POST["cc"];

$method = $_SERVER['REQUEST_METHOD'];

$myObj = new Person();
$myObj->name = $name;
$myObj->age = 30;
$myObj->city = "New York";
$myObj->cc = $cc;

$arrResponse = array($method, 'The name is wrong', $myObj);
$myJSON = json_encode($arrResponse); //$myJSON = json_encode($myObj);

echo $myJSON;
