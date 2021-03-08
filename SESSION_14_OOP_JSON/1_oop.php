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
    //##########################################
    class Employee
    {
        //properties
        public $name;
        private $salary;

        //methods
        function set_salary($salary) //public function set_salary... protected ... private
        {
            $this->salary = $salary;
        }

        function get_salary()
        {
            return ($this->salary * 3);
        }
    }

    $emp = new Employee();
    $emp->name = "Hopper";
    $emp->set_salary(200);


    echo '<h1>Class example</h1>';
    echo $emp->name . '<br/>';
    echo $emp->get_salary();
    ?>



    <hr />
    <?php
    //##########################################
    echo '<h1>Constructor</h1>';
    class Employee2
    {
        //properties
        public $name;
        private $salary;

        function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }

        //methods
        function set_salary($salary) //public function set_salary... protected ... private
        {
            $this->salary = $salary;
        }

        function get_salary()
        {
            return ($this->salary * 3);
        }
    }
    $emp = new Employee2('Hopper', 200);
    echo $emp->name . '<br/>';
    echo $emp->get_salary();
    ?>

    <hr />
    <?php
    //##########################################
    echo '<h1>Arrays and Objects</h1>';

    $emp1 = new Employee2('Hopper', 200);
    $emp2 = new Employee2('Pakita', 300);
    $emp3 = new Employee2('Fedora', 400);

    $arrayEmp = array($emp1, $emp2, $emp3);

    foreach ($arrayEmp as $myObjectEmp) {
        echo "$myObjectEmp->name <br>";
    }
    echo '<br>';
    foreach ($arrayEmp as $myObjectEmp) {
        foreach ($myObjectEmp as $key => $value)
            echo "$key: $value <br>";
    }

    ?>


    <hr />
    <?php
    //##########################################
    echo '<h1>Destructor</h1>';
    class Employee3
    {
        //properties
        public $name;
        private $salary;

        function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }

        //methods
        function set_salary($salary) //public function set_salary... protected ... private
        {
            $this->salary = $salary;
        }

        function get_salary()
        {
            return ($this->salary * 3);
        }
        function __destruct()
        {
            echo "{$this->name}, this line is executed at the end of the script.";
        }
    }
    $emp = new Employee3('Hopper', 200);
    echo $emp->name . '<br/>';
    echo $emp->get_salary();
    ?>
    <hr />
</body>

</html>