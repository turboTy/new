<?php
require_once '../include.php';
/**链接数据库的操作
 * @return mysqli
 * return resource
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
 * @param string $table
 * @param array $array
 * return number
 */
function insert($mysqli,$table,$array){
    $keys = join(",",array_keys($array));
    $vals = "'".join("','",array_values($array))."'";
    $sql = "insert into {$table}($keys) values ({$vals})";
    $result = $mysqli->query($sql);
    return mysqli_insert_id($mysqli);
}

/**删除数据操作
 * delete from imooc_admin where id = '2';
 * @param string $table
 * @param array $array
 * return number
 */
function delete($mysqli,$table,$where = null){
    $sql = "delete from {$table}".($where == null?null:" where ".$where);   
    $result = $mysqli->query($sql);
    return mysqli_affected_rows($result);
}

/**修改数据操作
 * update imooc_admin set username = 'aaa' where id = '2';
 * @param string $table
 * @param array $array
 * @param string $where
 * return number
 */
function update($mysqli,$table,$array,$where = null,$str = null){
    foreach ($array as $key=>$val){
        if ($str == null){
            $sep = "";
        }else{
            $sep = ",";
        }
        $str .= $sep.$key."= '".$val."'";
    }
    $sql = "update {$table} set {$str}".($where == null?null:" where ".$where);
    $result = $mysqli->query($sql);
    $num = mysqli_affected_rows($result);
}

/**查询一条记录
 * @param string $sql
 * @param string $result_type
 * @return Number
 */
function fetchOne($mysqli,$sql,$result_type = MYSQLI_ASSOC){
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result,$result_type);
    return $row;
}

/**查询多条记录
 * @param string $sql
 * @param string $result_type
 * @return array
 */
function fetchAll($mysqli,$sql,$result_type = MYSQLI_ASSOC){
    $result = $mysqli->query($sql);
    while (@$row = mysqli_fetch_array($result,$result_type)){
        $rows[] = $row;
    }
    return $rows;
}

/**得到结果集中的记录条数
 * @param string $sql
 * @return Number
 */
function getResultNum($mysqli,$sql){
    $result = $mysqli->query($sql);
    $row = mysqli_num_rows($result);
    return $row;
}










