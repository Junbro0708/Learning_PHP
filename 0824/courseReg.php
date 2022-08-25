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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <input name="cName" required/>
        <input name="length" type="number" max="127" required />
        <input name="cImg" type="file" />
        <button type="submit">Register</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $cName = $_POST['cName'];
            $length = $_POST['length'];
            $sourceImg = $_FILES['cImg'];
            $imgExtension = pathinfo($sourceImg['name'])['extension'];
            $imgDest = "./img/".str_replace(" ","_",$cName)."img.".$imgExtension;
            if($imgExtension == "jpg" && getimagesize($sourceImg['tmp_name'])){
                if($sourceImg['size']<400000){
                    if(move_uploaded_file($sourceImg['tmp_name'],$imgDest)){
                        $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
                        if($dbcon->connect_error){
                            echo "<h1>".$dbcon->connect_error."</h1>";
                        }else{
                            $insertCmd = "INSERT INTO course_tb (coursename,length,course_img) VALUES ('$cName',$length,'$imgDest')";
                            if($dbcon->query($insertCmd)===TRUE){
                                echo "<h1>Course registered</h1>";
                            }else{
                                echo "<h1>Course not registered</h1>".$dbcon->error;
                            }
                        }
                    }else{
                        echo "<h1>Can't upload the image</h1>";
                    }
                }
            }
            
            
        }
    ?>
</body>
</html>