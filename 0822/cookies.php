<?php
    include "./config.php";
    createCookie('fname','Milad',2);
    createCookie('lname','Torabi',2);
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
    <?php
        if(isset($_COOKIE['fname']) && isset($_COOKIE['lname'])){
            $fname = $_COOKIE['fname'];
            $lname = $_COOKIE['lname'];
            echo "<h1>My name is: $fname $lname</h1>";
        }else{
            echo "<h1>WELCOME</h1>";
        }
    ?>
</body>
</html>