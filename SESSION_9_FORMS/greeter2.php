<?php
class Person
{
    // Properties
    public $name;
    public $age;
    public $city;
}
# This is our first basic PHP web service to say hello given a name query parameter!
header('Content-Type: application/json');


$name = empty($_GET["name"]) ? "Provide your name" : $_GET["name"];

$myObj = new Person();
$myObj->name = $name;
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
