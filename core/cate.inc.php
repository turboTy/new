<?php
require_once '../include.php';
/**增加商品分类
 * @return string
 */
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

/**得到所有分类
 * @return multitype:
 */
function getAllCate(){
    $mysqli = connect();
    $sql = "select * from imooc_cate";
    $rows = fetchAll($mysqli, $sql);
    return $rows;
}

/**编辑分类
 * @param unknown $id
 * @return string
 */
function editCate($id){
    $mysqli = connect();
    $arr['cName'] = $_POST['cName'];
    $res = update($mysqli, "imooc_cate", $arr,"id = {$id}");
    if($res){
        $mes = "修改成功!<br><a href='listCate.php'>返回商品列表</a>";
    }else{
        $mes = "修改失败,请重新尝试!<br><a href='editCate.php?id={$id}'>返回修改</a>
            |<a href='listCate.php'>查看商品列表</a>";
    }
    return $mes;
}
  
function delCate($id){
    $mysqli = connect();
    if(delete($mysqli, "imooc_cate","id = {$id}")){
        $mes = "删除成功<br><a href='listCate.php'>返回分类列表</a>";
    }else{
        $mes = "删除失败,请重新尝试!<br><a href='listCate.php'>返回分类列表</a>";
    }
    return $mes;
}

    
    
