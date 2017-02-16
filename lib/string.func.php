<?php
function buildRandomString($type = 1, $length = 4){
    if ($type == 1){
        $chars = join("",range(0, 9));
    }
    if ($type == 2){
        $chars = join("",array_merge(range("A", "Z"),range("a", "z")));
    }
    if ($type == 3){
        $chars = join("", array_merge(range(0, 9),range("a", "z"),range("A", "Z")));
    }
    $chars = str_shuffle($chars);
    if ($length > strlen($chars)){
        exit("字符串长度不够");
    }
    return substr($chars, 0, $length);
}








