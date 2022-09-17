<?php
  header("Access-Control-Allow-Origin: http://localhost:3000");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dbUsername = "root";
    $dbServername = "localhost";
    $dbPass = "";
    $dbName = "students_db";
    $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
    if($dbCon->connect_error){
      die("Connection error ".$dbCon->connect_error);
    }else{
      $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT, ['cost'=>9]);
      $insertCmd = "INSERT INTO user_tb (firstName, lastName, email, pass, dob, phone, addr, salt, title) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$pass."','".$_POST["dob"]."','".$_POST["phone"]."','".$_POST["addr"]."','salt', 'student')";
      $result = $dbCon->query($insertCmd);
      if($result === true){
        echo "True";
      }else{
        echo "False";
      }
      $dbCon->close();
    }
  }
?>