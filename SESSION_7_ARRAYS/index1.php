<!DOCTYPE html>
<html>

<body>
    <h1 style="color:red;text-align:center;">Sessions 7 and 8: Arrays P1</h1>
    <hr>
    <h1>Indexed Arrays</h1>
    <?php
    $cars = array("Volvo", "BMW", "Toyota");

    echo "<h3>Traverse for loop</h3>";
    for ($x = 0; $x < sizeof($cars); $x++) {
        echo $cars[$x];
        echo "<br>";
    }

    ?>

    <?php//################################?>
    <hr>
    <h1>Associative Arrays</h1>
    <?php
    $age = array("Peter" => "35", "ben" => "37", "Joe" => "43");

    echo "<h3>Traverse foreach loop index=>value</h3>";
    foreach ($age as $x => $x_value) {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "<br>";
    }
    ?>

    <?php//################################?>
    <hr>
    <h1>Associative Arrays without key </h1>
    <?php
    $age = array("Peter" => "35", "ben" => "37", "Joe" => "43");

    echo "<h3>Traverse foreach loop index=>value</h3>";
    foreach ($age as  $x_value) {
        echo "Key=" .  ", Value=" . $x_value;
        echo "<br>";
    }
    ?>
    <?php//################################?>
    <hr>
    <h1>Multidimensional Arrays, internal arrays can have different length</h1>
    <?php
    $cars = array(
        array("Volvo"),
        array("BMW", 15, 13),
        array(5, 2),
        array("Land Rover", 17, 15)
    );

    echo $cars[0][0] . "<br>";
    echo $cars[1][2] . "<br>";
    echo $cars[2][0] . "<br>";
    echo $cars[3][1] . "<br>";

    ?>

    <?php//################################?>
    <hr>
    <h1>Traversing Multidimensional Arrays</h1>
    <?php
    $cars = array(
        array("Volvo", 22, 18),
        array("BMW", 15, 13),
        array("Saab", 5, 2),
        array("Land Rover", 17, 15)
    );
    echo "<h3>Traversing double for loop </h3>";
    for ($row = 0; $row < count($cars); $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < sizeof($cars[$row]); $col++) {
            echo "<li>" . $cars[$row][$col] . "</li>";
        }
        echo "</ul>";
    }
    ?>

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
</body>

</html>