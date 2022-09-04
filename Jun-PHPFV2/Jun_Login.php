<?php
  include './config.php';

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass'])){
      //checking if the email is right type of the email and if not, changing to right email
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $pass = $_POST['pass'];

      $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connect Error");
      }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          $searchCmd = "SELECT * FROM admin_tb WHERE userName='$email';";
          $result = $dbCon->query($searchCmd);
          if($result->num_rows > 0){
            $userData = $result->fetch_assoc();
            //checking if the password is same with hashed password in the database
            if(password_verify($pass, $userData['password'])){
              //putting last login time to database
              $updateCmd = "UPDATE admin_tb SET lastLogin ='".date("Y-m-d",time())."'";
              $result = $dbCon->query($updateCmd) or die($dbCon->error);
              $_SESSION['user'] = $userData;
              //redirect to showall page
              header("Location: http://localhost/Jun-PHPFV2/Jun_ShowAll.php");
            }else{
              echo "<h1>Different password/email</h1>";
            }
          }else{
            echo "<h1>Different password/email</h1>";
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
  <h1>Login Page</h1>
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <input type="email" name="email" placeholder="Enter the email.." required>
    <input type="password" name="pass" placeholder="Enter the password.." required>
    <button type="submit">Send</button>
  </form>
</body>
</html>