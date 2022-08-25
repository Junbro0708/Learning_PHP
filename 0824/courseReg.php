<?php include '../0822/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <input type="text" name="cName" required/>
    <input type="number" name="length" max="127" required/>
    <input type="file" name="cImg"/>
    <button type="submit">Register</button>
  </form>
  <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $arr = ['jpg', 'png', 'jpeg'];
      $cName = $_POST['cName'];
      $length = $_POST['length'];
      $sourceImg = $_FILES['cImg'];
      
      $sourceFileDetails = pathinfo($sourceImg['name']);
      $imgDest = "./img/".str_replace(" ", "_", $cName).".".$sourceFileDetails['extension'];

      print_r($sourceImg);
      print_r($sourceFileDetails);
      if(in_array($sourceFileDetails['extension'], $arr) && getimagesize($sourceImg['tmp_name'])){
        if($sourceImg['size']<1000000){
            if(move_uploaded_file($sourceImg['tmp_name'],$imgDest)){
              $dbCon = new mysqli($dbServername, $dbUsername, $dbPass, $dbName);
              if($dbCon->connect_error){
                echo "<h1>".$dbCon->connect_error."</h1>";
              }else{
                $insertCmd = "INSERT INTO `course_tb` (coursename, length, course_img) VALUES ('$cName', '$length', '$imgDest')";
                if($dbCon->query($insertCmd) === TRUE){
                  echo "<h1>Course registered</h1>";
                }else{
                  echo "<h1>Course not registered</h1>".$dbCon->error;
                }
              }
            }else{
              
            }
        }else{
            echo "<h1 style='color:red;'>Image is too big</h1>";
        }
      }else{
          echo "<h1 style='color:red;'>Please Upload an Image</h1>";
      }
    }
  ?>
</body>
</html>