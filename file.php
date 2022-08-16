<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    // r은 reading w는 writing a는 삭제안하고 쓰기
    $fileHandler = fopen('./files/name.txt', 'r') or die('Unable to open the file!!');
    // echo fread($fileHandler, filesize('./files/name.txt')); 
    //read the entire file when used with
    while(!feof($fileHandler)){
      echo fgets($fileHandler)."<br/>";
    }
    fclose($fileHandler);
  ?>
</body>
</html>