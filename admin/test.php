<?php 
require_once '../include.php';
$mysqli = connect();
$arr['username'] = $_POST['username'];
$arr['password'] = sha1(md5($_POST['password']));
$arr['sex'] = $_POST['sex'];
$arr['face'] = $_POST['email'];
$arr['regTime'] = time();
$rows=insert($mysqli, imooc_user, $arr);
if ($rows){
    echo '{"a":true,"b":"成功"}';
}else{
    echo '{"a":false,"b":"'.$rows.'失败"}';
}
?>