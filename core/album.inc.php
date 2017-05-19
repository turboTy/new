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

/**根据商品id获取图片
 * @param int $id
 * @return multitype:
 */
function getImgByProId($id){
    $mysqli = connect();
    $sql = "select a.albumPath from imooc_album a where pId ={$id}";
    $row = fetchAll($mysqli, $sql);
    return $row;
}

function getOneAlbum($pId){
    $mysqli = connect();
    $sql = "select * from imooc_album where pid ={$pId}";
    $res = fetchOne($mysqli, $sql);
    return $res;
}
