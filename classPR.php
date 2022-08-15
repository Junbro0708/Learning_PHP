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
    <input type="text" name="fname" placeholder="First Name"><br>
    <input type="text" name="lname" placeholder="First Name"><br>
    <input type="text" name="marks" placeholder="Put your four marks using ,"><br>
    <select name="program">
      <option disabled selected value="">Select your program</option>
      <option>Web development</option>
      <option>UI/UX</option>
      <option>IBM</option>
    </select><br>
    <button type="submit">Submit</button>
  </form>

  <?php
    class student{
      private $fname;
      private $lname;
      private $marks;
      private $program;

      function __construct($fname, $lname, $marks, $program)
      {
        $this -> fname = $fname;
        $this -> lname = $lname;
        $this -> marks = $marks;
        $this -> program = $program;
      }

      function average(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $sum = 0;

          foreach($this -> marks as $value){
            $sum += $value;
          }
  
          if(count($this -> marks) != 0){
            echo "<h2>Average mark is ".($sum / count($this -> marks))."</h2>";
          }
        }
      }

      function finderMAXMIN(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $max = 0;
          $min = 999;

          foreach($this -> marks as $value){
            if($value > $max){
              $max = $value;
            }
            if($value < $min){
              $min = $value;
            }
          }

          echo "<h2>Max mark is $max Min mark is $min</h2>";
        }
      }

      function getter(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          echo "<h2>".$this->fname." ".$this->lname."</h2>";
          echo "<h2>";
          foreach($this -> marks as $value){
            echo $value." ";
          }
          echo "</h2>";
          echo "<h2>".$this->program."</h2>";
        }
      }
    }

    $fname = "";
    $lname = "";
    $marks = [];
    $program = "";

    switch($_SERVER['REQUEST_METHOD']){
      case "POST":
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $marks = explode(",", $_POST['marks']);
        $program = $_POST['program'];
        break;
      case "GET":
        echo "<h1>WELCOME</h1>";
        break;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    }
    $jun = new student($fname, $lname, $marks, $program);
    $jun->average();
    $jun->finderMAXMIN();
    $jun->getter();
  ?>
</body>
</html>