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
    $numbers = [1, 2, 3, 4, 5];

    echo "<p>".max($numbers)."</p>";
    echo "<p>".min($numbers)."</p>";
    echo "<p>".round(12.125346234, 3)."</p>";
    echo "<p>".rand(0, 100)."</p>";
  ?>
</body>
</html>