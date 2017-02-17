<?php
require_once '../include.php';
function checkAdmin($sql){
    $mysqli = connect();
    return fetchOne($mysqli,$sql);
}