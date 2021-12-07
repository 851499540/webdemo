<?php
	session_start();

	if (isset($_POST['submit']) && $_POST['submit'] == '注册' ) {

		$usrname = $_POST['usrname'];
		$passwd = $_POST['passwd'];
		$assure = $_POST['assure'];
		$captchacode = $_POST['captchacode'];

		if ($usrname=='' || $passwd=='' || $assure == ''|| $captchacode == '') {
			echo "<script>alert('输入不能为空!');history.go(-1);</script>";
		}else{
			if ($captchacode != $_SESSION['code']) {
				echo "<script>alert('验证码错误');history.go(-1);</script>";
			}else{
				if($passwd == $assure){
					require_once('./conn.php');

					$sql="SELECT usrname FROM usrinfo where usrname ='$usrname'";
					$result = mysqli_query($conn,$sql);
					$num = mysqli_num_rows($result);

					if($num){

						echo "<script>alert('用户已存在');history.go(-1);</script>";

					}else{
						$sql_insert ="INSERT INTO usrinfo (usrname,passwd)VALUES('$usrname','$passwd')";
						$res_insert = mysqli_query($conn,$sql_insert);
						if($res_insert){
							echo "<script>alert('注册成功,正在跳转');</script>";
							
							header("Refresh:1;url=../login.html");
						}
					}
					
					mysqli_close($conn);




				}else{
					echo "<script>alert('密码不一致');history.go(-1);</script>";
				}
			}

		}
		
	}else{
		echo "<script>alert('提交失败');history.go(-1);</script>";
	}


 ?>

