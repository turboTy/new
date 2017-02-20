<?php 
    require_once '../include.php';
    $id = $_REQUEST['id'];
    $mysqli = connect();
    $sql = "select * from imooc_cate where id = {$id}";
    $row = fetchOne($mysqli, $sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>编辑商品分类</title>
</head>
<body>
<h3>编辑分类</h3>
	<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
		<table width="500"  border="1" style="border-collapse: collapse; 
		background-color:#f0f0f0;">
			<tr height='40'>
				<td align="right"><b>分类名称：</b></td>
				<td><input type="text" name="cName" placeholder="<?php echo $row['cName'];  ?>"></td>
			</tr>
			<tr height='40'>
				<td colspan="2"><input type="submit" value="保存修改" name="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
