<?php
require_once '../include.php';
/**新增商品
 * @return string
 */
function addPro(){
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./uploads";
    $upFiles = uploadFiles($path);
    foreach ($upFiles as $upfile){
        $filename[] = $upfile['name'];
    }
    if ($filename && is_array($filename)){
        foreach ($filename as $key=>$value){
            thumb($path."/".$value,$path."/img_50/".$value,50,50);
            thumb($path."/".$value,$path."/img_220/".$value,220,220);
            thumb($path."/".$value,$path."/img_350/".$value,350,350);
            thumb($path."/".$value,$path."/img_800/".$value,800,800);
        }
    }
    $mysqli = connect();
    $pId = insert($mysqli,"imooc_pro", $arr);
    if ($pId){
        foreach ($upFiles as $upfile){
            $arr1['pid'] = $pId; 
            $arr1['albumPath'] = $upfile['name'];
            $msg = addAlbum($arr1);
        }
        $mes = "添加成功!<br><a href='addPro.php'>继续添加</a>|<a href='listPro.php'>返回商品列表</a>";
    }else{
        foreach ($filename as $key => $value){
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

/**得到所有的商品信息
 * @return multitype:
 */
function getAllPro(){
    $mysqli = connect();
    $sql = "select * from imooc_pro";
    $res = fetchAll($mysqli, $sql);
    return $res;
}


/**得到商品信息页面的页码
 * @param number $pageSize
 * @param unknown $table
 * @param string $where
 * @return Ambigous <number, unknown>
 */
function getProByPage($pageSize = 3,$sql){
    $mysqli = connect();
    $rows = fetchAll($mysqli, $sql);
    $url = $_SERVER['PHP_SELF'];
    $totalRows = getResultNum($mysqli, $sql);
    $totalPage = ceil($totalRows/$pageSize);
    if ($_REQUEST['page']){
        $page = $_REQUEST['page'];
    }else{
        $page = 1;
    }
    if ($page<1 || $page == null || !is_numeric($page)){
        $page = 1;
    }elseif ($page>$totalPage){
        $page = $totalPage;
    }
    $offset = $pageSize * ($page-1);
    $sql2 = $sql." order by id asc limit {$offset}, {$pageSize}";
    $row = fetchAll($mysqli, $sql2);
    $arr['page'] = $page;
    $arr['totalPage'] = $totalPage;
    $arr['totalRows'] = $totalRows;
    $arr['row'] = $row;
    return $arr;
}

/**编辑商品分类信息
 * @param  int $id
 * @return string
 */
function editPro($id){
    $mysqli = connect();
    $array = $_POST;
    $res = update($mysqli, "imooc_pro", $array," id = {$id}");
    if ($res){
        $mes = "修改成功<br><a href='listPro.php'>返回列表</a>";
    }else{
        $mes = "修改失败<br><a href='editPro.php?id=$id'>返回修改</a>|<a href='listPro.php'>返回列表</a>";
    }
    return $mes;
}

/**删除商品信息
 * @param int $id
 * @return string
 */
function delPro($id){
    $mysqli = connect();
    foreach ($id as $cId):
        $result = delete($mysqli, 'imooc_pro'," id = '$cId'");
    endforeach;
    if ($result){
        $mes = "删除成功<br><a href='listPro.php'>返回列表</a>";
    }else{
        $mes = "删除失败<br><a href='listPro.php'>重新删除</a>";
    }
    return $mes;
}

function checkProExist($id){
    $mysqli = connect();
    $sql = "select * from imooc_pro where cId = '$id'";
    $res = fetchAll($mysqli, $sql);
    return $res;
}
