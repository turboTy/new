<html lang="en">
<head>
	<meta charset=utf-8>
	<link type="text/css" rel="stylesheet" href="./styles/main.css">
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
			<div class="login_reg">
				<div class="logo fl">
					<a href="#"><img src="./images/icon/logo.jpg" alt="LOGO"></a>
					<h3 class="welcome_reg">欢迎登录</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="login_box">
		<!-- <form action="" method="post" id="form"> -->
    		<div class="login_user">
    			<h4>管理员帐号</h4>
    			<input type="text" class="username" name="username" id="username" size="35" autocomplete="off">
    		</div>
    		<div class="login_pwd">
    			<h4>密码</h4>
    			<input type="password" class="password" name="password" id="password" size="35" autocomplete="off">
    		</div>
    		<div class="login_check">
    			<h4>验证码</h4>
    			<input type="text" class="checkCode" id="verify" name="verify" size="20" autocomplete="off">
    			<img src="getVerify.php"  onclick="this.src=this.src+'?'+Math.random">
    		</div>
    		<div class="auto_log">
    			<input type="checkbox" id="autoFlag" value="1" name="autoFlag"><label for="chk_auto">
    			<em>自动登录（一周内自动登录）</em></label><a href="#" class="fr" >忘记密码？</a>
    		</div>
    		<div class="login_btn">
    			<input type="submit" name="submit" id="submit" value="登　录">
    		</div>
    	<!-- </form> -->
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
<script type="text/javascript">
	document.getElementById("submit").onclick = function(){
		var username = document.getElementById("username");
		var password = document.getElementById("password");
		var verify = document.getElementById("verify");
		if (username.value == "") {
			alert("管理员帐号不能为空");
			username.focus();
			return false;
		}else if(password.value == ""){
			alert("管理员密码不能为空");
			password.focus();
			return false;
		}else if(verify.value == ""){
			alert("验证码不能为空");
			verify.focus();
			return false;
		}
		var request = new XMLHttpRequest();
		request.open("POST","doLogin.php");
		var data =  "username="+document.getElementById("username").value+
					"&password="+document.getElementById("password").value+
					"&verify="+document.getElementById("verify").value+
					"&autoFlag="+document.getElementById("autoFlag").value;
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange=function(){
			if (request.readyState == 4) {
				if (request.status == 200) {
					var res = JSON.parse(request.responseText);
					if (res.verify) {	
						alert(res.verifyMsg);
					}else{
						alert(res.verifyMsg);
						document.getElementById('verify').focus();
					}
					if (res.pwd) {
						alert(res.pwdMsg);
					}else{
						alert(res.pwdMsg);
						document.getElementById('username').focus();
					}
					// window.location.href = "index.php";
				}
			}
		}
	}
</script>
</body>
</html>