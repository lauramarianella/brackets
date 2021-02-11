<?php
//Move this function to another file, then include that file in this script
function myToString($array)
{
    $strTmp = implode(", ", $array);
    $strTmp .= ']';
    return '[ ' . $strTmp;
}
?>
<!--#########PROBLEMS###########-->
<?php//################################?>
<hr>
<?php
echo "<h3>array_walk()</h3>";

$a = range(0, 10);
echo myToString($a) . '<br>';
?>

<?php//################################?>
<hr>
<?php
echo "<h3>array_reduce()</h3>";
$a = array(5, 20, 10, 15);
echo myToString($a) . '<br>';
?>


<?php//################################?>
<hr>
<?php
echo "<h3>array_reduce()</h3>";
$z = array(1, 2, 3, 4, 5);
echo myToString($z) . '<br>';
?>


<?php//################################?>
<hr>
<?php
echo "<h3>Set Operations</h3>";
$a = [1, 2, 3, 4, 5];
echo 'A=' . myToString($a) . '<br>';
$b = [4, 5, 6, 7, 8];
echo 'B=' . myToString($b) . '<br>';
?>