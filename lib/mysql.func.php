<?php
/**连接数据库的操作
 * 
 */
function connect(){
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
    if (mysqli_connect_errno()){
        die('连接数据库失败Error:'.mysqli_connect_errno().":".mysqli_connect_error());
    }
    mysqli_set_charset($mysqli, "utf8");
    return $mysqli;
}

/**插入数据操作
 *insert into imooc_admin(username,password) values('aaa','123456');
 * @param unknown $table
 * @param unknown $array
 */
function insert($table,$array){
    $keys = join(",",array_keys($array));
    $vals = join(",","'".array_values($array)."'");
    $sql = "insert into {$table}($keys) values ({$vals})";
    $result = $mysqli->query($sql);
    return mysqli_insert_id($result);
}

function delete($table,$array){

}

/**修改数据操作
 * update imooc_admin set username = 'aaa' where id = '2';
 * @param unknown $table
 * @param unknown $array
 * @param string $where
 */
function update($table,$array,$where = null){
    foreach ($array as $key=>$val){
        if ($str == null){
            $sep = "";
        }else{
            $sep = ",";
        }
        $str .= $sep.$key."= '".$val."'";
    }
    $sql = "update {$table} set {$str}".(where == null?null:" where ".$where);
    $result = $mysqli->query($sql);
    $num = mysqli_affected_rows($result);
}

function select(){
    
}











