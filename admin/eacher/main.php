<?php 
	include_once("../../common/init.php");
	check_loginthe1();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $CONFIG["webname"];?></title>
<link href="../skin/index/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../skin/index/js/jquery.js"></script>
</head>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">后台首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    
    
    <div class="welinfo">
    网站名称：<?php echo $CONFIG["webname"];?>
    </div>
    
    <div class="xline"></div>
    </div>
</body>
</html>