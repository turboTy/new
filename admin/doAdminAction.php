<?php
require_once '../include.php';
$act = $_GET['act'];
$id = $_REQUEST['id'];
// var_dump($act);exit;
// $act = 'addUser';
$mysqli = connect();
if ($act == 'logout'){
    logout();
}elseif ($act == 'addAdmin'){
    $mes = addAdmin();
}elseif ($act == 'editAdmin'){
    $mes = editAdmin($id);
}elseif ($act == 'delAdmin'){
    $mes = delAdmin($id);
}elseif ($act == 'addCate'){
    $mes = addCate();
}elseif($act == 'editCate'){
    $mes = editCate($id);
}elseif ($act == 'delCate'){
    $mes = delCate($id);
}elseif ($act == 'addPro'){
    $mes = addPro();
}elseif ($act == 'editPro'){
    $mes = editPro($id);
}elseif ($act == 'delPro'){
    $mes = delPro($id);
}elseif ($act == 'delPros'){
    $mes = delPros($id);
}elseif ($act == 'addUser'){
    $mes = addUser();
}

// var_dump($mes);
// exit();
if ($mes) {
	echo $mes;
}
?>