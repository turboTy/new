<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>文件上传</title>
</head>
<body>
	<form action="doAction4.php" method="post" enctype="multipart/form-data">
	    <input type="hidden" name="MAX_FILE_SIZE" value="1500000">
		<input type="file" name="myFile[]"><br>
		<input type="file" name="myFile[]"><br>
		<input type="file" name="myFile[]"><br>
	<!-- 	<input type="file" name="myFile1"><br>
		<input type="file" name="myFile2"><br> -->
		<input type="submit" name="submit">
	</form>
</body>
</html>