<!DOCTYPE html>
<html>
<?php
function myToString($array)
{
    $strTmp = implode(", ", $array);
    $strTmp .= ']';
    return '[ ' . $strTmp;
}

?>

<body>
    <h1 style="color:red;text-align:center;">Sessions 7 and 8: Arrays P2</h1>
    <?php//################################?>
    <hr>
    <h1 style="text-align:center;">Some Array Functions</h1>
    <?php
    $age = array("Peter" => "35", "ben" => "37", "Joe" => "43");

    echo 'count(' . myToString($age) . '): ' . count($age) . "<br>";
    echo 'sizeof(' . myToString($age) . '): ' . sizeof($age) . "<br>";

    ?>

    <?php//################################?>
    <hr>
    <?php
    $stack = array("1st", "2nd");
    echo "<h3>Pushing 2 elements -to the <mark>end</mark>- of the array </h3>";

    echo myToString($stack) . '<br>';

    array_push($stack, "3rd", "last");
    echo myToString($stack) . '<br>';

    echo "<h3>Poping the array -the <mark>last</mark> element</h3>";
    echo myToString($stack) . '<br>';
    array_pop($stack);
    echo myToString($stack) . '<br>';
    ?>
    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Chunk an element of the array</h3>";
    $entireArray = range(1, 5);
    print_r($entireArray);
    echo "<br>";
    $aChunk = array_chunk($entireArray, 2);

    print_r($aChunk);
    echo "<br>"
    ?>
    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Deleting an <mark>4th</mark> element of the array</h3>";
    $x = array(1, 2, 3, 4, 5);
    echo myToString($x) . '<br>';
    unset($x[3]);
    echo myToString($x) . '<br>';
    echo '[' . $x[0] . ', ' . $x[1] . ', ' . $x[2] . ', ' . $x[3] . ', ' . $x[4] . ']' . '<br>';


    $x = array_values($x); //returns an array with the values
    echo myToString($x) . '<br>';

    ?>
    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Sorting</h3>";
    echo '<a href="https://www.w3schools.com/php/php_arrays_sort.asp" target="_blank">Sort</a>'
    ?>


    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Inserting -with splice- an array at index 3 of the array</h3>";
    $arrayOri = array('a', 'b', 'c', 'd', 'e');
    echo myToString($arrayOri) . '<br>';
    $arrayInserted = array('1', 2, 3); // not necessarily an array

    array_splice($arrayOri, 3, 0, $arrayInserted); // splice in at index 3 [ a, b, c, 1, 2, 3, d, e]
    // $original is now a b c x d e
    echo myToString($arrayOri) . '<br>';

    echo "<h3>Inserting -with splice- an element at index 1 of the array</h3>";
    $arrayOri = array('1st', '2nd', '3rd');
    echo myToString($arrayOri) . '<br>';
    $arrayInserted = "new"; // not necessarily an array

    array_splice($arrayOri, 1, 0, $arrayInserted); // splice in at index 3 [ a, b, c, 1, 2, 3, d, e]
    // $original is now a b c x d e
    echo myToString($arrayOri) . '<br>';
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>key sequential</h3>";
    $days = array(1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    echo $days[2] . '<br>';
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>key range into array </h3>";
    $numbers = range(2, 5);
    // $numbers = array(2, 3, 4, 5);
    echo myToString($numbers) . '<br>';

    $letters = range('a', 'z');
    // $letters holds the alphabet
    echo myToString($letters) . '<br>';

    $letters_rev = range('Z', 'A');
    echo myToString($letters_rev) . '<br>';

    $reversed_numbers = range(5, 2);
    // $reversed_numbers = array(5, 4, 3, 2);
    echo myToString($reversed_numbers) . '<br>';
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Array slice at 2 till the end</h3>";
    $input = ["red", "green", "blue", "yellow"];
    echo myToString($input) . '<br>';
    $result = array_slice($input, 2);
    echo myToString($result) . '<br>';
    ?>


    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Array splice at 2 till the end</h3>";
    $a = array(1, 2, 3, 4, 5);
    echo myToString($a) . '<br>';
    $b = array_splice($a, 2, 2, "new inserted");

    echo myToString($a) . '<br>';
    echo myToString($b) . '<br>';
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>list()</h3>";
    $my_array = array("Dog", "Cat", "Horse");
    echo myToString($my_array) . '<br>';
    list($a, $b, $c) = $my_array;
    echo "I have several animals, a) $a, b) $b, and c) $c";
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>extract()</h3>";
    $my_array = array("a" => "Cat", "b" => "Dog", "c" => "Horse");
    extract($my_array);
    echo "\$a = $a; \$b = $b; \$c = $c" . '<br>';

    echo "<h3>compact()</h3>";
    $var1 = "Cat";
    $var2 = "Dog";
    $var3 = "Horse";
    $my_array = compact('var1', 'var2', 'var3'); //variable names
    echo myToString($my_array) . '<br>';
    ?>

    <?php//################################?>
    <hr>
    <?php
    echo "<h3>array_walk()</h3>";
    function myfunctionDoubleValue($value, $key)
    {
        echo "The value $value times 2 = " . ($value * 2) . "<br>";
    }
    $a = array("a" => 1, "b" => 2, "c" => 3);
    echo myToString($a) . '<br>';
    array_walk($a, "myfunctionDoubleValue");
    ?>
    <?php//################################?>
    <hr>
    <?php
    echo "<h3>array_reduce()</h3>";
    function recursiveConcat($v1, $v2)
    {
        return $v1 . "-" . $v2;
    }
    $a = array("Dog", "Cat", "Horse");
    echo myToString($a) . '<br>';
    echo array_reduce($a, "recursiveConcat") . '<br>';
    ?>

</body>

</html>