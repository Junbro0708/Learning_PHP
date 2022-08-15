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
    class Solution {

      /**
       * @param Integer $x
       * @return Boolean
       */
      function isPalindrome($x) {
          if($x < 0){
              return false;
          }else{
              $x = (string)$x;
              for($i = 0; $i < strlen($x); $i++){
                  if($i == (int)(strlen($x) / 2)){
                      return true;
                  }
                  if($x[$i] != $x[strlen($x) - 1 - $i]){
                      return false;
                  }
              }
          }
      }
  }
  ?>
</body>
</html>