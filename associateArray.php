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
    $students = array(
      "Nak" => [81],
      "Kathleen" => [75],
      "Jiwon" => [82],
      "Marcelo" => [85, 12, 123, 5]
    );

    $students["Jun"] = 100;
    echo "<h3>Nak score is: ".$students['Nak']."</h3>";

    print_r($students);

    foreach($students as $value){
      echo "<h6>$value</h6>";
    }
    foreach($students as $key => $value){
      echo "<h6>$key : $value</h6>";
    }

    $musics = array(
      "Harry styles" => "As It was",
      "Black pink" => "Forever Young",
      "BTS" => "Butter",
      "CardiB" => "WAP",
      "Justin Bieber" => "Off my Face"
    );

    echo "<h4>Singer : Music</h4>";
    echo "<ul>";
    foreach($musics as $key => $value){
      echo "<li>$key : $value</li>";
    }
    echo "</ul>";

    $key = array_search("WAP", $musics);
    echo "<h3>$key</h3>";

    foreach($students as $key => $value){
      echo "<h3>$key : ";
      foreach($value as $score){
        echo "$score, ";
      }
      echo "</h3>";
    }
  ?>
</body>
</html>