<?php
require_once '../include.php';
$username = $_POST['username'];
$username = addslashes($username);   //防止sql注入
$password =md5(sha1($_POST['password']));
$verify1 = strtolower($_POST['verify']);
$verify = strtolower($_SESSION['verify']);
$autoFlag = $_POST['autoFlag'];
if ($_POST['verify']) {
    if ($verify == $verify1){
        $sql = "select * from imooc_admin where username = '{$username}' and password = '{$password}'";
        $row = checkAdmin($sql);
        if ($row) {
            $_SESSION['adminName'] = $row['username'];
            $_SESSION['adminId'] = $row['id'];
            if ($autoFlag) {
                setcookie("adminName",$username,time()+7*24*3600);
                setcookie("adminId",$row['id'],time()+7*24*3600);
            }
            echo "{\"pwd\": true,\"pwdMsg\": \"登录成功\"}";
        }else{
            echo "{\"pwd\": false,\"pwdMsg\": \"登陆失败,请核对管理员名称和密码\"}";
        }
    }else{
        echo "{\"verify\": true,\"verifyMsg\": \"验证码输入有误,请重新输入\"}";
    }
}


//未使用ajax之前的判断语句
//     if ($row){
//         $_SESSION['adminName'] = $row['username'];
//         $_SESSION['adminId'] = $row['id'];
//         if ($autoFlag){
//             setcookie("adminName", $username, time()+7*24*3600);
//             setcookie("adminId", $row['id'], time()+7*24*3600);
//         }
//         alertMes("登录成功", "index.php");
//     }else{
//         alertMes("登录失败*", "login_admin.php");
//     }
// }else{
//     alertMes("验证码输入有误,请重新输入", "login_admin.php");
// }