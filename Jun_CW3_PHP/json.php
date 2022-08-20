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
    <!-- <form method="POST" action="">
        <input type="text" name="fname" placeholder="write firstname"/>
        <input type="text" name="lname" placeholder="write lastname"/>
        <input type="text" name="score" placeholder="write the score"/>
        <button type="submit">Add/Save</button>
    </form> -->
    <?php
        function loadData($employeeData){
            $sum = 0;
            $max = 0;
            $min = 100;
            echo "<table><thead><tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Department</th><th>Salary</th><th>Email</th><th>PhoneNumber</th><th>Address</th><th>Edit</th><th>Delete</th></tr></thead>";
            foreach($employeeData as $idx=>$employee){
                echo "<tr><td>$employee->EmployeeID</td><td>$employee->first_name</td><td>$employee->last_name</td><td>$employee->Department</td><td>$employee->Salary</td><td>$employee->email</td><td>$employee->Phone</td><td>$employee->Address</td><td><a href='./editUser.php?idx=$idx'>Edit</a></td><td><a href='./deleteUser.php?idx=$idx'>Delete</a></td></tr>";
            }
            echo "</table>";
        }
        $fileHandler = fopen('./employeeData.json','r');
        $data = fread($fileHandler,filesize('./employeeData.json'));
        fclose($fileHandler);
        $emloyeeData = json_decode($data);
        if($_SERVER['REQUEST_METHOD']=="GET"){
          loadData($emloyeeData);
        }
    ?>
</body>
</html>