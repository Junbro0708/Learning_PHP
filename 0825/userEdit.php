
<?php
    include './config.php';
    session_start();
    if(!isset($_SESSION['userData'])){
        header("Location: http://localhost/PHP_G1/userAdmin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $dbcon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
            $updateCmd = "UPDATE user_tb SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', email='".$_POST['email']."', pass='".$_POST['pass']."', dob='".$_POST['dob']."', phone='".$_POST['phone']."', addr='".$_POST['addr']."', title='".$_POST['title']."' WHERE user_id=".$_POST['user_id'];
            if($dbcon->query($updateCmd) === true){
                $dbcon->close();
                unset($_SESSION['userData']);
                header("Location: http://localhost/PHP_G1/userAdmin.php");
            }
        }
    ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php
            foreach($_SESSION['userData'] as $fieldName=>$value){
                $label = $fieldName;
                switch($fieldName){
                    case "dob":
                        $type = "date";
                        $label = "date of birth";
                    break;
                    case "email":
                        $type = "email";
                    break;
                    case "phone":
                        $type = "tel";
                    break;
                    case "pass":
                        $type = "password";
                        $label = "Password";
                    break;
                    default:
                        $type = "text";
                }
                echo "<label for='$fieldName'>$label</label>";
                echo "<input type='$type' name='$fieldName' value='$value' required/></br>";
            }
        ?>
        <button type="submit">Update</button>
    </form>
</body>
</html>