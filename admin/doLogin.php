<?php
// require_once '../include.php';
$username = $_POST['username'];
$password = sha1(md5($_POST['password']));
$verify1 = $_POST['verify'];
$verify = $_SESSION['verify'];
exit();
if ($verify == $verify1){
    $sql = "select * from imooc_admin where username = '{$username}' and password = '{$password}'";
    $row = checkAdmin($sql);
    if ($row){
        alertMes("登录成功", "./test.php");
    }else{
        alertMes("登录失败", "./login_admin.php");
    }
}else{
    alertMes("验证码输入有误,请重新输入", "./login_admin.php");
}