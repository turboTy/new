<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加商品</title>
</head>
<style>
body {font-family: "microsoft yahei";}
.fl {float: left;}
.fr {float: right;}
.top_bar {width: 98%; height: 40px; line-height: 40px; margin-bottom: 10px;}
.top_bar_l input {margin-top: 10px;}
.page a {color: #666;text-decoration: none;}
table td {text-indent: 10px;}
</style>
<body>
<?php
require_once "../include.php";
$cates = getAllCate();
// $pros = getAllPro();

$proName = $_POST['proName'];
$pName = $_POST;
$searchText = $_POST['searchText'];
$proCate = $_POST['proCate']==null?10:$_POST['proCate'];
$wh = "cId = {$proCate}";
if ($proName == null){
    $sql = "select * from imooc_pro";
}elseif ($proName == 1){
    $sql = "select * from imooc_pro where pName = {$searchText}";
}elseif($proName == 2){
    $sql = "select * from imooc_pro where pSn = {$searchText}";
}
$arr = getAdminByPage(5, "imooc_pro",$where = " where ".$wh);
$page = $arr['page'];
$row = $arr['row'];
if ($row == null){
//     alertMes("该分类下没有商品,请先添加", "addPro.php");
    $row = array();
}
$totalRows = $arr['totalRows'];
$totalPage = $arr['totalPage'];
// $pros = fetchAll($mysqli, $sql);
// var_dump($row);exit;
$pageStr = showPage($page, $totalPage);
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="top_bar">
		<div class="top_bar_l fl">
			<input type="submit" value="添加商品" onclick="addPro()">
		</div>
		<div class="top_bar_r fr">
			<span>商品分类：</span>
			<select name="proCate"  >
			<?php  foreach ($cates as $cate):?>
				<option value="<?php echo $cate['id']; ?>"><?php echo $cate['cName'];?></option>
			<?php endforeach; ?>
			</select>
			<select name="proName">
				<option value="1">商品名称</option>
				<option value="2">商品货号</option>
			</select>
			<input type="text" name="searchText" placeholder="请输入搜索条件"><input type="submit" value="搜索">
		</div>
	</div>
	
		<table border="1" style="border-collapse:collapse; background-color:#f0f0f0; width:98%;">
			<tr height='40'>
				<th width="10%">编号</th>
				<th width="25%">商品名称</th>
				<th width="15%">商品分类</th>
				<th width="15%">是否上架</th>
				<th>操作</th>
			</tr>
			<?php foreach ($row as $pro):?>
			<tr height='40' >
				<td width="10%">
					<input type="checkbox" id="<?php echo $pro['id'];?>">
					<label for="<?php echo $pro['id'];?>"><?php echo $pro['id'];?></label>
				</td>
				<td width="25%"><?php echo $pro['pName'];?></td>
				<td width="15%"><?php echo $pro['cId'];?></td>
				<td width="15%"><?php echo $pro['isShow'];?></td>
				<td>操作</td>
			</tr>
			<?php endforeach;?>
		</table>
		<div class="page">
			<?php echo $pageStr;?>
		</div>
</form>
</body>
</html>
