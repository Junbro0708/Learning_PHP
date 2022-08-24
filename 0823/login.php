<?php
  include '../0822/config.php';
  session_start();
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
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="username" type="email"/>
    <input type="password" name="pass" type="password"/>
    <button type="submit">Login</button>
  </form>
  <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username = $_POST["username"];
      $pass = $_POST["pass"];

      $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connection error ".$dbCon->connect_error);
      }else{
        $selectCmd = "SELECT * FROM `user_tb` WHERE email='$username' AND pass='$pass';";
        $result = $dbCon->query($selectCmd);
        
        if($result->num_rows > 0){
          $user = $result->fetch_assoc();
          $_SESSION['user'] = $user;
          $_SESSION['session_timeout'] = time() + 10;
          $dbCon->close();
          header("Location:http://localhost/php/0823/welcome.php");          
        }else{
          echo "User not vaild";
        }
        $dbCon->close();
      }
    }
  ?>
</body>
</html>