<?php
    session_start();
    if($_SESSION['timeout'] < time()){
        session_unset();
        session_destroy();
        header("Location:http://localhost/php/Jun_CW3_PHP/json.php");
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
    <?php
      if($_SERVER['REQUEST_METHOD']=="POST"){
          $id = $_POST['id'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $depart = $_POST['depart'];
          $salary = $_POST['salary'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $addr = $_POST['addr'];
          $idx = $_GET['idx'];

          $filehandler = fopen('./employeeData.json','r');
          $emloyeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
          fclose($filehandler);
          $emloyeeData[$idx]->EmployeeID = $id;
          $emloyeeData[$idx]->first_name = $fname;
          $emloyeeData[$idx]->last_name = $lname;
          $emloyeeData[$idx]->Department = $depart;
          $emloyeeData[$idx]->Salary = $salary;
          $emloyeeData[$idx]->email = $email;
          $emloyeeData[$idx]->Phone = $phone;
          $emloyeeData[$idx]->Address = $addr;
          $filehandler = fopen('./employeeData.json','w');
          $stringData = json_encode($emloyeeData);
          fwrite($filehandler,$stringData);
          fclose($filehandler);
          session_unset();
          session_destroy();
          header("Location: http://localhost/PHP/Jun_CW3_PHP/json.php");
      }

      if(isset($_SESSION['idx'])){
          $idx = $_SESSION['idx'];
          $filehandler = fopen('./employeeData.json','r');
          $emloyeeData = json_decode(fread($filehandler,filesize('./employeeData.json')));
          fclose($filehandler);
          echo "<form method='POST' action='".$_SERVER['PHP_SELF']."?idx=$idx'>";
          echo "<input name='id' value='".$emloyeeData[$idx]->EmployeeID."'/>";
          echo "<input name='fname' value='".$emloyeeData[$idx]->first_name."'/>";
          echo "<input name='lname' value='".$emloyeeData[$idx]->last_name."'/>";
          include './makeSelect.php';
          makeSelect($emloyeeData, $emloyeeData[$idx]->Department);
          echo "<input name='salary' value='".$emloyeeData[$idx]->Salary."'/>";
          echo "<input name='email' value='".$emloyeeData[$idx]->email."'/>";
          echo "<input name='phone' value='".$emloyeeData[$idx]->Phone."'/>";
          echo "<input name='addr' value='".$emloyeeData[$idx]->Address."'/>";
          echo "<button type='submit'>Save</button>";
          echo "</form>";
      }
    ?>
</body>
</html>