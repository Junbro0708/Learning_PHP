<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="fname" placeholder="Write your first name"/>
    <input type="text" name="lname" placeholder="Write your last name"/>
    <button type="submit">Submit</button>
  </form>

  <?php
    if(!empty($_GET['fname']) && !empty($_GET['lname'])){
      $fname = $_GET['fname'];
      $lname = $_GET['lname'];
      echo "Your name is: $fname $lname";
    }
  ?>
</body>
</html>