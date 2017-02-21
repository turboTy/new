<?php
/**生成验证码字符
 * @param number $type
 * @param number $length
 * @return string
 */
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

/**获取唯一文件名
 * @return string
 */
function getUniName(){
    return md5(uniqid(microtime(true),true));
}

/**得到文件的后缀名
 * @param unknown $filename
 * @return string
 */
function getExt($filename){
    return strtolower(end(explode(".", $filename)));
}


