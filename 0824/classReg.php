<?php
    include '../0822/config.php';
    $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);
    if($dbcon->connect_error){
        die("Connection error");
    }else{
        $selectCmd = "SELECT * FROM course_tb";
        $result = $dbcon->query($selectCmd);
        print_r($result);
        $coursesArray = [];
        while($row = $result->fetch_assoc()){
            array_push($coursesArray,$row);
        }
        $dbcon->close();
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input name="className" required/>
        <select name="selectCourse">
            <?php
                foreach($coursesArray as $index=>$course){
                    echo "<option value='".$index."'>".$course['coursename']."</option>";
                }
            ?>
        </select>
        <input type="date" name="startDate"/>
        <button type="submit">Register</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $classname = $_POST['className'];
            $courseIndex = $_POST['selectCourse'];
            $startDate = $_POST['startDate'];//to convert to time stamp
            $length = $coursesArray[$courseIndex]['length'];
            $days = 86400 * ($length / 4 * 7) - (4 * 86400);
            $endDate = date("Y-m-d",strtotime($startDate)+$days);
            $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
            if($dbcon->connect_error){
                die("Connection error");
            }else{
                $insertCmd = "INSERT INTO class_tb (start_date,end_date,class_name,course_id) VALUES ('$startDate','$endDate','$classname','".$coursesArray[$courseIndex]['course_id']."')";
                if($dbcon->query($insertCmd)){
                    echo "<h1>Class added</h1>";
                }else{
                    echo "<h1>query problem</h1>";
                }
                $dbcon->close();
            }
            
        }
    ?>
</body>
</html>