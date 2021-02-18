<?php include 'formHeader.php' ?>

<body>
    <div class="container">
        <?php
        echo isset($_GET["name"]) ?     "<p>Name: "         . htmlentities($_GET["name"]) .     "</p>" : "";
        echo isset($_GET["lastName"]) ? "<p>Last Name: "    . $_GET["lastName"] . "</p>" : "";
        echo isset($_GET["dob"]) ?      "<p>DoB: "          . $_GET["dob"] .      "</p>" : "";
        echo isset($_GET["submit"]) ?   "<p>Submit: "       . $_GET["submit"] .   "</p>" : "";

        echo isset($_GET["number1"]) ?  "<p>Number1: " . $_GET["number1"] .  "</p>" : "";
        echo isset($_GET["number2"]) ?  "<p>Number2: " . $_GET["number2"] .  "</p>" : "";
        $number1 = isset($_GET["number1"]) ? (int) $_GET["number1"] : null;
        $number2 = isset($_GET["number2"]) ? (int) $_GET["number2"] : null;
        if (!is_null($number1) && !is_null($number2)) echo "<p>The sum is: " . $number1 + $number2 .  "</p>";
        ?>

        <?php
        $name = isset($_GET["name"]) ? $_GET["name"] : null;
        if (is_null($name)) {
        ?>
            <h1 class="display-1">My Data Form</h1>
            <!--form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get"-->
            <form action="formResponse.php" method="get">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Type your name" />
                </div>
                <div class="mb-3">
                    <input type=" text" name="lastName" class="form-control" placeholder="Type your last name" />
                </div>
                <div class="mb-3">
                    <input type=" text" name="number1" class="form-control" placeholder="number1?" />
                </div>
                <div class="mb-3">
                    <input type=" text" name="number2" class="form-control" placeholder="number2?" />
                </div>
                <div class="mb-3">
                    <label class=" radio-label">
                        <input type="radio" id="female" name="gender" value="1" required />
                        <label for="female">Female</label><br>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="radio-label">
                        <input type="radio" id="male" name="gender" value="0" required />
                        <label for="male">Male</label><br>
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="cat" id="flexCheckDefault" name="animal[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Cats
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="dog" id="flexCheckChecked" name="animal[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        Dogs
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="bird" id="flexCheckChecked" name="animal[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        Birds
                    </label>
                </div>
                <div class="mb-3">
                    <input type="text" id="idDoB" name="dob" class="form-control" />
                </div>
                <div class="row justify-content-end">
                    <div class="col-2">
                        <input type="submit" name="send" value="Send" class="btn btn-dark btn-lg" />
                    </div>
                </div>
            </form>


        <?php } //end if (is_null($name)) { 
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>

</html>