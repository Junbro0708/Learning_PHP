<?php
  include '../0822/config.php';
  $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);

  if($dbCon->connect_error){
    die("Connect Error");
  }else{
    $studentArray = [];
    $classArray = [];
    $studentSelect = "SELECT * FROM user_tb WHERE title='student'";
    $classSelect = "SELECT * FROM class_tb";

    $result_studentSelect = $dbCon->query($studentSelect);
    while($row = $result_studentSelect->fetch_assoc()){
      array_push($studentArray, $row);
    }
    $result_classSelect = $dbCon->query($classSelect);
    while($row = $result_classSelect->fetch_assoc()){
      array_push($classArray, $row);
    }

    $dbCon->close();
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
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <select name="sudentSelect">
    <?php
      foreach($studentArray as $student){
        echo "<option value='".$student['user_id']."'>".$student['firstName']." ".$student['lastName']."</option>";
      }
    ?> 
    </select>
    <select name="classSelect">
    <?php
      foreach($classArray as $class){
        echo "<option value='".$class['class_id']."'>".$class['class_name']." "."</option>";
      }
    ?> 
    </select>
    <button type="submit">Add</button>
  </form>
</body>
</html>