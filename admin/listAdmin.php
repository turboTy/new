<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>listAdmin</title>
</head>
<body>
<h3>管理员列表</h3>
	<form action="doAdminAction?act=listAdmin">
		<table border = "1" width = "500"  style="border-collapse:collapse; background-color: #f0f0f0;">
			<tr>
				<td>编号</td>
				<td>姓名</td>
				<td>邮箱</td>
			</tr>
			<?php
				session_start();
				$rows = $_SESSION['rows_admin'];
				foreach ($rows as $key=>$value){
		    ?>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['username'];?></td>
					<td><?php echo $value['email'];?></td>
				</tr>
			<?php 
			    }
			?>
			    
		</table>
	</form>
</body>
</html>