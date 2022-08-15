<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="text" name="fname" placeholder="What is your first name?">
        <input type="text" name="lname" placeholder="What is your last name?"></br>
        <input type="text" name="marks" placeholder="Marks">
        <select name="selects">
            <option disabled selected value="">Select your program</option>
            <option>Web Deperopment</option>
            <option>UI/UX</option>
            <option>Desital Marketing</option>
            <option>IBM</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>

    <?php
        class students {
            private $fname;
            private $lname;
            private $marks;
            private $selects;

            function __construct($fname, $lname, $marks, $selects)
            {
                $this -> fname = $fname;
                $this -> lname = $lname;
                $this -> marks = $marks;
                $this -> selects = $selects;
            }

            function avg(){
                $sum = 0;
                $avg = 0;

                foreach ($this -> marks as $mark){
                    $sum += $mark;
                }
                
                if (count($this -> marks) != 0) {
                    $avg = $sum / count($this -> marks);

                    return ($avg . 2);
                }
            }

            function maxmin() {
                $max = 0;
                $min = 100;

                foreach($this -> marks as $value) {
                    if ($max <= $value) {
                        $max = $value;
                    }
                    if($min >= $value) {
                        $min = $value;
                    } 
                  }
                return [$max, $min];
            }

            function details() {
                echo $this -> fname , $this -> lname;
                foreach ($this -> marks as $value) {
                    echo $value;
                }
                echo $this -> selects;
            }
        }

        $fname = "";
        $lname = "";
        $marks = [];
        $selects = "";

        switch ($_SERVER['REQUEST_METHOD']){
            case "POST":
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $marks = explode("," , $_POST['marks']);
                $selects = $_POST['selects'];
            break;

            case "GET":
                echo "<h1> WELCOME!! </h1>";
            break;
        }


        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $Taka = new students($fname,$lname,$marks,$selects);
    
            echo round(($Taka->avg()), 2)."</br>";
            echo round(($Taka->maxmin())[0], 3)."</br>";
            echo round(($Taka->maxmin())[1], 2)."</br>";
            echo $Taka->details();

        }
    ?>
</body>
</html>