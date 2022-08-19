<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    h2{
      width: 50%;
      text-align: center;
    }
    table{
      width: 50%;
      border-collapse: collapse;
    }
    thead{
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
  </style>
</head>
<body>
  <?php
    //setting association array
    $cities = array(
      "Okinawa" => "Japan",
      "Mumbai" => "India",
      "Toronto" => "Canada",
      "Brasilia" => "Brazil",
      "Canberra" => "Australia",
    );

    //displaying table to html
    echo "<h2>Where I want to go a travel</h2>";
    echo "<table><thead><th>City</th><th>Country</th></thead>";
    echo "<tbody>";
    foreach($cities as $city => $country){
      echo "<tr><td>$city</td><td>$country</td></tr>";
    }
    echo "</td></tbody>";
  ?>
</body>
</html>