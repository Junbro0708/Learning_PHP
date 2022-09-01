<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <input type="text" name="customerName" placeholder="customerName">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="text" name="customerAddress" placeholder="customerAddress">
    <button type="submit">Send</button>
  </form>

  <?php
    include './config.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $customerName = $_POST['customerName'];
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $pass = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost"=>9]);
      $customerAddress = $_POST['customerAddress'];

      $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connect Error");
      }else{
        $searchCmd = "SELECT * FROM customers_tb WHERE email='$email';";
        $result = $dbCon->query($searchCmd);
        if($result->num_rows > 0){
          echo "<h1>We already have user id</h1>";
          $dbCon->close();
        }else{
          $insert = $dbCon->prepare("INSERT INTO customers_tb(customerName, email, password, customerAddress) VALUES(?,?,?,?);");
          $insert->bind_param("ssss", $customerName, $email, $pass, $customerAddress);
          if($insert->execute()){
            echo "<h1>User registered.</h1>";
          }else{
            echo "<h1>User not registered.</h1>";
          }
          $insert->close();
          $dbCon->close();
        }
      }
    }
  ?>
</body>
</html>