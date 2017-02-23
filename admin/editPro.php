<?php
	require_once "../include.php";
	$cates = getAllCate();
// 	var_dump($cates);exit;
    if (!$cates){
        alertMes("没有商品分类,请先添加!", "addCate.php");
    }
    $id = $_REQUEST['id'];
    $mysqli = connect();
//     var_dump($id);exit;
    $sql = "select * from imooc_pro where id ={$id}";
    $arr = fetchOne($mysqli, $sql);
//     var_dump($arr);exit;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改商品</title>
</head>
<body>
	<h3>修改商品</h3>
	<form action="doAdminAction.php?act=editPro&id=<?php echo $id;?>" method="post" enctype="multipart/form-data"> 
    <!-- <form action="../test/doAction4.php" method="post" enctype="multipart/form-data"> -->
		<table border="1" width="700" style="background-color:#ccc; border-collapse:collapse;margin-left:10px;">
			<tr height="28">
				<td align="right" width="16%">商品名称</td>
				<td style="text-indent:10px;">
				    <input type="text" name="pName" value="<?php echo $arr['pName'];?>">
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品分类</td>
				<td style="text-indent:10px;">
					<select name="cId" id="">
						<?php 
							foreach ($cates as $cate):
						?>
							<option value="<?php echo $cate['id'];?>"><?php echo $cate['cName'];?></option>
						<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品货号</td>
				<td style="text-indent:10px;">
			         <input type="text" name="pSn" value="<?php echo $arr['pSn'];?>">
			    </td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品数量</td>
				<td style="text-indent:10px;">
				    <input type="text" name="pNum" value="<?php echo $arr['pNum'];?>">
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品市场价</td>
				<td style="text-indent:10px;">
				    <input type="text" name="mPrice" value="<?php echo $arr['mPrice'];?>">
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品会员价</td>
				<td style="text-indent:10px;">
				    <input type="text" name="iPrice" value="<?php echo $arr['iPrice'];?>">
				</td>
			</tr>
			<tr height="140">
				<td align="right" width="16%">商品描述</td>
				<td style="text-indent:10px;">
				    <textarea name="pDesc"  cols="70" rows="6" "><?php echo $arr['pDesc'];?></textarea>
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品图像</td>
				<td style="text-indent:10px;">
					<input type="file" value="添加附件" name="thumbs1" >
					<input type="file" value="添加附件" name="thumbs2" >
				</td>
			</tr>
			<tr height="28">
				<td style="text-indent:10px;" colspan="2">
					<input type="submit"  value="保存修改">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
