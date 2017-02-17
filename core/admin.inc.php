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