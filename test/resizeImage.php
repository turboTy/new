<?php
// $filename = "des_big.jpg";
// $src_image = imagecreatefromjpeg($filename);
// list($src_w,$src_h) = getimagesize($filename);
// $scale = 0.5;
// $dst_w = ceil($src_w * $scale);
// $dst_h = ceil($src_h * $scale);
// $dst_image = imagecreatetruecolor($dst_w, $dst_h);
// imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
// header("content-type:image/jpeg");
// imagejpeg($dst_image,"uploads/".$filename);
// imagedestroy($src_image);
// imagedestroy($dst_image);

$filename = "des_big.jpg";
list($src_w,$src_h,$imagetype) = getimagesize($filename);
$mime = image_type_to_mime_type($imagetype);   //image/jpg
$createFunc = str_replace("/", "createfrom", $mime);
$outputFunc = str_replace("/", null, $mime);
$src_image = $createFunc($filename);
$dst_50_img = imagecreatetruecolor(50, 50);
$dst_220_img = imagecreatetruecolor(220, 220);
$dst_350_img = imagecreatetruecolor(350, 350);
$dst_800_img = imagecreatetruecolor(800, 800);
imagecopyresampled($dst_50_img, $src_image, 0, 0, 0, 0, 50, 50, $src_w, $src_h);
imagecopyresampled($dst_220_img, $src_image, 0, 0, 0, 0, 220, 220, $src_w, $src_h);
imagecopyresampled($dst_350_img, $src_image, 0, 0, 0, 0, 350, 350, $src_w, $src_h);
imagecopyresampled($dst_800_img, $src_image, 0, 0, 0, 0, 800, 800, $src_w, $src_h);
mkdir("uploads/dst_50/",0777,true);
mkdir("uploads/dst_220/",0777,true);
mkdir("uploads/dst_350/",0777,true);
mkdir("uploads/dst_800/",0777,true);
$outputFunc($dst_50_img,"uploads/dst_50/".$filename);
$outputFunc($dst_220_img,"uploads/dst_220/".$filename);
$outputFunc($dst_350_img,"uploads/dst_350/".$filename);
$outputFunc($dst_800_img,"uploads/dst_800/".$filename);
imagedestroy($src_image);
imagedestroy($dst_50_img);
imagedestroy($dst_220_img);
imagedestroy($dst_350_img);
imagedestroy($dst_800_img);


