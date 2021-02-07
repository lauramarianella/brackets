<?php

$result="";
$a=5;
$b="5";

if($a==$b){
    $result = "int 5 is equals to String '5'";
}else{
    $result = "int 5 is NOT equals to String '5'";
}
echo $result . '<br>';


if($a===$b){
    $result = "int 5 is identical to String '5'";
}else{
    $result = "int 5 is NOT identical(value and type) to String '5'";
}
echo $result;
?>