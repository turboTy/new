<?php 
    require_once '../include.php';
    $mysqli = connect();
    $rows = getAllCate();
    if (!$rows){
        alertMes("没有商品分类,请添加!", "addCate.php");
    }
    $table = "imooc_cate";
    $pageSize = 3;
    $arr = getAdminByPage($pageSize,$table);
    $page = $arr['page'];
    $totalPage = $arr['totalPage'];
    $totalRows = $arr['totalRows'];
    $row = $arr['row'];
    $pageStr = showPage($page, $totalPage);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>listCate</title>
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
				<th width="15%">分类编号</th>
				<th width="20%">分类名称</th>
				<th>操作</th>
			</tr>
			<?php
// 				var_dump($rows);
// 				exit();
				foreach ($row as $value){
		    ?>
				<tr height='30'>
					<td align="center" >
						<input type="checkbox" id="<?php echo $value['id'];?>">
						<label for="<?php echo $value['id']; ?>">
							<?php 
								if($value['id']<10){
									echo "00".$value['id'];
								}elseif($value['id']<100){
									echo "0".$value['id'];
								}
							?>
						</label>
					</td>
					<td style="text-indent: 30px;"><?php echo $value['cName'];?></td>
					<td align="center">
						<input type="button" name="editCate" value="修改" 
						      onclick="editAdmin(<?php echo $value['id']; ?>)">&nbsp;&nbsp;
						<input type="button" name="deleteCate" value="删除" 
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
		window.location="editCate.php?id="+id;
	}
	function delAdmin(id){
		if(window.confirm("确定要删除吗？删除之后不可恢复！！")){
			window.location="doAdminAction.php?act=delCate&id="+id;
		}
	}
	function add(){
		window.location="addCate.php";
	}
</script>
</body>
</html>
