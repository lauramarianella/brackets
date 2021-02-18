<?php include 'formHeader.php' ?>

<body>
    <div class="content">
        <?php

        $name = $_GET['name'];
        if (is_null($name)) {
            echo "bye";
            die("Bye bye");
        }

        ?>
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title">Personal Data Submitted</h5>
            </div>
            <div class="card-body">

                <p class="card-text">
                    <?php
                    echo isset($_GET["name"]) ? "<p>Name: " . $_GET["name"] . "</p>" : "";
                    echo isset($_GET["lastName"]) ? "<p>Last Name: " . $_GET["lastName"] . "</p>" : "";
                    echo isset($_GET["dob"]) ? "<p>DoB: " . $_GET["dob"] . "</p>" : "";
                    echo isset($_GET["submit"]) ? "<p>Submit: " . $_GET["submit"] . "</p>" : "";
                    ?>
                </p>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>

        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Preferences</h5>
                <p class="card-text">
                    <?php
                    echo isset($_GET["number1"]) ? "<p>Number1: " . $_GET["number1"] . "</p>" : "";
                    echo isset($_GET["number2"]) ? "<p>Number2: " . $_GET["number2"] . "</p>" : "";
                    $number1 = isset($_GET["number1"]) ? (int) $_GET["number1"] : 0;
                    $number2 = isset($_GET["number2"]) ? (int) $_GET["number2"] : 0;
                    if (!is_null($number1) && !is_null($number2)) echo "The sum is: " . $number1 + $number2 . "</p>";

                    echo "Prefered animals: ";
                    if (isset($_GET['animal'])) {
                        foreach ($_GET['animal'] as $selected) {
                            echo "<p>" . $selected . "</p>";
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>


        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title">Server Information</h5>
            </div>
            <div class="card-body">

                <p class="card-text">
                    <?php
                    $method = $_SERVER['REQUEST_METHOD'];
                    echo ("You used $method to talk to the server") . "<br>";

                    echo "<p>Server name: " . $_SERVER['SERVER_NAME'] . "</p>";
                    echo "<p>Server port: " . $_SERVER['SERVER_PORT'] . "</p>";
                    echo "<p>Query string: " . $_SERVER['QUERY_STRING'] . "</p>";
                    echo "<p>Http referer: " . $_SERVER['HTTP_REFERER'] . "</p>";
                    ?>
                </p>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>

    </div>
</body>

</html>

<?php
