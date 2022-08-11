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
    $marks = [13, 25, 84, 1];

    array_push($marks, 50, 87);
    array_unshift($marks, 1, 99);
    $total = array_sum($marks);

    $marks = array_unique($marks);
    
    // sort($marks);
    // rsort($marks);

    echo count($marks);

    for($i = 0; $i <= count($marks); $i++){
      echo "<h3>";
      echo "$i = $marks[$i]";
      echo "</h3>";
    }

    echo "<h3>";
    echo "Total mark is : ".$total;
    echo "</h3>";
    echo "<h3>";
    echo "Average mark is : ".($total / count($marks));
    echo "</h3>";

    echo count($marks);

    $index = array_search(50, $marks, true);
    echo "<h3>$index</h3>";
  ?>
</body>
</html>