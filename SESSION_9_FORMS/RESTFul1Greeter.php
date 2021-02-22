<?php
# This is our first basic PHP web service to say hello given a name query parameter!
header("Content-type: text/plain");

$name = empty($_GET["name"]) ? "Never said your name" : $_GET["name"];
$lastname = empty($_GET["lastname"]) ? "Never said your name" : $_GET["lastname"];
echo "Hello $name! $lastname";
