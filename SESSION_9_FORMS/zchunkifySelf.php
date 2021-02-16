<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $word = isset($_POST["word"]) ? $_POST["word"] : null;
    $number = isset($_POST["number"]) ? $_POST["number"] : null;
    if ((is_null($word) && is_null($number))) { ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            Enter a word: <input type="text" name="word" required /> <br /><br />
            How long should the chunks be?
            <input type="text" name="number" required /> <br /><br />
            <input type="submit" value="Chunkify" />
        </form>

    <?php } else {
        $chunks = ceil(strlen($word) / $number);
        echo "Chunks: $chunks <br />";
        echo "The {$number}-letter chunks of '{$word}' are: <br />\n";
        for ($i = 0; $i
            < $chunks; $i++) {
            $chunk = substr($word, $i * $number, $number);
            printf("%d: %s<br />", $i + 1, $chunk);
        }
    } ?>
</body>

</html>