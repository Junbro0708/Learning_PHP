<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    h2{
      padding-left: 1%;
      padding-top: 1%;
      margin: 0;
    }
    li{
      padding: 1%;
    }
  </style>
</head>
<body>
  <?php
    //created class about goals
    class goals{
      private $goal1;
      private $goal2;
      private $goal3;
      private $goal4;
      private $goal5;

      function __construct($goal1, $goal2, $goal3, $goal4, $goal5)
      {
        $this -> goal1 = $goal1;
        $this -> goal2 = $goal2;
        $this -> goal3 = $goal3;
        $this -> goal4 = $goal4;
        $this -> goal5 = $goal5;
      }

      //this fuction will display table with object's variables
      function createList(){
        echo "<h2>These are goals</h2>";
        echo "<ol>";
        echo "<li>$this->goal1</li>";
        echo "<li>$this->goal2</li>";
        echo "<li>$this->goal3</li>";
        echo "<li>$this->goal4</li>";
        echo "<li>$this->goal5</li>";
        echo "</ol>";
      }
    }

    //setting path
    $addr = "./myfiles/myGoal.txt";

    //checking the file
    if(file_exists($addr)){
      $fileHandler = fopen($addr,'r');
      $goals = [];
      while(!feof($fileHandler)){
        //split string and put exact value to goals array
        $temp = explode(":",fgets($fileHandler));
        if($temp[0] == ""){
          if(count($goals) != 0){
            $mygoals = new goals($goals[0],$goals[1],$goals[2], $goals[3], $goals[4]);
          }
          $goals = [];
        }
        else{
          array_push($goals,$temp[1]);
        }
      }
      fclose($fileHandler);
      echo $mygoals->createList();
    }else{
      // if there is no file, it will show h1 content
      echo "<h1>no goals listed</h1>";
    }
  ?>
</body>
</html>