<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="fname" placeholder="Write your first name"/>
    <input type="text" name="lname" placeholder="Write your last name"/>
    <button type="submit">Submit</button>
  </form>

  <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      if($fname != "" && $lname != ""){
        echo "Your name is: $fname $lname";
      }else{
        echo "Write your firstname and last name";
      }
    }elseif($_SERVER['REQUEST_METHOD']=="GET"){
      echo "WELCOME";
    }
  ?>
</body>
</html>