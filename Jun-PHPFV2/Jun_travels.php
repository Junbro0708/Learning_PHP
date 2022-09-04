<?php
  //set the path
  $addr = './Jun';
  //set the data
  $places = "Seoul\nToronto\nTokyo\nIndia\nBrazil";

  //check the path if it already exists
  if(!file_exists($addr)){
    mkdir($addr, 0755);
  }

  //making filehandler
  $fileHandler = fopen($addr."/MyPlaces.txt",'w') or die("Unable to create the file");
  fwrite($fileHandler, $places);
  fclose($fileHandler);
?>