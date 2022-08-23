<?php
    session_start();
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input name="fname"/>
        <input name="lname"/>
        <button type="submit">SEND INFORMATION</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if($_POST['fname']!='' && $_POST['lname']!=''){
                $_SESSION['fname'] = $_POST['fname'];
                $_SESSION['lname'] = $_POST['lname'];
                $_SESSION['session_timeout'] = time() + 30;
                header("Location: http://localhost/PHP_G1/session2.php");
            }
        }
    ?>
</body>
</html>