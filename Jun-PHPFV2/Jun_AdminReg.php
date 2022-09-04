<?php
  include './config.php';

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass'])){
      //checking if the email is right type of the email and if not, changing to right email
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      //changing the password to hashed password (encryption)
      $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT, ["cost"=>9]);

      $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connect Error");
      }else{
        //checking if the email is valid
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          //checking if the email already exists in the datebase
          $searchCmd = "SELECT * FROM admin_tb WHERE userName='$email';";
          $result = $dbCon->query($searchCmd);
          $userData = $result->fetch_assoc();
          //if it already has the email,
          if($result->num_rows > 0){
            echo "<h2>Already has the email</h2>";
          }else{ // or no
            //putting the user info to database
            $insert = $dbCon->prepare("INSERT INTO admin_tb(userName, password) VALUES(?,?);");
            $insert->bind_param("ss", $email, $pass);
            $insert->execute();
            echo "<h2>Registered</h2>";
          }
        }
      }
      $dbCon->close();
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
</head>
<body>
  <h1>Register Page</h1>
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <input type="email" name="email" placeholder="Enter the email.." required>
    <input type="password" name="pass" placeholder="Enter the password.." required>
    <button type="submit">Send</button>
  </form>
</body>
</html>