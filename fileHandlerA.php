<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="fname" placeholder="Write your NAMEEEE"/>
        <input type="text" name="lname" placeholder="Write your LastNAMEEEE"/>
        <input type="text" name="desire" placeholder="Write your DESIREE"/>
        <button type="submit">Write your wish</button>
    </form>
    <?php
        class dummyUser{
            private $fname;
            private $lname;
            private $desire;
            function __construct($fname,$lname,$desire)
            {
                $this->fname = $fname;
                $this->lname = $lname;
                $this->desire = $desire;
            }
            function toFile(){
                return "FirstName: $this->fname \nLastName: $this->lname \nDesire: $this->desire";
            }
        }
        function mkFile($fileAddr,$data){
            $fileHandler = fopen($fileAddr,'w') or die("Unable to create the file");
            fwrite($fileHandler,$data);
            fclose($fileHandler);
        }
        function readPrev($fileAddr){
            echo "<h1>Your previous desire was:</h1>";
            echo "<table><thead><th>First Name</th><th>Last Name</th><th>Desire</th></thead>";
            $fileHandler = fopen($fileAddr,'r');
            echo "<tbody><tr>";
            while(!feof($fileHandler)){
              $str = fgets($fileHandler);
              echo "<td>".substr($str, strpos($str, ": ")+2)."</td>";
            }
            fclose($fileHandler);
            echo "</tr></tbody></table>";
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $desire = $_POST['desire'];
            $user = new dummyUser($fname,$lname,$desire);
            $fileAddr = "./files/$fname"."_"."$lname";
            if(file_exists($fileAddr)){
                readPrev($fileAddr."/$fname$lname.txt");
                mkFile($fileAddr."/$fname$lname.txt",$user->toFile());
            }else{
                if(mkdir($fileAddr)){
                    mkFile($fileAddr."/$fname$lname.txt",$user->toFile());
                }else{
                    echo "Error creating the directory.";
                }
            }
            

        }
    ?>
</body>
</html>