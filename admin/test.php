<?php
require_once '../include.php';
$mysqli = connect();
$array['username'] = '101';
$array['password'] = md5(sha1(101));
$array['email'] = '101@163.com';
$id = '6';
$mes = update($mysqli, "imooc_admin", $array,"id = {$id}");
var_dump($mes);