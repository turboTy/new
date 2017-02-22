<?php
require_once 'upload.func.php';
require_once '../include.php';
header("content-type:text/html;charset=ytf-8");
$infos = uploadInfo();
foreach ($infos as $info);
$dstFilename = thumb($filename = $info['name'],"uploads/thumbFiles/".$filename,50,50);
