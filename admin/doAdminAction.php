<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
<?php
require_once '../include.php';
$act = $_REQUEST['act'];
// $act = 'listAdmin';
$mysqli = connect();
if ($act == 'logout'){
    logout();
}elseif ($act == 'addAdmin'){
    $mes = addAdmin();
}elseif ($act == 'listAdmin'){
    $sql = "select * from imooc_admin";
    $rows_admin = fetchAll($mysqli, $sql);
    $_SESSION['rows_admin'] = $rows_admin;
}
if ($mes) {
	echo $mes;
}
?>
</body>
</html>