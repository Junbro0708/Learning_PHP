<?php
  include './config.php';

  //file read
  $addr = './Contacts.json';
  $fileHandler = fopen($addr, 'r');
  $JsonString = fread($fileHandler, filesize($addr));
  fclose($fileHandler);
  $jsonData = json_decode($JsonString, true);

  $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  if($dbCon->connect_error){
    die("Connection Error");
  }else{
    //inserting json data to datebase
    $insert = $dbCon->prepare("INSERT INTO contacts_tb(firstName, lastName, email, phoneNumber) VALUES(?,?,?,?);");
    $insert->bind_param("ssss", $fName, $lName, $email, $pNumber);
    foreach($jsonData as $ContactDetails){
      $fName = $ContactDetails['first_name'];
      $lName = $ContactDetails['last_name'];
      $email = $ContactDetails['email'];
      $pNumber = $ContactDetails['Phone'];
      $insert->execute();
    }
  }
  echo "Data has been saved into the Database";
  $insert->close();
  $dbCon->close();
?>