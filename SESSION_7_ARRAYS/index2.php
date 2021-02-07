<!DOCTYPE html>
<html>

<body>
    <h1 style="color:red;text-align:center;">Sessions 7 and 8: Arrays P2</h1>
    <?php//################################?>
    <hr>
    <h1 style="text-align:center;">Some Array Functions</h1>
    <?php
    $age = array("Peter" => "35", "ben" => "37", "Joe" => "43");

    echo 'count(): ' . count($age) . "<br>";
    echo 'sizeof(): ' . sizeof($age) . "<br>";

    ?>

    <?php//################################?>
    <hr>
    <?php
    $stack = array("1st", "2nd");
    echo "<h3>Pushing 2 elements to the <mark>end</mark> of the array</h3>";
    array_push($stack, "3rd", "last");
    for ($x = 0; $x < sizeof($stack); $x++) {
        echo $stack[$x];
        echo "<br>";
    }
    echo "<h3>Poping the <mark>last</mark> element of the array</h3>";
    array_pop($stack);
    for ($x = 0; $x < sizeof($stack); $x++) {
        echo $stack[$x];
        echo "<br>";
    }
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
    echo "<h3>Deleting an element of the array</h3>";
    $x = array(1, 2, 3, 4, 5);
    unset($x[3]);
    $x = array_values($x);
    echo '';
    for ($i = 0; $i < sizeof($x); $i++) {
        echo $x[$i];
        echo "<br>";
    }
    ?>
    <?php//################################?>
    <hr>
    <?php
    echo "<h3>Sorting</h3>";
    echo '<a href="https://www.w3schools.com/php/php_arrays_sort.asp" target="_blank">Sort</a>'
    ?>



</body>

</html>