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
    <input type="text" name="fname" placeholder="Write your FIRST name"/>
    <input type="text" name="lname" placeholder="Write your LAST name"/>
    <input type="text" name="desire" placeholder="Write your DESIRE"/>
    <button type="submit">Write your wish</button>
  </form>

  <?php
    class dummyUser{
      private $fname;
      private $lname;
      private $desire;
      
      function __construct($fname, $lname, $desire)
      {
        $this -> $fname = $fname;
        $this -> $lname = $lname;
        $this -> $desire = $desire;
      }
    }

    function writeDesire($fname, $lname, $desire, $fileAddr){
      chmod($fileAddr, 0777);
      $fileHandler = fopen("./files/$fname"."_"."$lname/$fname"."_"."$lname.txt", 'w') or die("Unable to create");
      fwrite($fileHandler, "Your DESIRE is $desire");
      fclose($fileHandler);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $desire = $_POST['desire'];
      $fileAddr = "./files/$fname"."_"."$lname";
      if(file_exists($fileAddr)){
        writeDesire($fname, $lname, $desire, $fileAddr);
      }else{
        if(mkdir($fileAddr)){
          writeDesire($fname, $lname, $desire, $fileAddr);
        }else{
          echo "Error creating the directory";
        }
      }
    }
  ?>
</body>
</html>