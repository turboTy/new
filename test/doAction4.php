<?php
require_once '../include.php';
$infos = uploadInfo();

// foreach ($infos as $info){
//     print_r($info);
//     echo "<br>";
// }
$arr = $_POST;
$arr['pubTime'] = time();
// var_dump($arr);
echo "<hr>";
$res = insert("imooc_pro", $arr);
var_dump($res);
echo "<hr>";
if($res){
    echo "success";
}else{
    echo "fail";
}
exit;
    
