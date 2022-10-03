<?php
  header("Access-Control-Allow-Origin: http://localhost:3000");
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['uName'];
    $pass = $_POST['pass'];
    $ip = $_POST['gip'];

    session_start();
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
          $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
          $updateCmd = "UPDATE user_tb SET loginIP='$ip', loginDate='".date('d-m-y h:i:s')."' WHERE email='$username';";
          $dbCon->query($updateCmd);
          $dbCon->close();

          $user['gip'] = $ip;
          $_SESSION['user'] = $user;
          $user['sid'] = session_id();
          echo json_encode($user);
        }else{
          header("status-Text: username/pass wrong", true, 401);
          echo "username/pass wrong";
        }
      }else{
        $dbCon->close();
        header("status-Text: username/pass wrong", true, 401);
        echo "username/pass wrong";
      }
    }
  }else{
    header("status-Text: bad request", true, 400);
  }
?>