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
<style>
table {font-size: 14px; font-family: "microsoft yahei";}
.redStar {color: #f00; font-size:14px; vertical-align: middle;}
</style>
<body>
<script type="text/javascript">
	function checkForm(){
		var pName = document.getElementById('pName');
		var pNum = document.getElementById('pNum');
		var mPrice = document.getElementById('mPrice');
		var iPrice = document.getElementById('iPrice');
		var thumbs1 = document.getElementById('thumbs1');
		var form = document.getElementById('form');
		if (pName.value == "") {
			alert("商品名称不能为空");
			form.pName.focus();
			return false;
		}else if (pNum.value == "") {
			alert("商品数量不能为空");
			window.pNum.focus();
			return false;
		}else if (mPrice.value == "") {
			alert("市场价格不能为空");
			window.mPrice.focus();
			return false;
		}else if (iPrice.value == "") {
			alert("会员价格不能为空");
			window.iPrice.focus();
			return false;
		}else if (thumbs1.value == "") {
			alert("商品图像不能为空");
			window.thumbs1.focus();
			return false;
		}
		form.submit();
	}
</script>
	<h3>添加商品</h3>
	<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data" id="form"> 
		<table border="1" width="700" style="background-color:#ccc; border-collapse:collapse;margin-left:10px;">
			<tr height="28">
				<td align="right" width="16%"><span class="redStar">*</span> 商品名称：</td>
				<td style="text-indent:10px;">
					<input type="text" id="pName" name="pName" placeholder="请输入商品名称">
				</td>
			</tr>
			<tr height="28">
				<td align="right" width="16%">商品分类：</td>
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
				<td align="right" width="16%">商品货号：</td>
				<td style="text-indent:10px;"><input type="text" name="pSn" placeholder="请输入商品货号"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%"><span class="redStar">*</span> 商品数量：</td>
				<td style="text-indent:10px;"><input type="text" id="pNum" name="pNum" placeholder="请输入商品数量"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%"><span class="redStar">*</span> 商品市场价：</td>
				<td style="text-indent:10px;"><input type="text" id="mPrice" name="mPrice" placeholder="请输入商品市场价"></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%"><span class="redStar">*</span> 商品会员价：</td>
				<td style="text-indent:10px;"><input type="text" id="iPrice" name="iPrice" placeholder="请输入商品会员价"></td>
			</tr>
			<tr height="140">
				<td align="right" width="16%">商品描述：</td>
				<td style="text-indent:10px;"><textarea name="pDesc"  cols="70" rows="6"></textarea></td>
			</tr>
			<tr height="28">
				<td align="right" width="16%"><span class="redStar">*</span> 商品图像：</td>
				<td style="text-indent:10px;">
					<input type="file" value="添加附件" name="thumbs1" id="thumbs1" >
				</td>
			</tr>
			<tr height="28">
				<td style="text-indent:10px;" colspan="2">
					<input type="button"  value="添加商品" onclick="checkForm()">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>
