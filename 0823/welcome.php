<?php
  session_start();
  if($_SESSION['session_timeout'] < time() || !isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: http://localhost/php/0823/login.php");
  }
?>
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
    echo "<h1>Welcome ".$_SESSION['user']['firstName'].$_SESSION['user']['lastName']."</h1>";
    echo "<a href='".$_SERVER['PHP_SELF']."?action=exit'>Logout</a>";
    if(isset($_GET['action'])){
      switch($_GET['action']){
        case "exit":
          session_unset();
          session_destroy();
          header("Location: http://localhost/php/0823/login.php");
        break;
      }
    }
  ?>
</body>
</html>