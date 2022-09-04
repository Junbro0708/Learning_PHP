<?php
  include './config.php';
  //checking the user session, and if there is no session, go back to login page
  if(!isset($_SESSION['user'])){
    header("Location: http://localhost/Jun-PHPFV2/Jun_login.php");
  }

  $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  if($dbCon->connect_error){
    die("Connection Error");
  }else{
    $contactData = [];
    //putting all data in the database
    $selectCmd = "SELECT * FROM contacts_tb";
    $result = $dbCon->query($selectCmd);
    
    while($row = $result->fetch_assoc()){
      array_push($contactData, $row);
    }
  }
  $dbCon->close();

  //if click the logout btn, remove session and go back to login page
  if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['action'])){
      if($_GET['action'] == 'logout'){
        session_unset();
        session_destroy();
        header("Location: http://localhost/Jun-PHPFV2/Jun_login.php");
      }
    }
  }

  if(isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $dbcon = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
    if($dbcon->connect_error){
        die("connection error");
    }else{
        switch($_GET['action']){
          //delete function
            case "delete":
              $selCmd = "SELECT * FROM contacts_tb WHERE contactId='$id'";
              $result = $dbcon->query($selCmd);
              $row = $result->fetch_assoc();

              $delcmd = "DELETE FROM contacts_tb WHERE contactId='$id'";
              if($dbcon->query($delcmd) === TRUE){
                  $dbcon->close();
                  header("Location: http://localhost/Jun-PHPFV2/Jun_ShowAll.php");
              }else{
                echo "<h1>Delete failed</h1>";
              }
            break;
            //edit function
            case "edit":
              $selectuser = "SELECT * FROM contacts_tb WHERE contactId='$id'";
              $result = $dbcon->query($selectuser);
              $_SESSION['editData'] = $result->fetch_assoc();
              $dbcon->close();
              header("Location: http://localhost/Jun-PHPFV2/Jun_Edit.php");
            break;
        }
        $dbcon->close();
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
  <a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>">Logout</a>
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //making table
        foreach($contactData as $contact){
          echo "<tr>";
          echo "<td>".$contact['contactId']."</td>";
          echo "<td>".$contact['firstName']."</td>";
          echo "<td>".$contact['lastName']."</td>";
          echo "<td>".$contact['email']."</td>";
          echo "<td>".$contact['phoneNumber']."</td>";
          echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$contact['contactId']."&action=edit'>Edit</a></td>";
          echo "<td><a href='".$_SERVER['PHP_SELF']."?id=".$contact['contactId']."&action=delete'>Delete</a></td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>