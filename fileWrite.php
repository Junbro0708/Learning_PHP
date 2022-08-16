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
    $fileHandler = fopen('./files/Jun.txt', 'a+');
    fwrite($fileHandler, "Jun Hyeong");
    fwrite($fileHandler, "Park");
    fwrite($fileHandler, "South Korea\n");
    rewind($fileHandler);

    echo fread($fileHandler, filesize('./files/Jun.txt'));
    fclose($fileHandler);
  ?>
</body>
</html>