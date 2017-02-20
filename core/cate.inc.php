<?php
require_once '../include.php';
function addCate(){
    $mysqli = connect();
    $array['cName'] = $_POST['cName']; 
    $res = insert($mysqli, 'imooc_cate', $array);
    if($res){
        $mes = "添加分类成功!<br><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看列表</a>";
    }else {
        $mes = "添加失败!<br><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看列表</a>";
    }
    return $mes;
}
addCate();