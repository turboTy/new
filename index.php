
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>turboty的个人空间</title>
</head>
<style>
	body {background: url(./images/1.jpg) left center no-repeat;height: 750px; position: relative; padding: 0;}
    .login { position: absolute; top: 0; right: 0; }
    .login>input {background-color: #5cadad; border: 1px solid #81c0c0; color: #fff; margin-right: 1px;}
</style>
<body>
	<form action="" method="post">
		<div class="login">
			<input type="password" name="text" size="6" autocomplete="off" ><input type="submit" name="submit" value="确定">
		</div>
	</form>
<?php
if ($_POST['submit']) {
	$pwd = md5($_POST['text']);
	if ($_POST['text'] != "" && $pwd == "91dcd186da2ac2b4e62bf4b2ec29f812") {
		echo "<script language='javascript'>window.location='./admin/login_admin.php'</script>";
	}
}
?>
</body>
</html>