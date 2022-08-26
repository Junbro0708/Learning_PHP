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
    $pass = password_hash("test123", PASSWORD_BCRYPT, ["cost"=>9]);
    echo $pass."</br>".password_verify("test123", $pass)."</br>";

    $pass = password_hash("test123", PASSWORD_BCRYPT, ["cost"=>9]);
    echo $pass."</br>";
  ?>
</body>
</html>