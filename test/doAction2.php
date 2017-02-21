<?php
require_once '../include.php';
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
// $info = $_FILES;
$info = uploadInfo();
var_dump($info);