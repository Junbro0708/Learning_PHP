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
    <select>
      <?php
        foreach($coursesArray as $course){
          echo "<option value='".$course['course_id']."'>".$course['coursename']."</option>";
        }
      ?>
    </select>
  </form>
</body>
</html>