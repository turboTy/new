<?php 
    require_once '../include.php';
    $rows = getAllUser();
    if (!$rows){
        alertMes("没有用户信息,请先添加!", 'addUser.php');
    }
    $table = "imooc_user";
    $arr = getAdminByPage(4,$table);
    $page = $arr['page'];
    $totalPage = $arr['totalPage'];
    $row = $arr['row'];
    $totalRows = $arr['totalRows'];
    $pageStr = showPage($page, $totalPage);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>listAdmin</title>
</head>
<style>
.add{width: 100px; height: 40px; background-color: #007979; border:1px solid #007979; margin-left: 62px; 
	 margin-bottom: 20px; color: #fff; font: normal bold 16px/35px "Microsoft YAHEI"; cursor: pointer; }
</style>
<body>
<h3>用户列表</h3>
		<input type="button" value="添　加" name="add" class="add" onclick="add()">
		<table border = "1" width = "90%" align="center" style="border-collapse:collapse; 
            background-color: #f0f0f0;">
			<tr  height='30'>
				<th width="15%">用户编号</th>
				<th width="20%">用户名称</th>
				<th width="8%">性别</th>
				<th width="30%">用户邮箱</th>
				<th>操作</th>
			</tr>
			<?php
				foreach ($row as $value){
		    ?>
				<tr height='30'>
					<td align="center" >
						<input type="checkbox" id="c<?php echo $value['id'];?>">
						<label for="c<?php echo $value['id']; ?>">
							<?php 
								if($value['id']<10){
									echo "00".$value['id'];
								}elseif($value['id']<100){
									echo "0".$value['id'];
								}
							?>
						</label>
					</td>
					<td style="text-indent: 30px;"><?php echo $value['username'];?></td>
					<td style="text-indent: 30px;"><?php echo $value['sex'];?></td>
					<td style="text-indent: 30px;"><?php echo $value['face'];?></td>
					<td align="center">
						<input type="button" name="editUser" value="修改" 
						      onclick="editUser(<?php echo $value['id']; ?>)">&nbsp;&nbsp;
						<input type="button" name="deleteUser" value="删除" 
						      onclick="delUser(<?php echo $value['id'];  ?>)">
					</td>
				</tr>
			<?php 
			    }
			    if ($totalRows > $pageSize) {
			?>
			    <tr height='30'>
			        <td colspan='5'><?php echo $pageStr; ?></td> 
			    </tr>
			<?php }?>
		</table>
<script language='javascript'>
	function editUser(id){
		window.location="editUser.php?id="+id;
	}
	function delUser(id){
		if(window.confirm("确定要删除吗？删除之后不可恢复！！")){
			window.location="doAdminAction.php?act=delUser&id="+id;
		}
	}
	function add(){
		window.location="addUser.php";
	}
</script>
</body>
</html>