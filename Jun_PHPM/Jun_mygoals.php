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
    form{
      width: 30%;
      display: flex;
      flex-direction: column;
      flex-wrap: nowrap;
      row-gap: 20px;
      padding: 1%;
    }

    input{
      padding: 2% 1%;
      border-radius: 0;
      border: none;
      border-bottom: 1px solid gainsboro;
    }

    button{
      width: 50%;
      padding: 2%;
      border-radius: 0;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Type Your Goals</h2>
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="goal1" placeholder="First your goals">
    <input type="text" name="goal2" placeholder="Second your goals">
    <input type="text" name="goal3" placeholder="Third your goals">
    <input type="text" name="goal4" placeholder="Fourth your goals">
    <input type="text" name="goal5" placeholder="Fifth your goals">
    <button type="submit">Submit</button>
  </form>

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

      //this function is writing content inside txt file
      function writeGoals(){
        return "First goal:".$this->goal1."\nSecond goal:".$this->goal2."\nThird goal:".$this->goal3."\nFourth goal:".$this->goal4."\nFifth goal:".$this->goal5."\n";
      }
    }

    //this function is creating file
    function fileCreator(){
      $addr = "./myfiles/myGoal.txt";
      $fileHandler = fopen($addr,'w');
      return $fileHandler;
    }

    //if the buttons is clicked, request method would be changed to POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $goal1 = $_POST["goal1"];
      $goal2 = $_POST["goal2"];
      $goal3 = $_POST["goal3"];
      $goal4 = $_POST["goal4"];
      $goal5 = $_POST["goal5"];

      //creating object about goals
      $myGoals = new goals($goal1, $goal2, $goal3, $goal4, $goal5);

      //using write goals method in object
      $fileHandler = fileCreator();
      fwrite($fileHandler, $myGoals -> writeGoals());
      fclose($fileHandler);
    }

    
  ?>
</body>
</html>