<?php
	require_once "../include.php";
	$cates = getAllCate();
// 	var_dump($cates);exit;
    if (!$cates){
        alertMes("没有商品分类,请先添加!", "addCate.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加商品</title>
</head>
<body>
	<h3>添加商品</h3>
	<form action="doAdminAction.php?act=addPro" method="post">
		<table border="1" width="700" style="background-color:#ccc; border-collapse:collapse;margin-left:10px;">
			<tr height="28">
				<td align="right" width="16%">商品名称</td>
				<td style="text-indent:10px;"><input type="text" name="proName" placeholder="请输入商品名称"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品分类</td>
				<td style="text-indent:10px;">
					<select name="cateSelect" id="">
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
				<td style="text-indent:10px;"><input type="text" name="proId" placeholder="请输入商品货号"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品数量</td>
				<td style="text-indent:10px;"><input type="text" name="proNum" placeholder="请输入商品数量"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品市场价</td>
				<td style="text-indent:10px;"><input type="text" name="proPrice" placeholder="请输入商品市场价"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品会员价</td>
				<td style="text-indent:10px;"><input type="text" name="proVipPrice" placeholder="请输入商品会员价"></td>
			</tr>
			<tr height="140">
				<td align="right" width="16%">商品描述</td>
				<td style="text-indent:10px;"><textarea name="proContent"  cols="70" rows="6"></textarea></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品图像</td>
				<td style="text-indent:10px;"><input type="button" value="添加附件" name="proImg" ></td>
			</tr>
			<tr height="28">
				<td style="text-indent:10px;" colspan="2">
					<input type="submit" name="proSubmit" value="添加商品">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
