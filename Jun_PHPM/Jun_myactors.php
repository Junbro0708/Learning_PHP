<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    li{
      padding: 1%;
    }
  </style>
</head>
<body>
  <?php
    //setting association array
    $fActors = array(
      "Andrew Garfield" => "British",
      "Dong Lee" => "South Korea",
      "Tom Holland" => "British",
      "Rachel McAdams" => "British",
      "Benedict Cumberbatch" => "British"
    );

    //displaying to html
    echo "<ol>";
    foreach($fActors as $actor => $country){
      echo "<li>Name : $actor / Country : $country</li>";
    }
    echo "</ol>";
  ?>
</body>
</html>