<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .gallery{
      display: flex;
      column-gap: 15px;
    }
    img{
      width: 250px;
      height: 250px;
    }
  </style>
</head>
<body>
  <div class="gallery">
  <?php
    $imgName = [];
    $addr = "./files/img/";
    $imgDirectory = scandir('./files/img');
    foreach($imgDirectory as $fileName){
        if($fileName=="." || $fileName==".."){
            continue;
        }
        array_push($imgName, substr($fileName,0,strpos($fileName,".")));
    }
    if(count($imgDirectory) == 2){
      echo "<h1>No Image has been uploaded yet</h1>";
    }else{
      foreach($imgName as $name){
        if(!empty($name)){
          echo "<img src='$addr".$name.".jpg'></img>";
        }
      }
    }
  ?>
  </div>
</body>
</html>