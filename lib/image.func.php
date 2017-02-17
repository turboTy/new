<?php
//通过GD库做验证码
//创建画布
function verifyImage($type=3,$length=4,$pixel=10,$line=2,$sess_name = "verify"){
    session_start();
    include_once 'string.func.php';
    $width = 80;
    $height = 28;
    $type = 3;
    $length = 4;
    $image = imagecreatetruecolor($width,$height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    //用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);   
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array("MSYH.TTF","MSYHBD.TTF","SIMKAI.TTF","SIMLI.TTF","SIMSUN.TTC","SIMYOU.TTF");
    //将生成的字符串写到画布上
    for ($i = 0;$i < $length;$i++){
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(16, 28);
        $fontfile = "../fonts/".$fontfiles[mt_rand(0, count($fontfiles) - 1)];
        $color = imagecolorallocate($image, mt_rand(20, 255), mt_rand(0, 200), mt_rand(0, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    //添加干扰点
    if ($pixel){
        for ($i = 0; $i < 10; $i++){
            imagesetpixel($image, mt_rand(1, $width - 1), mt_rand(1, $height - 1), $black);
        }
    }
    //添加干扰线
    if ($line){
        for ($i = 0; $i < 1; $i++){
            imageline($image, mt_rand(1, $width-1), mt_rand(1, $height), mt_rand(1, $width-1), 
                mt_rand(1, $height), $black);
        }
    }
    //生成验证码
    header("content-type: image/gif");
    imagegif($image);
    imagedestroy($image);
}
