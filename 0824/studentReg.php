<?php
    include './config.php';
    $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
    if($dbcon->connect_error){
        die("Connection error");
    }else{
        $studentArray = [];
        $classArray = [];
        $studentSelect = "SELECT * FROM user_tb WHERE title='student'";
        $classSelect = "SELECT * FROM class_tb INNER JOIN course_tb ON class_tb.course_id = course_tb.course_id;";
        $result_studentSelect = $dbcon->query($studentSelect);
        while($row = $result_studentSelect->fetch_assoc()){
            array_push($studentArray,$row);
        }
        $result_classSelect = $dbcon->query($classSelect);
        while($row = $result_classSelect->fetch_assoc()){
            array_push($classArray,$row);
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <select name="studentSelect">
            <?php
                foreach($studentArray as $student){
                    echo "<option value='".$student['user_id']."'>".$student['firstName']." ".$student['lastName']."</option>";
                }
            ?>
        </select>
        <select name="classSelect">
            <?php
                foreach($classArray as $class){
                    echo "<option value='".$class['class_id']."'>".$class['class_name']." - ".$class['coursename']."</option>";
                }
            ?>
        </select>
        <button type="submit">Add</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $studentid = $_POST['studentSelect'];
            $classid = $_POST['classSelect'];
            $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
            $insertcmd = "INSERT INTO students_transaction (student_id,class_id) VALUES ($studentid,$classid)";
            if($dbcon->query($insertcmd)){
                echo "<h1>student registered</h1>";
            }else{
                echo "<h1>db error</h1>";
            }
            $dbcon->close();
        }
    // SELECT * from students_transaction INNER join 
    // (SELECT class_name,coursename,class_id from class_tb INNER join course_tb on class_tb.course_id = course_tb.course_id) as tmpview 
    // on students_transaction.class_id = tmpview.class_id
    // inner JOIN user_tb ON
    // students_transaction.student_id = user_tb.user_id
    ?>
</body>
</html>