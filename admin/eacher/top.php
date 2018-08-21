<?php 
	include_once("../../common/init.php");
	check_loginthe1();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../skin/index/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../skin/index/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:#f0f9fd">

    <div class="topleft">
    <a><?php echo $CONFIG["webname"];?></a>
    </div>
    <div class="topright">    
    <ul>
    <li></li>
    <li><a href="password.php" target='main'>修改资料</a></li>
    <li><a href="../logincheck.php?type=logout" target="_top">注销退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo $_SESSION['tsname'];?></span>
    </div>    
    
    </div>
</body>
</html>