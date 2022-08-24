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
    <input type="text" name="fname" require/>
    <input type="text" name="lname" require/>
    <input type="date" name="dob" require/>
    <input type="email" name="email" require/>
    <input type="password" name="pass" require/>
    <input type="text" name="phone" require/>
    <input type="text" name="addr" require/>
    <button type="submit">Register</button>
  </form>

  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $dbUsername = "root";
      $dbServername = "localhost";
      $dbPass = "";
      $dbName = "students_db";
      $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connection error ".$dbCon->connect_error);
      }else{
        $insertCmd = "INSERT INTO user_tb (firstName, lastName, email, pass, dob, phone, addr, salt) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["pass"]."','".$_POST["dob"]."','".$_POST["phone"]."','".$_POST["addr"]."','salt')";
        $result = $dbCon->query($insertCmd);
        if($result === true){
          echo "<h1>Done</h1>";
        }else{
          echo "<h1>$dbCon->error</h1>";
        }
        $dbCon->close();
      }
    }
  ?>
</body>
</html>