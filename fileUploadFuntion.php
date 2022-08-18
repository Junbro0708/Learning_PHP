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
        $path = pathinfo('./files/customers/Mamiko.txt'); // dirname basename extension filename
        print_r($path);
        echo "</br>";
        //echo $path['extension'];
        $basename = basename('./files/customers/Mamiko.txt','.txt');
        print_r($basename);
        echo "</br>";
        $image_info = getimagesize('./files/MOCK_DATA.json');
        print_r($image_info);
    ?>
</body>
</html>