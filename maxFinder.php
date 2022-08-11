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
    $test = array(
      [10, 8, 0],
      [10, 9, 4],
      [6, 9, 2],
      [7, 8, 3]
    );

    for($i = 0; $i < count($test); $i++){
      echo "<h2>Max Row $i : ";
      $max = 0;
      for($j = 0; $j < count($test[$i]); $j++){
        if($test[$i][$j] > $max){
          $max = $test[$i][$j];
        }
      }
      echo "$max</h2>";
    }

    foreach($test as $key => $value){
      echo "<h2>Max Row $key : ";
      $max = 0;
      foreach($value as $number){
        if($number > $max){
          $max = $number;
        }
      }
      echo "$max</h2>";
    }
  ?>

  <?php
      $students = array(
        "Henry" => [56, 80, 70],
        "Kathleen" => [70, 80, 67],
        "Lin-Wen" => [90, 55, 76],
        "Akane" => [78, 80, 99]
      );
  
      echo "<table>";
      echo "<thead><tr><th>Student Name</th><th>Max</th><th>Min</th><th>Average</th></tr></thead>";
      $tMax = 0;
      $tMin = 999;
      $tAve = 0;
      foreach($students as $key => $value){
        $max = 0;
        $min = 999;
        $sum = 0;
        $ave = 0;

        echo "<tr>";
        echo "<td>$key</td>";
        foreach($value as $number){
          if($max < $number){
            $max = $number;
          }
          if($min > $number){
            $min = $number;
          }
          $sum += $number;
        }

        if($tMax < $max){
          $tMax = $max;
        }
        if($tMin > $min){
          $tMin = $min;
        }

        $ave = $sum / count($value);
        $tAve += $ave;
        echo "<td>$max</td><td>$min</td><td>$ave</td></tr>";
      }
      echo "<tfoot><tr><th>Total Score</th><th>$tMax</th><th>$tMin</th><th>";
      echo ($tAve / count($students));
      echo "</th></tr></tfoot>";
      echo "</table>";
  ?>
</body>
</html>