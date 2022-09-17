<?php
  header("Access-Control-Allow-Origin: http://localhost:3000");
  session_start();
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['uName'];
    $pass = $_POST['pass'];
    $ip = $_POST['gip'];

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPass = "";
    $dbName = "students_db";
    $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);

    if($dbCon->connect_error){
      die("connection error");
    }else{
      $selectUserCmd = "SELECT * FROM `user_tb` WHERE email='$username';";
      $result = $dbCon->query($selectUserCmd);
      
      if($result != false && $result->num_rows > 0){
        $user = $result->fetch_assoc();
        $dbCon->close();
        if(password_verify($pass, $user['pass'])){
          $user['gip'] = $ip;
          $_SESSION['user'] = $user;
          $user['sid'] = session_id();
          echo json_encode($user);
        }else{
          echo "false";
        }
      }else{
        echo "false";
      }
    }
  }
?>