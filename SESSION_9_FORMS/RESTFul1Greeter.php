<?php
# This is our first basic PHP web service to say hello given a name query parameter!
header("Content-type: text/plain");

$name = empty($_GET["name"]) ? "Never said your name" : $_GET["name"];
echo "Hello $name!";
