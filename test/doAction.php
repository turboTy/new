<?php
require_once '../include.php';
header("content-type:text/html;charset=utf-8");
// $arr = $_POST;
// var_dump($_FILES);
$filename = $_FILES['myFile']['name'];
$type = $_FILES['myFile']['type'];
$tmp_name = $_FILES['myFile']['tmp_name'];
$error = $_FILES['myFile']['error'];
$size = $_FILES['myFile']['size'];
// $allowExt = array("gif","jpg","jpeg","png","wbmp");
// $imgFlag= true;
// $maxSize = 1512000;
if ($error == 0){
    $destination = "uploads/".$filename;
    if (is_uploaded_file($tmp_name)){
        if (move_uploaded_file($tmp_name, $destination)){
            $mes = "文件上传成功";
        }else{
            $mes = "文件移动失败";
        }
    }else{
        $mes = "不是通过HTTP POST方式传递上来的";
    }
}else{
    switch ($error){
        case 1:
            $mes = "超过配置文件规定的上传文件的大小";//UPLOAD_ERR_INI_SIZE
            break;
        case 2:
            $mes = "超过配置文件规定的表单大小"; //UPLOAD_ERR_FORM_SIZE
            break;
        case 3:
            $mes = "文件部分被上传"; //UPLOAD_ERR_PARTIAL
            break;
        case 4:
            $mes = "没有文件"; //UPLOAD_ERR_NO_FILE
            break;
        case 6:
            $mes = "没有临时目录";//UPLOAD_ERR_NO_TMP_DIR;
            break;
        case 7:
            $mes = "文件不可写"; //UPLOAD_ERR_CANT_WRITE
            break;
        case 8:
            $mes = "由于PHP的扩展程序终止了上传"; //UPLOAD_ERR_EXTENSION
            break;
    }
}
echo $mes;