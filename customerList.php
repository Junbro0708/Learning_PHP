<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .customerLink{
            padding: 10px;
            border: 1px solid black;
            text-decoration: none;
            color: black;
            margin: 5px;
        }
        .customerLink:hover{
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h1>Customer List</h1>
    <?php
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $customerDirectory = scandir('./files/customers');
            foreach($customerDirectory as $fileName){
                if($fileName=="." || $fileName==".."){
                    continue;
                }
                $cName = substr($fileName,0,strpos($fileName,"."));
                echo "<a href='".$_SERVER['PHP_SELF']."?cName=$cName' class='customerLink'>$cName</a>";
            }
        }
        if(isset($_GET['cName'])){
            $cName = $_GET['cName'];
            $addr = "./files/customers/$cName.txt";
            $fileHandler = fopen($addr,'r');
            echo fread($fileHandler,filesize($addr));
            fclose($fileHandler);
        }
    ?>
</body>
</html>