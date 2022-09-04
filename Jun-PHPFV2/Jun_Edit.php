<?php
  include './config.php';
  //if there is no editData session, go back to showall page
  if(!isset($_SESSION['editData'])){
      header("Location: http://localhost/Jun-PHPFV2/Jun_ShowAll.php");    
  }
  //checking the user session, and if there is no session, go back to login page
  if(!isset($_SESSION['user'])){
    header("Location: http://localhost/Jun-PHPFV2/Jun_login.php");
  }

  if($_SERVER['REQUEST_METHOD']=="POST"){
    $dbCon = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
    //updating data
    $updateCmd = "UPDATE contacts_tb SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', email='".$_POST['email']."', phoneNumber='".$_POST['phoneNumber']."'"."WHERE contactId=".$_POST['contactId'];
    if($dbCon->query($updateCmd) === true){
        $dbCon->close();
        //removing session data
        unset($_SESSION['editData']);
        //go back to showall page
        header("Location: http://localhost/Jun-PHPFV2/Jun_ShowAll.php");
    }else{
      echo $dbCon->error;
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
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
      <?php
        //displaying data
          echo "<h2>Edit Information</h2>";
          foreach($_SESSION['editData'] as $fieldName=>$value){
              $label = $fieldName;
              switch($fieldName){
                  case "contactId":
                      echo "<label for='$fieldName'>$label</label>";
                      echo "<input type='number' name='$fieldName' value='$value' readonly required/></br>";
                  break;
                  default:
                  echo "<label for='$fieldName'>$label</label>";
                  echo "<input type='text' name='$fieldName' value='$value' required/></br>";
              }
          }
      ?>
      <button type="submit">Update</button>
  </form>
</body>
</html>