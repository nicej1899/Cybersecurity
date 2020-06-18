
	<?php
ob_start();
session_start();




	header("content-type:text/html;charset=utf-8");
	$conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
;
	$vote=$_POST['vid'];
	$name=$_SESSION['username'];
	mysqli_select_db($conn,"loginsqli");
	mysqli_query($conn,"set names utf8");
    $sql1="update voting set name=$vote where vote_id=3";
	$rs1=mysqli_query($conn,$sql1);
	header('Location:txt.php');

?>