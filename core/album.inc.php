<?php
require_once '../include.php';
function addAlbum(){
    $mysqli = connect();
    insert($mysqli, "imooc_album", $arr);
}