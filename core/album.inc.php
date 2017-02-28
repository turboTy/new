<?php
// require_once '../include.php';
/**添加图片
 * @param array $arr
 * @return string
 */
function addAlbum($arr){
    $mysqli = connect();
    if(insert($mysqli, "imooc_album", $arr)){
        $mes = "添加图片成功!";
    }else{
        $mes = "添加图片失败";
    }
    return $mes;
}

function getImgByProId($id){
    $mysqli = connect();
    $sql = "select a.albumPath from imooc_album a where pId ={$id}";
    $row = fetchAll($mysqli, $sql);
    return $row;
}
