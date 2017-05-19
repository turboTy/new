<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加管理员</title>
</head>
<body>
<?php 
require_once '../include.php';
$id = $_REQUEST['id'];
// var_dump($id);
// exit();
$mysqli = connect();
$sql = "select * from imooc_admin where id = {$id}";
$arr = fetchOne($mysqli, $sql);
?>
<h3>修改管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table width="500" height="140" border="1" style="border-collapse: collapse;
		background-color:#f0f0f0;">
		<tr>
		<td>管理员名称</td>
		<td><input type="text" name="username" value="<?php echo $arr['username'];?>"></td>
		</tr>
		<tr>
		<td>管理员密码</td>
		<td><input type="password" name="password" ></td>
		</tr>
		<tr>
		<td>管理员邮箱</td>
		<td><input type="text" name="email" value="<?php echo $arr['email'];?>"></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" value="保存修改" name="submit"></td>
		</tr>
		</table>
		</form>
		</body>
		</html>
