<?php
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SQL注入的演示页面</title>

    <link href="css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				SQL注入的演示页面
			</p>
        </div>
		
		<div class="response">
		<form method="POST" autocomplete="off">
			<p style="color:white">
				用户名:  <input type="text" id="uid" name="uid"><br /></br />
				密码: <input type="password" id="password" name="password">
			</p>
			<br />
			<p>
			<input type="submit" value="提交"/> 
			<input type="reset" value="重置"/>
			</p>
		</form>
        </div>
    
        
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">

<?php

if (!empty($_GET['msg'])) {
    echo "<font style=\"color:#FF0000\">Please login to continue.<br\></font\>";
}
//echo md5("pa55w0rd");

if (!empty($_REQUEST['uid'])) {
$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];

$q = "SELECT * FROM users where username='".$username."' AND password = '".md5($pass)."'" ;
//echo $q;
	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	$result = mysqli_query($con,$q);
	$row_cnt = mysqli_num_rows($result);

	if ($row_cnt > 0) {
	
	$row = mysqli_fetch_array($result);
	
	if ($row){
	//$_SESSION["id"] = $row[0];
	$_SESSION["username"] = $row[1];
	$_SESSION["name"] = $row[3];
	//ob_clean();
	
	header('Location:txt.php');
	}
}
	else{
		echo "<font style=\"color:#FF0000\"><br \>Invalid password!</font\>";
		
	}
}

//}
?>

	</div>
	</div>
	  
	  
	  <div class="footer">
		<p>赵庆飞，郑士轩，赵健鹏，王珊，白帅杰，聂佳琳</p>
      </div>
	</div> <!-- /container -->
  
</body>
</html>