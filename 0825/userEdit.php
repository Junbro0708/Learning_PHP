<?php
  include '../0822/config.php';
  session_start();

  if(!isset($_SESSION['userData'])){
    header("Location:http://localhost/php/0825/userAdmin.php");
  }else{

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
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
      $updateCmd = "UPDATE user_tb SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', email='".$_POST['email']."', pass='".$_POST['pass']."', dob='".$_POST['dob']."', phone='".$_POST['phone']."', addr='".$_POST['addr']."', salt='".$_POST['salt']."', title='".$_POST['title']."' WHERE user_id = ".$_POST['user_id'];

      if($dbCon->query($updateCmd) === true){
        $dbCon->close();
        session_unset();
        session_destroy();
        header("Location:http://localhost/php/0825/userAdmin.php");
      }
    }
  ?>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <?php
      foreach($_SESSION['userData'] as $fieldName => $value){        
        switch($fieldName){
          case "email":
            echo "<div><label for='$fieldName'>$fieldName</label>";
            echo "<input type='email' name='$fieldName' value='$value'></div>";
          break;
          case "dob":
            echo "<div><label for='$fieldName'>Date of birth</label>";
            echo "<input type='date' name='$fieldName' value='$value'></div>";
          break;
          case "phone":
            echo "<div><label for='$fieldName'>$fieldName</label>";
            echo "<input type='tel' name='$fieldName' value='$value'></div>";
          break;
          case "pass":
            echo "<div><label for='$fieldName'>Password</label>";
            echo "<input type='password' name='$fieldName' value='$value'></div>";
          break;
          default:
            echo "<div><label for='$fieldName'>$fieldName</label>";
            echo "<input type='text' name='$fieldName' value='$value'></div>";
          break;
        }
      }
    ?>
    <button type='submit'>Send</button>
  </form>
</body>
</html>