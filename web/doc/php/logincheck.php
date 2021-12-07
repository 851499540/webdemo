<?php  
	session_start();
	if (isset($_POST["submit"])&& $_POST["submit"] == "登录") {
		
		$usrname=$_POST['usrname'];
		$passwd=$_POST['passwd'];
		$captchacode = $_POST['captchacode'];
		if($usrname =='' || $passwd ==''|| $captchacode == ''){
			echo "<script>alert('不能为空');history.go(-1)</script>";
		}else{
			if ($captchacode != $_SESSION['code']) {
				echo "<script>alert('验证码错误');history.go(-1);</script>";
			}else{
				require_once('./conn.php');
		            			
			
				$sql="SELECT usrname,passwd FROM usrinfo where usrname='$usrname' and passwd = '$passwd'";
				$result=mysqli_query($conn,$sql);
				$num=mysqli_num_rows($result);
				if($num){
					echo'<script>alert("登录成功,正在跳转......");window.location.href="../usrcentra.html"</script>';
				}else{
					echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>"; 
				}
			}
		}		
	}else{
		echo "<script>alert('提交未成功！');</script>"; 
	}
?>
