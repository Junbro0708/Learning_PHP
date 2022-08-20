<?php
  if(isset($_GET['idx'])){
    $idx = $_GET['idx'];
    $filehandler = fopen('./employeeData.json','r');
    $employeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
    fclose($filehandler);

    unset($employeeData[$idx]);
    $employeeData = array_values($employeeData);

    $filehandler = fopen('./employeeData.json','w');
    $stringData = json_encode($employeeData);
    fwrite($filehandler,$stringData);
    fclose($filehandler);
    header("Location: http://localhost/PHP/Jun_CW3_PHP/json.php");
  }
?>