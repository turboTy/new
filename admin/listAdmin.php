<?php 
    require_once '../include.php';
    $rows = getAllAdmin();
    if (!$rows){
        alertMes("没有管理员.请先添加!", 'addAdmin.php');
    }
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>listAdmin</title>
</head>
<body>
<h3>管理员列表</h3>
		<table border = "1" width = "90%" align="center" style="border-collapse:collapse; 
            background-color: #f0f0f0;">
			<tr  height='30'>
				<th width="15%">管理员编号</th>
				<th width="20%">管理员名称</th>
				<th width="30%">管理员邮箱</th>
				<th>操作</th>
			</tr>
			<?php
// 				var_dump($rows);
// 				exit();
				foreach ($rows as $key=>$value){
		    ?>
				<tr height='30'>
					<td align="center" >
						<input type="checkbox" id="c<?php echo $value['id'];?>">
						<label for="c<?php echo $value['id']; ?>">
							<?php 
								if($value['id']<10){
									$value['id'] = "00".$value['id'];
								}elseif($value['id']<100){
									$value['id'] = "0".$value['id'];
								}
								echo $value['id']; 
							?>
						</label>
					</td>
					<td align="center" ><?php echo $value['username'];?></td>
					<td style="text-indent: 30px;"><?php echo $value['email'];?></td>
					<td align="center">
						<input type="button" name="editAdmin" value="修改">&nbsp;&nbsp;
						<input type="button" name="deleteAdmin" value="删除">
					</td>
				</tr>
			<?php 
			    }
			?>
		</table>
</body>
</html>