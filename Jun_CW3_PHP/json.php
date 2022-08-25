<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table{
      width: 95%;
      border-collapse: collapse;
    }
    thead{
      background-color: whitesmoke;
    }
    tr:last-child td{
      border-bottom: none;
    }
    th, td{
      width: fit-content;
      text-align: center;
      padding: 1% 0.5%;
      border-bottom: 1px solid gainsboro;
      border-right: 1px solid gainsboro;
    }
    th:first-child, td:first-child{
      width: 5%;
    }
    th:nth-child(9), th:nth-child(10), 
    td:nth-child(9), td:nth-child(10){
      width: 5%;
    }
    th:last-child, td:last-child{
      border-right: none;
    }
    </style>
</head>
<body>
    <?php
        include './makeSelect.php';
        function loadData($employeeData){
            echo "<table><thead><tr><th>ID</th><th>FirstName</th><th>LastName</th><th><form method='GET' action=".$_SERVER['PHP_SELF'].">";
            makeSelect($employeeData, "");
            echo "<button type='submit'>V</button></form></th><th>Salary</th><th>Email</th><th>PhoneNumber</th><th>Address</th><th>Edit</th><th>Delete</th></tr></thead>";
            foreach($employeeData as $idx=>$employee){
                echo "<tr><td>$employee->EmployeeID</td><td>$employee->first_name</td><td>$employee->last_name</td><td>$employee->Department</td><td>$employee->Salary</td><td>$employee->email</td><td>$employee->Phone</td><td>$employee->Address</td>";
                echo "<td><form method='POST' action='".$_SERVER['PHP_SELF']."'>";
                echo "<button type='submit' name='idx' value='$idx'>edit</button></form></td>";
                echo "<td><a href='./deleteUser.php?idx=$idx'>Delete</a></td></tr>";

            }
            echo "</table>";
        }
        function loadSelectData($employeeData, $keyword){
            echo "<table><thead><tr><th>ID</th><th>FirstName</th><th>LastName</th><th><form method='GET' action=".$_SERVER['PHP_SELF'].">";
            makeSelect($employeeData, "");
            echo "<button type='submit'>V</button></form></th><th>Salary</th><th>Email</th><th>PhoneNumber</th><th>Address</th><th>Edit</th><th>Delete</th></tr></thead>";
            foreach($employeeData as $idx=>$employee){
              if($employee->Department == $keyword){
                echo "<tr><td>$employee->EmployeeID</td><td>$employee->first_name</td><td>$employee->last_name</td><td>$employee->Department</td><td>$employee->Salary</td><td>$employee->email</td><td>$employee->Phone</td><td>$employee->Address</td>";
                echo "<td><form method='POST' action='".$_SERVER['PHP_SELF']."'>";
                echo "<button type='submit' name='idx' value='$idx'>edit</button></form></td>";
                echo "<td><a href='./deleteUser.php?idx=$idx'>Delete</a></td></tr>";
              }
            }
            echo "</table>";
        }
        $fileHandler = fopen('./employeeData.json','r');
        $data = fread($fileHandler,filesize('./employeeData.json'));
        fclose($fileHandler);
        $emloyeeData = json_decode($data);
        if($_SERVER['REQUEST_METHOD']=="GET"){
          if(!isset($_GET['depart']) || $_GET['depart'] == ""){
            loadData($emloyeeData);
          }else{
            $keyword = $_GET['depart'];
            loadSelectData($emloyeeData, $keyword);
          }
        }

        if($_SERVER['REQUEST_METHOD']=="POST"){
          if(isset($_POST['idx'])){
            $_SESSION['idx'] = $_POST['idx'];
            $_SESSION['timeout'] = time() + 5;
            header("Location:http://localhost/php/Jun_CW3_PHP/editUser.php");
          }
        }
    ?>
</body>
</html>