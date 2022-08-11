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
    $friends = array("Jay", "Marcelo", "Sam", "Haruka", "Taka");

    $counter = 0;

    echo "<ul>";
    while($counter < count($friends)){
      echo "<li>$friends[$counter]</li>";
      $counter++;
    }
    echo "</ul>";

    echo "<ul>";
    for($i = 0; $i < count($friends); $i++){
      echo "<li>$friends[$i]</li>";
    }
    echo "</ul>";
  ?>
</body>
</html>