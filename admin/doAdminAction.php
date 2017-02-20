<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
<?php
require_once '../include.php';
$act = $_GET['act'];
$id = $_REQUEST['id'];
// $act = 'editCate';
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
}

// var_dump($mes);
// exit();
if ($mes) {
	echo $mes;
}
?>
</body>
</html>