<?php 
require_once './include.php';
$cates = getAllCate();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="./styles/reset.css">
	<link rel="stylesheet" href="./styles/main.css?v=20170303">
	<title>慕课电商</title>
</head>
<body>
	<div>
		<div class="topBar">
			<div class="comWidth">
				<div class="leftArea">
					<!-- <img src="./images/icon/star.jpg" alt="收藏慕课网" style="vertical-align:middle;"> -->
					<a href="#" class="collection">收藏</a>
				</div>
				<div class="rightArea">
					欢迎! <a href="#">[登陆]</a><a href="#">[免费注册]</a>
				</div>
			</div>
		</div>
		<div class="logoBar">
			<div class="comWidth">
				<div class="logo fl" >
					<a href="#"><img src="" ></a>
				</div>
				<div class="search fl">
					<input type="text" class="searchText fl" >
					<input type="button" class="searchBtn fr" value="搜索">
				</div>
				<div class="shopCar fr">
					<span class="shopText fl">购物车</span>
					<div>
						<span class="shopNum fr">0</span>
					</div>
				</div>
			</div>
		</div>
		<div class="navBox">
			<div class="comWidth">
				<div class="shopClass fl">
					<h3>全部商品分类<i class="icon class_sj"></i></h3>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt>
								<a href="#" class="b">手机</a>  <a href="#" class="b">数码</a>　<a href="#" class="aLink">合约机</a>
							</dt>
							<dd>
								<a href="#">荣耀3X</a>  <a href="#">单反</a>  <a href="#">智能设备</a>
							</dd>
						</dl>
					</div>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt>
								<a href="#" class="b">手机</a>  <a href="#" class="b">数码</a>　<a href="#" class="aLink">合约机</a>
							</dt>
							<dd>
								<a href="#">荣耀3X</a>  <a href="#">单反</a>  <a href="#">智能设备</a>
							</dd>
						</dl>
					</div>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt>
								<a href="#" class="b">手机</a>  <a href="#" class="b">数码</a>　<a href="#" class="aLink">合约机</a>
							</dt>
							<dd>
								<a href="#">荣耀3X</a>  <a href="#">单反</a>  <a href="#">智能设备</a>
							</dd>
						</dl>
					</div>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt>
								<a href="#" class="b">手机</a>  <a href="#" class="b">数码</a>　<a href="#" class="aLink">合约机</a>
							</dt>
							<dd>
								<a href="#">荣耀3X</a>  <a href="#">单反</a>  <a href="#">智能设备</a>
							</dd>
						</dl>
					</div>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt>
								<a href="#" class="b">手机</a>  <a href="#" class="b">数码</a>　<a href="#" class="aLink">合约机</a>
							</dt>
							<dd>
								<a href="#">荣耀3X</a>  <a href="#">单反</a>  <a href="#">智能设备</a>
							</dd>
						</dl>
					</div>
					<div class="shopClass_list hide">
						<div class="shopList_net">
							<dl class="shopList_item">
								<dt class="shopList_b">电脑整机</dt>
								<dd><a href="#">笔记本</a></dd><dd class="active"><a href="#">超极本</a></dd><dd><a href="#">上网本</a></dd><dd><a href="#">平板电脑</a></dd><dd><a href="#">台式机</a></dd>
							</dl>
						</div>
						<div class="shopList_install">
							<dl class="shopList_item">
								<dt >电脑装机</dt>
								<dd><a href="#">CPU</a></dd><dd class="active"><a href="#">硬盘</a></dd><dd><a href="#">SSD固态硬盘</a></dd><dd><a href="#">内存</a></dd><dd><a href="#">显示</a></dd><dd><a href="#">智能显示卡</a></dd><dd><a href="#">主板</a></dd><dd><a href="#">显卡</a></dd><dd><a href="#">机箱</a></dd><dd><a href="#">电源</a></dd><dd><a href="#">散热器</a></dd><dd><a href="#">声卡</a></dd><dd><a href="#">拓展卡</a></dd><dd><a href="#">服务器配件</a></dd><dd><a href="#">DIY小附件</a></dd>
							</dl>
						</div>
						<div class="shopList_install">
							<dl class="shopList_item">
								<dt>整机附件</dt>
								<dd><a href="#">电脑包</a></dd><dd class="active"><a href="#">电脑桌</a></dd><dd><a href="#">电池</a></dd><dd><a href="#">电源适配器</a></dd><dd><a href="#">贴膜</a></dd><dd><a href="#">清洁用品</a></dd><dd><a href="#">笔记本散热器</a></dd><dd><a href="#">USB拓展</a></dd><dd><a href="#">平板配件</a></dd><dd><a href="#">特色附件</a></dd><dd><a href="#">插座网线/电话线</a></dd><dd><a href="#">影音线材</a></dd><dd><a href="#">电脑线材</a></dd>
							</dl>
						</div>
						<div class="shopList_install">
							<dl class="shopList_item">
								<dt>电脑外设</dt>
								<dd><a href="#">鼠标</a></dd><dd class="active"><a href="#">键盘</a></dd><dd><a href="#">游戏外设</a></dd><dd><a href="#">移动硬盘</a></dd><dd><a href="#">摄像头</a></dd><dd><a href="#">高清播放器</a></dd><dd><a href="#">外置盒</a></dd><dd><a href="#">移动硬盘包</a></dd><dd><a href="#">手写板/绘图板</a></dd>
							</dl>
						</div>
						<div class="shopList_net">
							<dl class="shopList_item">
								<dt>网络设备</dt>
								<dd><a href="#">路由器</a></dd><dd class="active"><a href="#">网卡</a></dd><dd><a href="#">3G无线上网</a></dd><dd><a href="#">减缓及</a></dd><dd><a href="#">网络存储</a></dd><dd><a href="#">不限工具</a></dd><dd><a href="#">网络配件</a></dd><dd><a href="#">正版软件</a></dd>
							</dl>
						</div>
						<div class="shopList_net">
							<dl class="shopList_item">
								<dt>音频设备</dt>
								<dd><a href="#">音箱</a></dd><dd class="active"><a href="#">耳机/耳麦</a></dd><dd><a href="#">麦克风</a></dd><dd><a href="#">声卡</a></dd><dd><a href="#">音频附件</a></dd><dd><a href="#">录音笔</a></dd>
							</dl>
						</div>
						<div class="shopList_rect">
							<div id="rect1"><a href="">电脑整机频道</a></div>
							<div id="rect2"><a href="">硬件/外设频道</a></div>
						</div>
					</div>
				</div>
				<ul class="nav">
					<li><a href="#" class="active">数码城</a></li>
					<li><a href="#">天黑黑</a></li>
					<li><a href="#">团购</a></li>
					<li><a href="#">发现</a></li>
					<li><a href="#">二手特卖</a></li>
					<li><a href="#">名品会</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="banner comWidth">
		<div class="banner_bar">
			<ul class="banner_img">
				<li><a href="#"><img src="./images/banner/banner_sony.jpg" alt="索尼广告"></a></li>
				<li><a href="#"><img src="./images/banner/banner_new.jpg" alt="索尼广告"></a></li>
			</ul>
		</div>
		<div class="banner_num">
			<a href="#" class="active"></a><a href="#"></a>
		</div>
	</div>
<!-- 	顶部信息区 -->
	
<?php foreach ($cates as $cate): ?>
	<div class="banner_title comWidth">
		<h1 class="fl"><?php echo $cate['cName']; ?></h1>
		<a href="#" class="fr">更多&gt;&gt;</a>
	</div>
	<div class="elec_goods comWidth">
		<div class="elec_banner">
			<ul class="elec_img">
				<li><a href="#"><img src="./images/goods/elecBanner_pad.jpg" alt="ipad"></a></li>
				<li><a href="#"><img src="./images/goods/elecBanner_pad2.jpg" alt="ipad"></a></li>
				<li><a href="#"><img src="./images/goods/elecBanner_pad3.jpg" alt="ipad"></a></li>
			</ul>
			<div class="elec_num">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
		<div class="elec_goodsList fr">
		<?php 
		      $id = $cate['id'];
		      $pros = getProsByCate($id);
		      foreach ($pros as $pro):
		          $pId = $pro['id'];
		          $img = getOneAlbum($pId); 
	    ?>
			<div class="elec_goodsItem fl">
				<div class="top">
					<a href="#"><img src="<?php echo "./admin/uploads/img_220/".$img['albumPath']; ?>" alt="HTC"></a>
					<h3><?php echo $pro['pName'];  ?></h3>
					<p><?php echo "￥".$pro['iPrice']; ?></p>
				</div>
				<div class="bottom bottom1">
					<a href="#" class="fl"><img src="./images/goods/goods_camera.jpg" alt="camera"></a>
					<h4 class="fr">NFC技术一碰轻松<br/>配对!接触屏幕</h4>
					<p>￥149.00</p>
				</div>
			</div>
		<?php endforeach;?>
<!-- 			<div class="elec_goodsItem fl"> -->
<!-- 				<div class="top"> -->
<!-- 					<a href="#"><img src="./images/goods/goods_HTC.jpg" alt="HTC"></a> -->
<!-- 					<h3>HTC新渴望8系列</h3> -->
<!-- 					<p>1899元</p> -->
<!-- 				</div> -->
<!-- 				<div class="bottom bottom2"> -->
<!-- 					<a href="#" class="fl"><img src="./images/goods/goods_samsung.jpg" alt="camera"></a> -->
<!-- 					<h4 class="fr">SAMSUNG三星<br/>GALAXY Grand2</h4> -->
<!-- 					<p>￥2000.00</p> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<div class="elec_goodsItem fl"> -->
<!-- 				<div class="top"> -->
<!-- 					<a href="#"><img src="./images/goods/goods_HTC.jpg" alt="HTC"></a> -->
<!-- 					<h3>HTC新渴望8系列</h3> -->
<!-- 					<p>1899元</p> -->
<!-- 				</div> -->
<!-- 				<div class="bottom bottom3"> -->
<!-- 					<a href="#" class="fl"><img src="./images/goods/goods_ipad2.jpg" alt="camera"></a> -->
<!-- 					<h4 class="fr">全网底价 苹果　<br/>ipad mini1　</h4> -->
<!-- 					<p>￥1888.00</p> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 			<div class="elec_goodsItem fl"> -->
<!-- 				<div class="top"> -->
<!-- 					<a href="#"><img src="./images/goods/goods_HTC.jpg" alt="HTC"></a> -->
<!-- 					<h3>HTC新渴望8系列</h3> -->
<!-- 					<p>1899元</p> -->
<!-- 				</div> -->
<!-- 				<div class="bottom bottom4"> -->
<!-- 					<div> -->
<!-- 						<a href="#" class="fl"><img src="./images/goods/goods_ipad.jpg" alt="camera"></a> -->
<!-- 						<h4 class="fr">Apple苹果 全新<br/>Retine屏MacBoo</h4> -->
<!-- 						<p>￥20020.00</p> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 			</div> -->
		</div>
	</div>
<?php endforeach; ?>
	
<!-- 	底部信息区         -->
	<div class="bottomInfo">
		<div class="mooke_info">
			<a href="#">慕课简介</a>|<a href="#">慕课公告</a>|<a href="#">招贤纳士</a>|<a href="#">联系我们</a>|<a href="#">客服热线： 400-675-1234</a>
		</div>
		<div class="copyRight_info">
			<a href="#">Copyright 2006 — 2014 慕课版权所有</a><a href="#">京ICP备09037834</a><a href="#">京ICP证B1034-8373</a><a href="#">某市公安局XX分局备案编号：123456789123</a>
		</div>
		<div class="img_info">
			<a href="#"><img src="./images/bottom/bottom.jpg" alt=""></a>
			<a href="#"><img src="./images/bottom/bottom.jpg" alt=""></a>
			<a href="#"><img src="./images/bottom/bottom.jpg" alt=""></a>
			<a href="#"><img src="./images/bottom/bottom.jpg" alt=""></a>
		</div>
	</div>
</body>
</html>