<?php
  $GLOBALS['dbUsername'] = "root";
  $GLOBALS['dbServername'] = "localhost";
  $GLOBALS['dbpass'] = "";
  $GLOBALS['dbName'] = "students_db";
  session_start();
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case "logout":
        session_unset();
        session_destroy();
        header("Location: ".parse_url($_SERVER['REQUEST_URI'], PHP_URL_HOST)."/home");
      break;
    }
  }
  if(isset($_SESSION['loggedUser'])){
    header("Location: ".parse_url($_SERVER['REQUEST_URI'], PHP_URL_HOST)."/home");
  }
  function db_connect($databaseName = "students_db"){
    $dbCon = new mysqli($GLOBALS['dbUsername'],  $GLOBALS['dbServername'], $GLOBALS['dbpass'], $databaseName);
    if($dbCon->connect_error){
      echo "<h1>Connection Error</h1>";
      return false;
    }else{
      return $dbCon;
    }
  }

  function find_username($tableName, $fieldname, $username){
    $dbCon = db_connect();
    if($dbCon !== false){
      $select = "SELECT * FROM $tableName WHERE $fieldname = '$username'";
      $result = $dbCon->query($select);
      if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $dbCon->close();
        return $user;
      }
      $dbCon->close();
      return false;
    }
  }

  function Sanitize_input($value){
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }
?>