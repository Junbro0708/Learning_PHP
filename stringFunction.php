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
    $name = "Jiwon Lee";
    echo "Lenght: ".strlen($name)."</br>";
    echo "Word Count: ".str_word_count($name)."</br>";
    echo "String reverse: ".strrev($name)."</br>";
    echo "Find a position: ".strpos($name, "Lee")."</br>";
    echo "Replace a string: ".str_replace("Lee", "Ken", $name)."</br>";
    // echo "Return a substring: ".substr($name, 6, 3);
    echo "Return a substring: ".substr($name, strpos($name, "Lee"), strlen("Lee"));
  ?>
</body>
</html>