<?php
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    function chk_file($directory){
        if(file_exists($directory)){
            return true;
        }
        return false;
    }
    function chk_file_size($fileSize,$sizeLimit){
        if($fileSize<$sizeLimit){
            return true;
        }
        return false;
    }
    function chk_file_extension($fileType,$typeRange){
        foreach($typeRange as $type){
            if($fileType!=$type){
                continue;
            }
            return true;
        }
        return false;
    }
    function Error_res($status,$error,$errorMsg){
        $response = array(
            "status"=> $status,
            "error"=>$error,
            "message"=>$errorMsg
        );
        return $response;
    }
    function upload_file($tmpAddress,$destAddress){
        if(move_uploaded_file($tmpAddress,$destAddress)){
            return Error_res("success",false,"the file ".basename($destAddress)." has been uploaded.");
        }else{
            return Error_res("error",true,"Sorry, problem when uploading your file. Try again!");
        }
    }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username = "test";
            $dest_dir = "./uploads/";
            $userdir = $username."_images";
            $response = array();
            if(!file_exists($dest_dir.$userdir)){
                mkdir($dest_dir.$userdir."/",0777);
            }

            $imgName = $_POST['imgName'];
            if(isset($_FILES['file1'])){
                $upload_target = $dest_dir.$userdir."/".strtolower($imgName.".".explode(".", basename($_FILES['file1']['name']))[1]);
                $check = getimagesize($_FILES['file1']['tmp_name']);
                if($check!==false){ 
                    if(chk_file($upload_target)){
                        $response = Error_res("error",true,"Sorry, same file has been uploaded. Try another!");
                    }elseif(chk_file_size($_FILES['file1']['size'],500000)){
                        $fileType = basename($check['mime']);
                        if(chk_file_extension($fileType,["png","gif","jpg","jpeg"])){
                            $response = upload_file($_FILES['file1']['tmp_name'],$upload_target);
                        }else{
                            $response = Error_res("error",true,"file type is not correct. Try again!");        
                        }
                    }else{
                        $response = Error_res("error",true,"file size is bigger than 500KB. Try again!");
                    }
                }else{
                    $response = Error_res("error",true,"file is not an image. Try again!");
                }
            }else if(isset($_FILES['file2'])){
                $upload_target = $dest_dir.$userdir."/".strtolower($imgName.".".explode(".", basename($_FILES['file2']['name']))[1]);
                $check = getimagesize($_FILES['file2']['tmp_name']);
                if($check!==false){ 
                    if(chk_file($upload_target)){
                        $response = Error_res("error",true,"Sorry, same file has been uploaded. Try another!");
                    }elseif(chk_file_size($_FILES['file2']['size'],500000)){
                        $fileType = basename($check['mime']);
                        if(chk_file_extension($fileType,["png","gif","jpg","jpeg"])){
                            $response = upload_file($_FILES['file2']['tmp_name'],$upload_target);
                        }else{
                            $response = Error_res("error",true,"file type is not correct. Try again!");        
                        }
                    }else{
                        $response = Error_res("error",true,"file size is bigger than 500KB. Try again!");
                    }
                }else{
                    $response = Error_res("error",true,"file is not an image. Try again!");
                }
            }
        }
        echo json_encode($response);
    ?>