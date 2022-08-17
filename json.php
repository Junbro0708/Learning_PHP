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
        // $students = ["Henry"=>"Korea","Mamiko"=>"Japan","Mat"=>"brazil"];
        // echo json_encode($students);
        // $jsonObj = '[{"first_name":"Wyndham","last_name":"Gecke"},
        // {"first_name":"Hank","last_name":"Clavering"}]';
        // $obj = json_decode($jsonObj);
        // print_r($obj);
        // echo $obj[0]->last_name;
        $fileHandler = fopen('./files/MOCK_DATA.json','r');
        $data = fread($fileHandler,filesize('./files/MOCK_DATA.json'));
        fclose($fileHandler);
        $studentData = json_decode($data);
        $sum = 0;
        $max = 0;
        $min = 100;
        $maxIdx;
        $minIdx;
        echo "<table><tr><th>FirstName</th><th>lastName</th><th>Score</th></tr>";
        foreach($studentData as $student){
            echo "<tr><td>$student->first_name</td><td>$student->last_name</td><td>$student->grade</td></tr>";
            $sum += $student->grade;
            if($max<=$student->grade){
                $max = $student->grade;
                $maxIdx = $student->first_name." ".$student->last_name;
            }
            if($min>$student->grade){
                $min = $student->grade;
                $minIdx = $student->first_name." ".$student->last_name;
            }
        }
        echo "</table>";
        $avg = $sum / count($studentData);
        echo "<h1>Average is: $avg, Max is: $max, Min is: $min</h1>";
        echo "<h1>Max student is: $maxIdx Min student is: $minIdx</h1>";
    ?>
</body>
</html>