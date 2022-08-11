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
    $name = "JunHyeong Park";
    $country = "South Korea";
    // $hobby = "Workout"; // String
    // $mark = 60; // Integer
    // $price = 10.5; // Float
    // $isJun = true; // Boolean

    // echo "<h1>Hello World</h1>";
    // echo "<h2>$name</h2>";
    // echo "<h4>$country</h4>";
    // echo "<h5>$hobby</h5>";

    $mark_1 = 100;
    $mark_2 = 150;
    $average = ($mark_1 + $mark_2) / 2;

    // + add
    // - substract
    // % reminder
    // * multiplication
    // / division

    $mark_1 += 1;
    $mark_1 += $mark_2;

    $name .= $country;

    echo "$name";
    echo "<h1>My average score is : $average</h1>";
    echo "<h1>My average score is :".(($mark_1 + $mark_2) / 2)."</h1>";
  ?>
</body>
</html>