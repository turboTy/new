<?php
/**得到所有的用户信息
 * @return multitype:
 */
function getAllUser(){
    $mysqli = connect();
    $sql = "select * from imooc_user";
    $rows = fetchAll($mysqli, $sql);
    return $rows;
}


/**增加用户
 * @return string
 */
function addUser(){
    $mysqli = connect();
    $arr['username'] = $_POST['username'];
    $arr['password'] = sha1(md5($_POST['password']));
    $arr['sex'] = $_POST['sex'];
    $arr['face'] = $_POST['email'];
    $arr['regTime'] = time();
    $mes = checkRes();
    if (isset($mes)){
        return $mes;
        exit();
    }else{
        if (insert($mysqli, imooc_user, $arr)){
            $mes = '{"add":true,"add_msg":"添加成功"}';
        }else{
            $mes = '{"add":false,"add_msg":"添加失败,请重新尝试"}';
        }
        return $mes;
    }
}

/**检测用户名、密码是否合法，两次输入密码是否相同
 * @return string
 */
function checkRes(){
    $arr['password'] = sha1(md5($_POST['password']));
    $checkPwd= sha1(md5($_POST['checkPwd']));
    if (!preg_match('/^[a-zA-Z][\w]{3,15}$/',$_POST['username'])){
        $mes = "{\"user_err\":true,\"user_msg\":\"用户名请输入以字母开头的4-16个字符,包括数字、字母以及下划线‘_’\"}";
        return $mes;
    }else if (!preg_match('/[0-9a-zA-Z_,]{4,16}/', $_POST['password'])) {
        $mes = "{\"pwd_err\":true,\"pwd_msg\":\"密码请输入4-16个字符,可以使用数字、字母以及‘_’‘,’\"}";
        return $mes;
    }else if ($arr['password'] != $checkPwd){
        $mes = '{"checkPwd":true,"msg":"两次密码不相同,请重新输入"}';
        return $mes;
    }
}











