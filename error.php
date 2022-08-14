<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
        <input type="text" name="fname">
        <input type="text" name="lname">
        <input type="text" name="marks">
        <select name="select">
            <option>Turm1</option>
            <option>Turm2</option>
            <option>Turm3</option>
            <option>Turm4</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php

        class students{
            public $fname;
            public $lname;
            public $marks;
            public $select;

            function __construct($fname,$lname,$marks,$select) {
                $this->fname = $fname;
                $this->lname = $lname;
                $this->marks = $marks;
                $this->select = $select;
            }

            function avg() {
                $sum = 0;
                $avg = 0;
                foreach ($this->marks as $value) {
                    $sum = ($sum + $value);
                }
                $avg = $sum / 4;
                echo "<br>".$avg;
            }

            function maxmin() {
                $max = 0;
                $min = 100;
                foreach ($this->marks as $value) {    
                    if($max <= $value) {
                        $max = $value;
                    }
    
                    if ($min >= $value) {
                        $min = $value;
                    }
                }
                echo "Max is".$max;
                echo "Min is".$min;
            }
        }

        switch ($_SERVER["REQUEST_METHOD"]) {
            case "POST":
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $marks = explode("," , $_POST['marks']);
                $select = $_POST['select'];
              break;

            case "GET":
                echo "<h1>WELCOM</h1>";
              break;
        }

        $taka = new students($fname,$lname,$marks,$select);
        echo $taka->avg();
        echo $taka->maxmin();

        
        // $Taka = new students("Takahiro","Ota","")

    ?>
</body>
</html>