<?php
require_once '../include.php';
header("content-type:text/html;charset=utf-8");
/**上传单个文件
 * @param array $fileInfo
 * @param number $maxSize
 * @param array $allowExt
 * @param string $imgFlag
 * @return string
 */
function uploadFile($fileInfo,$maxSize = 1500000,$allowExt = array("gif","png","jpg","jpeg","wbmp"),$imgFlag = true){
    $filename = $fileInfo['name'];
    $type = $fileInfo['type'];
    $tmp_name = $fileInfo['tmp_name'];
    $error = $fileInfo['error'];
    $size = $fileInfo['size'];
    $ext = getExt($filename);    
    $filename = getUniName().".".$ext;   
    if ($error == 0){
        if (!in_array($ext, $allowExt)){
            exit("非法文件类型");
        }
        if ($size > $maxSize){
            exit("超出规定文件大小");
        }
        $path = 'uploads';
        if (!file_exists($path)){
            mkdir($path,0777,true);
        }
        $destination = $path."/".$filename;
        if (!$imgFlag){
            $checkImg = getimagesize($tmp_name);
            if (!$checkImg){
                exit("不是真正的图片文件");
            }
        }
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
    return $mes;
}

/**上传多个文件
 * @return array
 */
function uploadInfo(){
    $i = 0;
    foreach($_FILES as $v){
        if (is_string($v['name'])){
            $info[$i] = $v;
            $i++;
        }else{
            foreach ($v['name'] as $key=>$val){
                $info[$i]['name'] = $v['name'][$i];
                $info[$i]['type'] = $v['type'][$i];
                $info[$i]['size'] = $v['size'][$i];
                $info[$i]['tmp_name'] = $v['tmp_name'][$i];
                $info[$i]['error'] = $v['error'][$i];
                $i++;
            }
        }
    }
    return $info;
}




