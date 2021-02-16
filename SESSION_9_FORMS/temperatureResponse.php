<!– Using the GET method -->
    <html>

    <head>
        <title>Temperature Conversion</title>
    </head>

    <body>
        <?php $fahr =  $_GET['fahrenheit'];
        if (!is_null($fahr)) {
            $celsius = ($fahr - 32) * 5 / 9;
            printf("%.2fF is %.2fC", $fahr, $celsius);
        }
        ?>
    </body>

    </html>