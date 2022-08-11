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
    function nameDisplayer($name, $family){
      echo "welcome $name $family</br>";
    }
    // nameDisplayer("Jun", "Park");

    function wordFinder($word){
      $num = 0;
      $word = trim($word); // will remove the spaces from the brginning
      if(strlen($word) > 0){
        for($i = 0; $i < strlen($word); $i++){
          if($word[$i] == " "){
            $num++;
          } 
        }
        return $num+1;
      }else{
        return $num;
      }
    }
    $word = "Jun Hyeong Park";
    $word2 = "Hello World!!";
    $word3 = "       ";

    echo "<h3>'$word' is ".wordFinder($word)." words.</h3>";
    echo "<h3>'$word2' is ".wordFinder($word2)." words.</h3>";
    echo "<h3>'$word3' is ".wordFinder($word3)." words.</h3>";

    function wordReverser($word){
      $word = trim($word);
      if(strlen($word) > 0){
        $revWord = "";
        for($i = strlen($word)-1; $i >= 0; $i--){
          $revWord .= $word[$i];
        }
        return $revWord;
      }else{
        return "";
      }
    }
    echo "<h3>".wordReverser($word)."</h3>";

    function wordChecker($char, $word){
      $num = 0;
      if(strlen($word) > 0){
        for($i = 0; $i < strlen($word); $i++){
          if($char == $word[$i]){
            $num++;
          }
        }
      }
      return $num;
    }

    $char = "n";
    echo "<h3>'$char' was used ".wordChecker($char, $word)." times for $word.</h3>";
  ?>
</body>
</html>