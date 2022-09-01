<?php
  include './config.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['password'];

    $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if($dbCon->connect_error){
      die("Connect Error");
    }else{
      $searchCmd = "SELECT * FROM customers_tb WHERE email='$email';";
      $result = $dbCon->query($searchCmd);
      $userData = $result->fetch_assoc();
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if($userData['email'] == $email && password_verify($pass, $userData['password'])){
          $_SESSION['user'] = $userData;
          $dbCon->close();
          header("Location:http://localhost/0831/shopping.php");
        }else{
          echo "<h1>Failed</h1>";
          $dbCon->close();
        }
      }else{
        echo "<h1>Failed</h1>";
        $dbCon->close();
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <form method="POST" class="d-flex" action="<?php $_SERVER['PHP_SELF'];?>">
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
      <label for="email" class="form-label">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="password" class="form-label">Password</label>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
  </form>
</body>
</html>