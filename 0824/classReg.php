<?php 
  include '../0822/config.php';
  $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
  if($dbCon->connect_error){
    die("Connection error");
  }else{
    $selectCmd = "SELECT * FROM course_tb";
    $result = $dbCon->query($selectCmd);
    $coursesArray = [];
    while($row = $result->fetch_assoc()){
      array_push($coursesArray, $row);
    }
    $dbCon->close();
    print_r($coursesArray);
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
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <input type="text" name="className" required/>
    <select name="selectCourse">
      <?php
        foreach($coursesArray as $index => $course){
          echo "<option value='".$index."'>".$course['coursename']."</option>";
        }
      ?>
    </select>
    <input type="date" name="startDate"/>
    <button type="submit">Register</button>
  </form>
  <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $classname = $_POST['className'];
      $courseIndex = $_POST['selectCourse'];
      $startDate = $_POST['startDate'];
      $lenght = $coursesArray[$courseIndex]['length'];
      $days = 86400 * ($lenght * 4 / 7);
      $endDate = date("Y-m-d", strtotime($startDate)+$days);
      
      $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
      if($dbCon->connect_error){
        die("Connection error");
      }else{
        $insertCmd = "INSERT INTO class_tb (start_date, end_date, class_name, course_id) VALUE ('$startDate', '$endDate', '$classname', '".$coursesArray[$courseIndex]['course_id']."')";

        if($dbCon->query($insertCmd)){
          echo "<h1>Class added</h1>";
        }else{
          echo "<h1>query problem</h1>".$dbCon->error;
        }
        $dbCon->close();
      }
    }
  ?>
</body>
</html>