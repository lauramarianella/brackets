<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>JavaScript Object Notation (JSON)</h1>
    <hr />
    <?php
    echo '<h1>JSON of objects</h1>';
    class User
    {
        //properties
        public $name;
        public $color;

        function __construct($name, $color)
        {
            $this->name = $name;
            $this->color = $color;
        }
    }
    $user1 = new User('Hopper', '#451638');
    $user2 = new User('Pakita', '#000000');
    $user3 = new User('Fedora', '#ffffff');

    $myJSON = json_encode($user1);
    echo $myJSON . '<br>';

    echo json_encode($user2) . '<br>';

    echo json_encode($user3) . '<br>';
    ?>
    <hr />
    <?php
    echo '<h1>JSON: of an array</h1>';
    //##########################################
    $array = array(1, '1', $user1, array($user2, $user3));
    echo json_encode($array);
    ?>

</body>

</html>