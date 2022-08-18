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
        <input type="file" name="profileImage"/>
        <button type="submit">Upload</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $arr = ["jpg", "jpeg", "bmp", "png"];
            $destDir = './files/img/';
            $sourceFile = $_FILES['profileImage']; // name type tmp_name error size
            print_r($sourceFile);
            $sourceFileDetails = pathinfo($sourceFile['name']);
            print_r($sourceFileDetails);
            if(in_array($sourceFileDetails['extension'], $arr) && getimagesize($sourceFile['tmp_name'])){
                    if($sourceFile['size']<1000000){
                        if(move_uploaded_file($sourceFile['tmp_name'],$destDir.$sourceFile['name'])){
                            echo "<h1 style='color:green;'>".$sourceFileDetails['filename']." has been uploaded!!!!</h1>";
                        }else{
                            echo "<h1 style='color:red;'>".$sourceFileDetails['filename']." error uploading.SAD</h1>";
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