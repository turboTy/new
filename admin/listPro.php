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
.page a:hover {text-decoration: underline;}
table td {text-indent: 10px;}
</style>
<body>
<?php
require_once "../include.php";
$cates = getAllCate();
$proName = $_POST['proName'];
$pName = $_POST;
$searchText = $_POST['searchText'];
$proCate = $_POST['proCate'];
$cId = $_REQUEST['cId'];
if ($cId){
    $proCate = $cId;
}
//判断如果选择了分类名称,则显示该分类下得所有商品,默认为没有选择分类
if ($proCate){
    if ($proName == null){
        $wh = " where cId = '$proCate'";
    }else{
        $wh = " and cId = '$proCate'";
    }
}else{
    $wh = null;
}
//判断如果搜索框内有查询条件,则根据查询条件搜索所有相符的信息,查询条件默认为空
if ($proName == null){
    $sql = "select * from imooc_pro".$wh;
}elseif ($proName == 1){
    $sql = "select * from imooc_pro where pName like '%$searchText%'".$wh;
}elseif($proName == 2){
    $sql = "select * from imooc_pro where pSn = {$searchText}".$wh;
}
$arr = getProByPage(8, $sql);
$page = $arr['page'];
$row = $arr['row'];

if ($row == null){
    $row = array();
}
$totalRows = $arr['totalRows'];
$totalPage = $arr['totalPage'];
$pageStr = showPage($page, $totalPage, "&cId=$cId");
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="top_bar">
		<div class="top_bar_l fl">
			<input type="button" value="添加商品" onclick="addPro()">
		</div>
		<div class="top_bar_r fr">
			<span>商品分类：</span>
			<select name="proCate"  >
				<option value="">选择商品分类</option>
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
				<td width="15%"><?php 
                                    $id = $pro['cId'];
                                    foreach ($cates as $cate){
                                        if ($id == $cate['id']){
                                            echo $cate['cName'];
                                        }
                                    }
				                 ?></td>
				<td width="15%"><?php 
				                    if($pro['isShow']){
				                        echo "是";
				                    }else{
				                        echo "否";
				                    }
				                ?></td>
				<td align="center">
					<input type="button" value="修改" onclick="editPro(<?php echo $pro['id'];?>)">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="删除" onclick="delPro(<?php echo $pro['id'];?>)">
				</td>
			</tr>
			<?php endforeach;?>
		</table>
		<div class="page">
			<?php echo $pageStr;?>
		</div>
</form>
<script language="javascript">
	function addPro(){
		window.location="addPro.php";
	}
	function editPro(id){
		window.location="editPro.php?act=editPro&id="+id;
	}
	
	function delPro(id){
		if(window.confirm('您确定要删除该商品吗?删除后不可恢复!')){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
</script>
</body>
</html>
