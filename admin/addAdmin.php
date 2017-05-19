<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加管理员</title>
</head>
<body>
<h3>添加管理员</h3>
	<form action="doAdminAction.php?act=addAdmin" method="post">
		<table width="500" height="140" border="1" style="border-collapse: collapse; 
		background-color:#f0f0f0;">
			<tr>
				<td align="right"><b>管理员名称：</b></td>
				<td><input type="text" name="username" placeholder="管理员名称"></td>
			</tr>
			<tr>
				<td align="right"><b>管理员密码：</b></td>
				<td><input type="password" name="password" ></td>
			</tr>
			<tr>
				<td align="right"><b>管理员邮箱：</b></td>
				<td><input type="text" name="email" placeholder="管理员邮箱"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加管理员" name="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
