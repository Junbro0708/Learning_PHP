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
    echo "Current file name is: ".$_SERVER["PHP_SELF"]."</br>";
    echo "Server name is: ".$_SERVER["SERVER_NAME"]."</br>";
    echo "Client IP is: ".$_SERVER["SERVER_ADDR"]."</br>";
    echo "Client IP is: ".$_SERVER["REMOTE_ADDR"]."</br>";
    echo "Server port number is: ".$_SERVER["SERVER_PORT"]."</br>";
    echo "Client port number is: ".$_SERVER["REMOTE_PORT"]."</br>";
  ?>
</body>
</html>