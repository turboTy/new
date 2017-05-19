<?php 
// $url = "http://www.sina.com.cn/abc/de/fg.php?id=1";
// $urlArr = parse_url($url);
// $urlStr = $urlArr['path'];
// $arr = explode(".", $urlStr);
// echo $arr[1];

// $arr = explode("?", $url);
// $str = substr($arr[0],-4);
// echo $str;
$a = '1234567890';
$b = strrev($a);
$b = chunk_split($b,3,",");
echo substr(strrev($b),-13);
?>