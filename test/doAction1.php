<?php
require_once '../include.php';
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
$fileInfo = $_FILES['myFile'];
$info = uploadFile($fileInfo);
echo $info;