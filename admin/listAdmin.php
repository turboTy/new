<?php 
    require_once '../include.php';
    $rows = getAllAdmin();
    if (!$rows){
        alertMes("没有管理员.请先添加!", 'addAdmin.php');
    }
    $arr = getAdminByPage(4);
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
<h3>管理员列表</h3>
		<input type="button" value="添　加" name="add" class="add" onclick="add()">
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
					<td style="text-indent: 30px;"><?php echo $value['email'];?></td>
					<td align="center">
						<input type="button" name="editAdmin" value="修改" 
						      onclick="editAdmin(<?php echo $value['id']; ?>)">&nbsp;&nbsp;
						<input type="button" name="deleteAdmin" value="删除" 
						      onclick="delAdmin(<?php echo $value['id'];  ?>)">
					</td>
				</tr>
			<?php 
			    }
			    if ($totalRows > $pageSize) {
			?>
			    <tr height='30'>
			        <td colspan='4'><?php echo $pageStr; ?></td> 
			    </tr>
			<?php }?>
		</table>
<script language='javascript'>
	function editAdmin(id){
		window.location="editAdmin.php?id="+id;
	}
	function delAdmin(id){
		if(window.confirm("确定要删除吗？删除之后不可恢复！！")){
			window.location="doAdminAction.php?act=delAdmin&id="+id;
		}
	}
	function add(){
		window.location="addAdmin.php";
	}
</script>
</body>
</html>