<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>编辑用户</title>
</head>
<body>
<?php 
require_once '../include.php';
$id = $_REQUEST['id'];
$mysqli = connect();
$sql = "select * from imooc_user where id ={$id}";
$row = fetchOne($mysqli, $sql);
// var_dump($row);exit;
?>
<h3>编辑用户</h3>
	<!-- <form action="" method="post"> -->
		<table width="500" height="140" border="1" style="border-collapse: collapse; background-color:#f0f0f0;">
			<tr>
				<td align="right"><b>用户名称：</b></td>
				<td><input type="text" name="username" id="username" autocomplete="off" 
				        value="<?php echo $row['username'];?>"></td>
			</tr>
			<tr>
				<td align="right"><b>用户密码：</b></td>
				<td><input type="password" id="password" autocomplete="off"  name="password" ></td>
			</tr>
			<tr>
				<td align="right"><b>确认密码：</b></td>
				<td><input type="password" id="checkPwd" autocomplete="off"  name="checkPwd" ></td>
			</tr>
			<tr>
				<td align="right"><b>性　　别：</b></td>
				<td>
					<input type="radio" name="sex" value="1" 
					   <?php if ($row['sex']=="男"){echo "checked";}?>>男
					<input type="radio" name="sex" value="2" 
					   <?php if ($row['sex']=="女"){echo "checked";}?>>女
					<input type="radio"  name="sex" value="3" 
					   <?php if ($row['sex']=="保密"){echo "checked";}?>>保密
				</td>
			</tr>
			<tr>
				<td align="right"><b>用户邮箱：</b></td>
				<td><input type="text" name="email" id="email" autocomplete="off" 
				    value = "<?php echo $row['face'];?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="submit" value="保存修改" name="submit" ></td>
			</tr>
		</table>
	<!-- </form> -->

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.js"></script>
<script type="text/javascript">
document.getElementById("submit").onclick = function(){
		if (document.getElementById('username').value == "") {
			alert("用户名不能为空");
			document.getElementById("username").focus();
			return false;
		}else if (document.getElementById('password').value == "") {
			alert("密码不能为空");
			document.getElementById("password").focus();
			return false;
		}else if (document.getElementById('checkPwd').value == "") {
			alert("确认密码不能为空");
			document.getElementById("checkPwd").focus();
			return false;
		};
		$.ajax({
			type: "POST",
			url: "doAdminAction.php?act=addUser",
			dataType: "json",
			data :{
				username: $("#username").val(),
				password: $("#password").val(),
				checkPwd: $("#checkPwd").val(),
				email: $("#email").val(),
				sex: $(":input:radio:checked").val(),
			},
			success:function(data){
				if (data.user_err) {
					alert(data.user_msg);
					return false;
				}
				if (data.pwd_err) {
					alert(data.pwd_msg);
					return false;
				}
				if (data.checkPwd) {
					alert(data.msg);
					return false;
				}
				if (data.add) {
					alert(data.add_msg);
					window.location.href="listUser.php";
				}else{
					alert(data.add_msg);
					window.location.reload();
				}
			},
			error:function(jqXHR){
				alert("错误"+jqXHR.status);
			}
		})
	}
</script>
</body>
</html>
