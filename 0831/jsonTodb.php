<?php
  include './config.php';

  $fileHandler = fopen('./MOCK_DATA.json', 'r');
  $JsonString = fread($fileHandler, filesize('./MOCK_DATA.json'));
  fclose($fileHandler);
  $jsonData = json_decode($JsonString, true);

  $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  if($dbCon->connect_error){

  }else{
    $insert = $dbCon->prepare("INSERT INTO product_tb(productName, productPrice) VALUES(?,?);");
    $insert->bind_param("sd", $productName, $productPrice);
    foreach($jsonData as $productDetails){
      $productName = $productDetails['productName'];
      $productPrice = $productDetails['price'];
      $insert->execute();
    }
  }
  echo "Data Saved into the Database";
  $insert->close();
  $dbCon->close();
?>