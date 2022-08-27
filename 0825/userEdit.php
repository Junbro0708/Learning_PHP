
PHP (Back-end developing)

Meet
곧 마감되는 과제
기한이 곧 돌아오는 과제가 없습니다.

학생들에게 공지할 내용을 입력하세요.

공지: 'PHP Session#12'
Milad Torabi
생성일: 어제어제
PHP Session#12

passHash.php
HTML

userEdit.php
PHP

userAdmin.php
PHP

adminPanel.zip
압축된 아카이브

login.php
PHP

database1.php
HTML


공지: 'PHP Session #11'
Milad Torabi
생성일: 8월 24일8월 24일
PHP Session #11

courseReg.php
PHP

studentReg.php
PHP

classReg.php
PHP


공지: 'PHP Session #10'
Milad Torabi
생성일: 8월 23일8월 23일
PHP Session #10

login.php
PHP

config.php
PHP

database1.php
HTML

welcome.php
PHP

과제: ‘CourseWork#4’
Milad Torabi님이 새 과제 게시: CourseWork#4
생성일: 8월 23일8월 23일 (어제에 수정됨)

공지: 'Student Freelance Platform Beeznests…'
Milad Torabi
생성일: 8월 23일8월 23일
Student Freelance Platform
Beeznests help companies access the best student candidates referred by our partner colleges for their paid internship/ project/ job opportunities.
We also help companies outsource projects/tasks to students and academic teams(mentor +students).
We offer remote academic support to the business community.

Beeznests
https://www.beeznests.com/


공지: 'PHP Session #9'
Milad Torabi
생성일: 8월 22일8월 22일
PHP Session #9

cookies.php
PHP

config.php
PHP

session2.php
PHP

session1.php
PHP

과제: ‘CourseWork#3’
Milad Torabi님이 새 과제 게시: CourseWork#3
생성일: 8월 18일8월 18일 (8월 18일에 수정됨)
과제: ‘Midcourse Exam’
Milad Torabi님이 새 과제 게시: Midcourse Exam
생성일: 8월 18일8월 18일

공지: 'PHP Session#7'
Milad Torabi
생성일: 8월 17일8월 17일 (8월 17일에 수정됨)
PHP Session#7

fileUploadFunctions.php
HTML

fileUpload.php
HTML

json.php
HTML

과제: ‘Practice Question #3’
Milad Torabi님이 새 과제 게시: Practice Question #3
생성일: 8월 16일8월 16일
스트림
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