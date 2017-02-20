<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>测试页面</title>
</head>
<style>
.page {width: 800px; margin: 0 auto; height: 50px; border: 1px solid #ccc; text-align: center; 
		font: normal 14px/50px "microsoft yahei";}
.page a {color: #fff; border: 1px solid #1d7ad9; padding: 2px; background-color: #1d7ad9; text-decoration: none;
		margin: 0 2px; }
.page span {color: #fff; border: 1px solid #1d7ad9; padding: 2px; background-color: #1d7ad9; text-decoration: none;
		margin: 0 2px;}
.pageNum {background-color: red; }
</style>
<body>
<?php
require_once "../include.php";
?>
<div class="page">
	<?php 
	   echo showPage($_REQUEST['page'],6);
	   echo "<br>";
	   print_r(phpinfo());
	?>
</div>
</body>
</html>