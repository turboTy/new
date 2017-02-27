<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
	<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
	<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
	<title>添加商品</title>
</head>
<style>
body {font-family: "microsoft yahei";}
.fl {float: left;}
.fr {float: right;}
.top_bar {width: 98%; height: 40px; line-height: 40px; margin-bottom: 10px;}
.top_bar_l input {margin-top: 10px;}
.top_bar_l input {height: 29px;width: 120px; font: normal 14px/26px "microsoft yahei"; color: #fff; 
background-color: #666; border: 1px solid #666; cursor: pointer;}
.page a {color: #666;text-decoration: none;}
.page a:hover {text-decoration: underline;}
table td {text-indent: 10px;}
.btn {width: 70px; height: 26px; cursor: pointer;}
.delPros {height: 40px; width: 8%;}
.delPros input {height: 29px;width: 120px; font: normal 14px/26px "microsoft yahei"; color: #fff; 
background-color: #666; border: 1px solid #666; cursor: pointer;}
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
$arr = getProByPage(5, $sql);
$page = $arr['page'];
$row = $arr['row'];
if ($row == null){
    $row = array();
}
$totalRows = $arr['totalRows'];
$totalPage = $arr['totalPage'];
$pageStr = showPage($page, $totalPage, "&cId=$cId");
// var_dump($_POST['checkbox']);

?>
<div id="showDetail" style="display:none;">
	
</div>
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
				<th width="35%">商品名称</th>
				<th width="15%">商品分类</th>
				<th width="10%">是否上架</th>
				<th>操作</th>
			</tr>
			<?php $prosId = ""; foreach ($row as $pro):?>
			<tr height='40' >
				<td>
					<input type="checkbox" name="checkbox" value="<?php echo $pro['id'];?>" id="<?php echo $pro['id'];?>">
					<label for="<?php echo $pro['id'];?>">
						<?php 
							echo $pro['id']; 
							if ($prosId == ""){
							    $sep = "";
							}else{
							    $sep = ",";
							}
							$prosId .= $sep.$pro['id'];
							
						?>
					</label>
				</td>
				<td><?php echo $pro['pName'];?></td>
				<td><?php 
                                    $id = $pro['cId'];
                                    foreach ($cates as $cate){
                                        if ($id == $cate['id']){
                                            echo $cate['cName'];
                                        }
                                    }
				                 ?></td>
				<td><?php 
				                    if($pro['isShow']){
				                        echo "是";
				                    }else{
				                        echo "否";
				                    }
				                ?></td>
				<td align="center">
					<input type="button" value="详情" class="btn"
					onclick="showDetail(<?php echo $pro['id'];?>,'<?php echo $pro['pName'];?>')">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="修改" class="btn" onclick="editPro(<?php echo $pro['id'];?>)">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="删除" class="btn" onclick="delPro(<?php echo $pro['id'];?>)">
					<div id="showDetail<?php echo $pro['id']; ?>" style="display:none;">
                    	<table class="table" cellspacing="0" cellpadding="0">
                    		<tr>
                    			<td width="20%" align="right">商品名称：</td>
                    			<td><?php echo $pro['pName'];?></td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品类别：</td>
                    			<td><?php 
                    			         $id = $pro['cId'];
                                         foreach ($cates as $cate){
                                            if ($id == $cate['id']){
                                              echo $cate['cName'];
                                            }
                                         }
                                    ?></td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品货号：</td>
                    			<td><?php echo $pro['pSn'];?></td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品数量：</td>
                    			<td><?php echo $pro['pNum'];?></td>
                    		</tr>
                    		<tr>
                    			<td  width="20%"  align="right">商品价格：</td>
                    			<td><?php echo $pro['mPrice'];?></td>
                    		</tr>
                    		<tr>
                    			<td  width="20%"  align="right">会员价格：</td>
                    			<td><?php echo $pro['iPrice'];?></td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">是否上架：</td>
                    			<td>
                    			<?php 
                    				$show=($pro['isShow']==1)?"上架":"下架";
									echo $show;
                    			?>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">是否热卖：</td>
                    			<td>
                    			<?php 
                    				$hot=($pro['isShow']==1)?"热卖":"促销";
									echo $hot;
                    			?>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品图片：</td>
                    			<td>
                    				<?php 
                    				$images=getImgByProId($pro['id']);
                    				if($images == null){
                    				    echo "此商品没有上传图片";
                    				}else{
                    				    foreach($images as $img){
                    				        echo "<img src='./uploads/img_50/{$img['albumPath']}' alt=''/>&nbsp;";
                    				    }
                    				}
                    				?>
                    			</td>
                    		</tr> 
                    	</table>
                    	<span style="display:block;width:80%; border-top:1px solid #ccc; ">
                    	<b>商品描述</b><br>
                    	<?php echo $pro['pDesc'];?>
                    	</span>
                    </div>
				</td>
			</tr>
			<?php endforeach;?>
			
		</table>
</form>
<div class="delPros">
	<input type="button" value="批量删除" onclick="delPros()">
</div>
<div class="page">
	<?php echo $pageStr;?>
</div>
<script type="text/javascript">
	function showDetail(id,t){
		$("#showDetail"+id).dialog({
			height: "auto",
			width: "auto",
			position: {
				my: "center",
				at: "center",
				collision: "fit"
			},
			modal: false,
			draggable: true,
			resizable: true,
			title: "商品名称"+t,
			show: "slide",
			hide: "explode"
		});
	}
</script>
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
	function delPros(){
		var str = document.getElementsByName('checkbox');
		var objarray = str.length;
		var id = "";
		for (var i = 0; i < objarray; i++) {
			if (str[i].checked == true){
				if (id == "") {
					var sep = "";
				}else{
					var sep = ",";
				}
				id += sep+str[i].value;
			};
		}
		if (id == "") {
				alert("请选择要删除的商品");
			}else{
				if(window.confirm('您确定要删除这些商品吗?删除后不可恢复!')){
					window.location="doAdminAction.php?act=delPros&id="+id;
				}
			}
		}
</script>
</body>
</html>
