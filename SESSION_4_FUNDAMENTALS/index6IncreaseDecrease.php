<?php
$a = 5;
$b = 10;

$c = $a + $b++;//15

echo $a;
echo $b;//11
echo $c;
echo $a, $b, $c;
?>
<html>
    <head>
        
    </head>
    <body>
        <h1>a is: <?php echo $a;?></h1>
        <h2>b is: <?php echo $b;//11?></h2>
        <h3>c is: <?php echo $c;?></h3>
        <h3>abc is: <?php echo $a, $b, $c; ?></h3>
    </body>
</html>