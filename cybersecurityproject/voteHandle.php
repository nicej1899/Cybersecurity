
	<?php
ob_start();
session_start();




	header("content-type:text/html;charset=utf-8");
	$conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
	mysqli_select_db($conn,"loginsqli");
	mysqli_query($conn,"set names utf8");

	$name=$_SESSION['username'];
	$vote=$_POST['vote_id']; 
	$sql="select * from users where username='$name'";
	$query=mysqli_query($conn,$sql);
	$rs=mysqli_fetch_array($query);
	if($rs['vote']==1)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"您已投过票！\");";
		echo "location.href=\"vote.php\"";
		echo "</script>";
	}
	else{		
		$conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
		$vote=$_POST['vote_id'];
		$name=$_SESSION['username'];
		mysqli_select_db($conn,"loginsqli");
		mysqli_query($conn,"set names utf8");
        $sql1="update voting set num=num+1 where vote_id=$vote";
		$rs1=mysqli_query($conn,$sql1);
		if($rs1)
		{
			$conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
			mysqli_select_db($conn,"loginsqli");
			mysqli_query($conn,"set names utf8");
			$sql2="update users set vote=1 where username='$name'";
			$rs2=mysqli_query($conn,$sql2);
			if($rs2){
				echo "<script type=\"text/javascript\">";
				echo "alert(\"添加投票成功！\");";
				echo "location.href=\"vote.php\"";
				echo "</script>";
			}
			else{
				echo "<script type=\"text/javascript\">";
				echo "alert(\"添加投票失败！\");";
				echo "location.href=\"vote.php\"";
				echo "</script>";
			}	
		}
		else{
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加投票失败！\");";
			echo "location.href=\"vote.php\"";
			echo "</script>";
		}
	}
?>