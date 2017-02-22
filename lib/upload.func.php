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
 * @param string $path
 * @param array $allowExt
 * @param number $maxSize
 * @param string $imgFlag
 * @return string
 */
function uploadFiles($path='uploads',$allowExt=array("gif","jpeg","jpg","png","wbmp"),$maxSize=1500000,$imgFlag=true){
    if (!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i = 0;
    $files = uploadInfo();
    foreach ($files as $fileinfo){
        if ($fileinfo['error']===UPLOAD_ERR_OK){
            //判断文件是否超出规定大小
            if ($fileinfo['size'] > $maxSize){
                exit("文件过大!");
            }
            $ext = getExt($fileinfo['name']);
            $uniName = getUniName();
            $filename = $uniName.".".$ext;
            $destination = $path."/".$filename;
            //判断后缀名
            if (!in_array($ext, $allowExt)){
                exit("非法文件名");
            }
            if ($imgFlag){
                if (!getimagesize($fileinfo['tmp_name'])){
                    exit("不是真正的图片文件");
                }
            }
            if (is_uploaded_file($fileinfo['tmp_name'])){
                if (move_uploaded_file($fileinfo['tmp_name'], $destination)){
                    $fileinfo['name'] = $filename;
                    $mes = "上传成功!";
                    unset($fileinfo['error'],$fileinfo['tmp_name'],$fileinfo['type']);
                    $uploaded[$i] = $fileinfo;
                    $i++;
                }else{
                    exit("文件移动失败");
                }
            }else{
                exit("不是通过HTTP POST方式上传上来的");
            }
        }else{
            switch ($fileinfo['error']){
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
                    $mes = "由于PHP的扩展程序终止了上传";  //UPLOAD_ERR_EXTENSION
                    break;
            }    
        }
        echo $mes;
    }
    return $uploaded;
}


/**构建上传文件信息
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


/**得到缩略图
 * @param string $filename
 * @param string $destination
 * @param int $dst_h
 * @param int $dst_w
 * @param string $isReservedSource
 * @param real $scale
 * @return string
 */
function thumb($filename,$destination = null,$dst_h = null,$dst_w = null,$isReservedSource = false,$scale = 0.5){
    list($src_w,$src_h,$imagetype) = getimagesize($filename);
    $mime = image_type_to_mime_type($imagetype);
    $resizeFunc = str_replace("/", "createfrom", $mime);
    $outputFunc = str_replace("/", null, $mime);
    $src_image = $resizeFunc($filename);
    if (is_null($dst_w)||is_null($dst_h)){
        $dst_w = ceil($scale * $src_w);
        $dst_h = ceil($scale * $src_h);
    }
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if ($destination && !file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename = $destination==null?getUniName().".".getExt($filename):$destination;
    $outputFunc ($dst_image,$dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if ($isReservedSource) {
        unlink($filename);
    }
    return $dstFilename;
}

// function resizeImage($filename,$path='uploads'){
// //     $filename = "des_big.jpg";
//     list($src_w,$src_h,$imagetype) = getimagesize($filename);
//     $mime = image_type_to_mime_type($imagetype);   //image/jpg
//     $createFunc = str_replace("/", "createfrom", $mime);
//     $outputFunc = str_replace("/", null, $mime);
//     $src_image = $createFunc($filename);
//     $dst_50_img = imagecreatetruecolor(50, 50);
//     $dst_220_img = imagecreatetruecolor(220, 220);
//     $dst_350_img = imagecreatetruecolor(350, 350);
//     $dst_800_img = imagecreatetruecolor(800, 800);
//     imagecopyresampled($dst_50_img, $src_image, 0, 0, 0, 0, 50, 50, $src_w, $src_h);
//     imagecopyresampled($dst_220_img, $src_image, 0, 0, 0, 0, 220, 220, $src_w, $src_h);
//     imagecopyresampled($dst_350_img, $src_image, 0, 0, 0, 0, 350, 350, $src_w, $src_h);
//     imagecopyresampled($dst_800_img, $src_image, 0, 0, 0, 0, 800, 800, $src_w, $src_h);
//     mkdir("{$path}/dst_50/",0777,true);
//     mkdir("{$path}/dst_220/",0777,true);
//     mkdir("{$path}/dst_350/",0777,true);
//     mkdir("{$path}/dst_800/",0777,true);
//     $outputFunc($dst_50_img,"{$path}/dst_50/".$filename);
//     $outputFunc($dst_220_img,"{$path}/dst_220/".$filename);
//     $outputFunc($dst_350_img,"{$path}/dst_350/".$filename);
//     $outputFunc($dst_800_img,"{$path}/dst_800/".$filename);
//     imagedestroy($src_image);
//     imagedestroy($dst_50_img);
//     imagedestroy($dst_220_img);
//     imagedestroy($dst_350_img);
//     imagedestroy($dst_800_img);
// }



