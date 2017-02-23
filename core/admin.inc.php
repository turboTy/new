<?php
require_once '../include.php';
/**检测管理员是否存在
 * @param unknown $sql
 * @return Number
 */
function checkAdmin($sql){
    $mysqli = connect();
    return fetchOne($mysqli,$sql);
}

/**检测管理员是否登录
 * 
 */
function checkLogined(){
//     if ((!isset($_SESSION['adminId']) || $_SESSION['adminId'] == "") 
//             && (!isset($_COOKIE['adminId']) || $_COOKIE['adminId'] == "")){
    if ($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == ""){
        alertMes("请先登录", "login_admin.php");
    }
}

/**添加管理员
 * @return string
 */
function addAdmin(){
    $mysqli = connect();
    $arr['username'] = $_POST['username'];
    $arr['password'] = md5(sha1($_POST['password']));
    $arr['email'] = $_POST['email'];
    if(insert($mysqli,imooc_admin,$arr)){
        $mes = "管理员添加成功!<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "管理员添加失败!<br><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

/**编辑管理员信息
 * @param unknown $id
 * @return string
 */
function editAdmin($id){
    $mysqli = connect();
    $arr['username'] = $_POST['username'];
    $arr['password'] = md5(sha1($_POST['password']));
    $arr['email'] = $_POST['email'];
    $res = update($mysqli, "imooc_admin", $arr,"id = {$id}");
    if($res){
        $mes = "修改成功!<br><a href='listAdmin.php'>返回管理员列表</a>";
    }else{
        $mes = "修改失败!<br><a href='editAdmin.php'>重新修改</a>";
    }
    return $mes;
}

/**删除管理员
 * @param  int $id
 * @return string
 */
function delAdmin($id){
    $mysqli = connect();
    if(delete($mysqli, "imooc_admin","id = {$id}")){
        $mes = "删除成功!<br><a href='listAdmin.php'>返回管理员列表</a>";
    }else{
        $mes = "删除失败!<br><a href='listAdmin.php'>重新尝试</a>";
    }
    return $mes;
}

/**得到所有的管理员
 * @return mixed
 */
function getAllAdmin(){
    $mysqli = connect();
    $sql = "select * from imooc_admin";
    $rows = fetchAll($mysqli, $sql);
    return $rows;
}

/**
 * 注销管理员
 */
function logout(){
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie('adminName',"",time()-1);
    }
    if (isset($_COOKIE['adminId'])){
        setcookie('adminId',"",time()-1);
    }
    session_destroy();
    header("location:login_admin.php");
}

/**得到管理员列表的当前页码($page),总页码($totalPage),总记录条数($totalRows)以及当前页码下的管理员信息($row);
 * @param number $pageSize
 * @return Ambigous <number, unknown>
 */
function getAdminByPage($pageSize = 3,$table,$where = null){
    $mysqli = connect();
    $sql = "select * from {$table}{$where}";
//     var_dump($sql);exit;
    $rows = fetchAll($mysqli, $sql);
    $url = $_SERVER['PHP_SELF'];
    $totalRows = getResultNum($mysqli, $sql);
    $totalPage = ceil($totalRows/$pageSize);
    // $page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
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
    $sql2 = "select * from {$table}{$where} order by id asc limit {$offset}, {$pageSize}";
    $row = fetchAll($mysqli, $sql2);
    $arr['page'] = $page;
    $arr['totalPage'] = $totalPage;
    $arr['totalRows'] = $totalRows;
    $arr['row'] = $row;
    return $arr;
}
