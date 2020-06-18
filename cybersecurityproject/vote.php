
<?php
ob_start();
session_start();
include("db_config.php");
if (!$_SESSION["username"]){
header('Location:login.php?msg=1');
}
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
   <title>vote</title>
   <meta charset="utf8">
   <link rel="shortcut icon" href="img/milktitle.jpg" type="image/x-icon">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/css.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</head>
<body>
   <div>
      <h1 style="color:#f9fffc;font-family:楷体">投票系统</h1>
      <div style="float:left;margin-left:40px;">
         <img src="img/3.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"><br/><br/>
         <table>
            <td>
               <tr><form class="form-inline" action="voteHandle.php" method="post">
               <button type="submit" name="vote_id" value="1" class="button" style="margin-left:20px"/>投票</button></form></tr>
             
            </td>
         </table>
      </div>
      <div style="float:left;margin-left:40px;">
         <img src="img/1.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"><br/><br/>
         <table>
            <td>
               <tr><form class="form-inline" action="voteHandle.php" method="post">
               <button type="submit" name="vote_id" value="2" class="button" style="margin-left:20px"/>投票</button></form></tr>
              
            </td>
         </table> 
      </div>
      <div style="float:left;margin-left:40px;">
         <img src="img/2.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"><br/><br/>
         <table>
            <td>
               <tr><form class="form-inline" action="voteHandle.php" method="post">
               <button type="submit" name="vote_id" value="3" class="button" style="margin-left:20px"/>投票</button></form></tr>
               
            </td>
         </table>
      </div>
      
      </div>
   <div style="margin-top:300px">
      <h1>投票结果</h1>
      <?php

         $conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
         mysqli_select_db($conn,"loginsqli");
         mysqli_query($conn,"set names utf8");
         $sql1="select * from voting where vote_id=1";
         $query1=mysqli_query($conn,$sql1);
         $rs1=mysqli_fetch_array($query1);
         $conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
         mysqli_select_db($conn,"loginsqli");
         mysqli_query($conn,"set names utf8");
         $sql2="select * from voting where vote_id=2";
         $query2=mysqli_query($conn,$sql2);
         $rs2=mysqli_fetch_array($query2);
         $conn=mysqli_connect("localhost","root","root") or die("数据库连接失败");
         mysqli_select_db($conn,"loginsqli");
         mysqli_query($conn,"set names utf8");
         $sql3="select * from voting where vote_id=3";
         $query3=mysqli_query($conn,$sql3);
         $rs3=mysqli_fetch_array($query3);
         
         $num1=$rs1['num']/($rs1['num']+$rs2['num']+$rs3['num']);
         $num2=$rs2['num']/($rs1['num']+$rs2['num']+$rs3['num']);
         $num3=$rs3['num']/($rs1['num']+$rs2['num']+$rs3['num']);
         
      ?>
      <div>
         <div style="float:left">一号选举人</div>
         <div style="float:left">
            <div class="progress progress-striped active">
               <div class="progress-bar" role="progressbar" 
                  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"    
                  style="width:<?php echo round($num1,4)*100; ?>%">
               </div>
            </div>         
         </div>
         <div style="float:left"><?php echo $rs1['num'];?>票(<?php echo round($num1,4)*100; ?>%)</div>
         <div style="float:left">
            <div class="btn-group">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                 投票者<span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><?php echo $rs1['name'];?></a></li>
               </ul>
            </div>
         </div>
      </div>
      <div style="margin-top:100px">        
         <div style="float:left">二号选举人</div>
         <div style="float:left">
            <div class="progress progress-striped active">
               <div class="progress-bar" role="progressbar" 
                  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"    
                  style="width:<?php echo round($num2,4)*100; ?>%">
               </div>
            </div> 
         </div>          
         <div style="float:left"><?php echo $rs2['num'];?>票(<?php echo round($num2,4)*100; ?>%)</div>
         <div style="float:left">
            <div class="btn-group">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                 投票者<span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><?php echo $rs2['name'];?></a></li>
               </ul>
            </div>
         </div>
      </div>
      <div style="margin-top:200px">
         <div style="float:left">三号选举人</div>
         <div style="float:left">
            <div class="progress progress-striped active">
               <div class="progress-bar" role="progressbar" 
                  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"    
                  style="width:<?php echo round($num3,4)*100; ?>%">
               </div>
            </div>         
         </div>
         <div style="float:left"><?php echo $rs3['num'];?>票(<?php echo round($num3,4)*100; ?>%)</div>
         <div style="float:left">
            <div class="btn-group">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                 投票者<span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><?php echo $rs3['name'];?></a></li>
               </ul>
            </div>
         </div>
      </div>
      
   </div>
</body>
</html>