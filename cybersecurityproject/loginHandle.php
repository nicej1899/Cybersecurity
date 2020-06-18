<?php

	header("content-type:text/html;charset=utf-8");
	if ($_POST['name']!=""&&$_POST['password']!=""){
		$conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
		mysqli_query($conn,"set names utf8");
		mysqli_select_db($conn,"loginsqli");
		$name=addslashes(trim($_POST['name']));
		$password=addslashes(trim($_POST['password']));
		$sql="select * from users where username='{$name}'";
		$rs=mysqli_query($conn,$sql);
		$num=mysqli_num_rows($rs);
		if($num){
			$row=mysqli_fetch_array($rs);
			if(md5($password)===$row['password']){
                    session_start();
					$_SESSION['name']=$name;
					echo "<script language=\"javascript\">";
					echo "alert(\"登录成功！\\n欢迎".$_SESSION['name']."\");";
					echo "location.href=\"vote.php\"";
					echo "</script>";
			}else{
				echo "<script language=\"javascript\">";
				echo "alert(\"密码不正确！\");";
				echo "location.href=\"safelogin.php\"";
				echo "</script>";
				echo "<br>";
			}
		}else{
			echo "<script language=\"javascript\">";
			echo "alert(\"用户不存在！\");";
			echo "location.href=\"safelogin.php\"";
			echo "</script>";
			echo "<br>";
		}
	}else{
		echo "<script language=\"javascript\">";
		echo "alert(\"用户名和密码不能为空！\");";
		echo "location.href=\"safelogin.php\"";
		echo "</script>";
		echo "<br>";
	}
	
?>