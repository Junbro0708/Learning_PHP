<?php
  include './config.php';
  createCookie("fName", "JunHyeong", 2);
  createCookie("lName", "Park", 2);
?>
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
    echo "<h1>My name is ".$_COOKIE["fName"]." ".$_COOKIE["lName"].".</h1>";
  ?>
</body>
</html>
