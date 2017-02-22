<?php
require_once '../include.php';
function addPro(){
    $arr = $_POST;
    $arr['pubTime'] = time();
    $mysqli = connect();
    $path = "./uploads";
    $upFiles = uploadFiles($path);
    foreach ($upFiles as $upfile){
        $filename[] = $upfile['name'];
    }
    if ($filename && is_array($filename)){
        foreach ($filename as $key=>$value){
            thumb($value,$path."/img_50/".$value,50,50);
            thumb($value,$path."/img_220/".$value,220,220);
            thumb($value,$path."/img_350/".$value,350,350);
            thumb($value,$path."/img_800/".$value,800,800);
        }
    }
    $res = insert($mysqli, "imooc_pro", $arr);
    $pId = getInsertId();
    if ($res && $pId){
        foreach ($upFiles as $upfile){
            $arr1['pId'] = $pId; 
            $arr1['albumName'] = $upfile['name'];
            addAlbum($arr1);
        }
        $mes = "添加成功!<br><a href='addPro.php'>继续添加</a>|<a href='listPro.php'>返回商品列表</a>";
    }else{
        foreach ($filename as $value){
            if (file_exists($path."/img_50/".$value)){
                unlink($path."/img_50/".$value);
            }
            if (file_exists($path."/img_220/".$value)){
                unlink($path."/img_220/".$value);
            }
            if (file_exists($path."/img_350/".$value)){
                unlink($path."/img_350/".$value);
            }
            if (file_exists($path."/img_800/".$value)){
                unlink($path."/img_800/".$value);
            }
            $mes = "添加商品失败!<br><a href='addPro.php'>重新添加</a>";
        }
    }
    return $mes;  
}