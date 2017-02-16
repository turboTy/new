<html lang="en">
<head>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="./styles/main.css?v=20170215">
	<link type="text/css" rel="stylesheet" href="./styles/reset.css">
	<title>后台登录页面</title>
</head>
<style>
	/*.login_check {margin-top: 10px;}*/
	/*.login_check input {border: 1px solid #ccc; background: url(./images/login/lock.gif) 95% center no-repeat;}*/
</style>
<body>
	<div class="headerBar">
		<div class="topBar">
			<div class="comWidth">
				<div class="leftArea">
					<!-- <img src="./images/icon/star.jpg" alt="收藏慕课网" style="vertical-align:middle;"> -->
					<a href="#" class="collection">收藏慕课</a>
				</div>
				<div class="rightArea">
					欢迎来到慕课网! <a href="#">[登陆]</a><a href="#">[免费注册]</a>
				</div>
			</div>
		</div>
		<div class="logoBar">
			<div class="comWidth login_reg">
				<div class="logo fl">
					<a href="#"><img src="./images/icon/logo.jpg" alt="LOGO"></a>
					<h3 class="welcome_reg">欢迎登录</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="login_box">
		<div class="login_user">
			<h4>管理员帐号</h4>
			<input type="text" class="username" size="38">
		</div>
		<div class="login_pwd">
			<h4>密码</h4>
			<input type="password" class="password" size="38">
		</div>
		<div class="login_check">
			<h4>验证码</h4>
			<input type="text" class="checkCode" size="38">
		</div>
		<div class="auto_log">
			<input type="checkbox" id="chk_auto"><label for="chk_auto"><em>自动登录</em></label>
			<a href="#" class="fr" >忘记密码？</a>
		</div>
		<div class="login_btn">
			<input type="button" value="登　录">
		</div>
	</div>
	<div class="bottomInfo">
		<div class="mooke_info">
			<a href="#">慕课简介</a>|<a href="#">慕课公告</a>|<a href="#">招贤纳士</a>|<a href="#">联系我们</a>
			|<a href="#">客服热线： 400-675-1234</a>
		</div>
		<div class="copyRight_info">
			<a href="#">Copyright 2006 — 2014 慕课版权所有</a><a href="#">京ICP备09037834</a>
			<a href="#">京ICP证B1034-8373</a><a href="#">某市公安局XX分局备案编号：123456789123</a>
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