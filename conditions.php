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
    $rainy = false;

    if($rainy == true){
      echo "<h1>Tomorrow would be rainy day.</h1>";
    }else{
      echo "<h1>Tomorrow would be not rainy day.</h1>";
    }

    $num = 1;

    if($num % 2 == 1){
      echo "<h1>Odd</h1>";
    }else{
      echo "<h1>Even</h1>";
    }

    $weather = "Sunny";
    echo "<h1>";
    if($weather == "Rainy"){
      echo "Take the umbrella";
    }elseif($weather == "Sunny"){
      echo "Take the sunglasses";
    }else{
      echo "Have fun!";
    }
    echo "</h1>";

    $result = 23;
    echo "<h1 class='mark'>";
    if($result > 85 && $result <= 100){
      echo "Your Mark is A";
    }elseif($result > 75 && $result <= 85){
      echo "Your Mark is B";
    }elseif($result > 65 && $result <= 75){
      echo "Your Mark is C";
    }elseif($result <= 65){
      echo "For Real !!!!!!";
    }
    echo "</h1>";

    $A = 98;
    $B = 100;
    $C = 90;
    $D = 85;
    $E = 93;

    $average = ($A + $B + $C + $D + $E) / 5;

    $marks = [78, 76.5, 80, 90, 100, 60, 45];
    for($i = 0; $i < count($marks); $i++){
      echo "<h3>$marks[$i]</h3>";
    }

    $sum = 0;
    $counter = 0;
    while($counter < count($marks)){
      $sum += $marks[$counter];
      $counter++;
    }

    $avg = $sum / $counter;
    echo "<h3>Total number is : ".count($marks)."</h3>";
    echo "<h3>Average is : $avg</h3>";

    $counter = 0;
    while($counter < 10){
      echo "<h3>";
      echo 1+$counter;
      echo "</h3>";
      $counter++;
    }

    echo "<h1>";
    switch($average){
      case $average > 85 && $average <= 100:
        echo "Your Mark is A";
        break;
      case $average > 75 && $average <= 85:
        echo "Your Mark is B";
        break;
      case $average > 65 && $average <= 75:
        echo "Your Mark is C";
        break;
      case $average <= 65:
        echo "For Real !!!!!!";
        break;
    }
    echo "</h1>";
  ?>
</body>
</html>