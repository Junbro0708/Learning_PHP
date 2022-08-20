<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table{
      width: 50%;
      border-collapse: collapse;
    }
    thead{
      background-color: whitesmoke;
    }
    tr:last-child td{
      border-bottom: none;
    }
    tbody > tr{
      cursor: pointer;
    }
    tbody > tr:hover{
      background-color: whitesmoke;
    }
    th, td{
      text-align: center;
      padding: 1%;
      border-bottom: 1px solid gainsboro;
      border-right: 1px solid gainsboro;
    }
    th:last-child, td:last-child{
      border-right: none;
    }
    body{
      display: flex;
      column-gap: 3%;
    }
  </style>
</head> 
<body>
  <?php
    //setting path
    $addr = './myfiles/sell_report.json';
    $fileHandler = fopen($addr,'r');
    $data = fread($fileHandler,filesize($addr));
    fclose($fileHandler);
    
    //converting json file to array
    $reports = json_decode($data);

    //displaying table
    echo "<table><thead><tr><th>#</th><th>Item Name</th><th>Total Sale Price</th></tr></thead>";
    echo "<tbody>";

    //setting variables
    $average = 0;
    $min = 99999;
    $minName = "";
    $max = 0;
    $maxName = "";

    //extracting values
    foreach($reports as $report){
      echo "<tr>";
      $sum = 0;
      foreach($report as $key => $value){
        switch($key){
          case "id":
            echo "<td>$value</td>";
            break;
          case "item_name":
            echo "<td>$value</td>";
            break;
          case "price":
            $sum = (int)$value;
            break;
          case "amount":
            $sum *= (int)$value;
            $average += $sum;
            echo "<td>$sum"." $"."</td>";
            break;
        }
        
        if((int)$report->price > $max){
          $max = $report->price;
          $maxName = $report->item_name;
        }
        if((int)$report->price < $min){
          $min = $report->price;
          $minName = $report->item_name;
        }
      }
      echo "</tr>";
    }

    //displaying
    echo "</tbody>";
    echo "</table>";

    echo "<div>";
    echo "<h2>Average Sale Price is ".($average / count($reports))." $</h2>";
    echo "<h2>Minimum Sale Price is ".$min." $ / $minName</h2>";
    echo "<h2>Maximum Sale Price is ".$max." $ / $maxName</h2>";
    echo "</div>";
  ?>
</body>
</html>