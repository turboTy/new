<?php
require_once '../include.php';
$username = $_POST['username'];
$password =md5(sha1($_POST['password']));
$verify1 = strtolower($_POST['verify']);
$verify = strtolower($_SESSION['verify']);
if ($verify == $verify1){
    $sql = "select * from imooc_admin where username = '{$username}' and password = '{$password}'";
    $row = checkAdmin($sql);
    if ($row){
        alertMes("登录成功", "test.php");
    }else{
        alertMes("登录失败", "login_admin.php");
    }
}else{
    alertMes("验证码输入有误,请重新输入", "login_admin.php");
}