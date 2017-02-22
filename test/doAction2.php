<?php
require_once '../include.php';
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
$info = $_FILES;
$fileinfo = uploadFiles();
// $infos = uploadInfo();
// foreach ($infos as $info);
// $filename = $info['name'];
// $fileinfo = thumb($filename,0.2,"uploads/thumbFiles",$isReservedSource = true);
var_dump($fileinfo);