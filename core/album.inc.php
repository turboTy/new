<?php
require_once '../include.php';
function addAlbum($arr){
    $mysqli = connect();
    if(insert($mysqli, "imooc_album", $arr)){
        $mes = "添加图片成功!";
    }else{
        $mes = "添加图片失败";
    }
    return $mes;
}