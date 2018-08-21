<?php 
	include_once("../../common/init.php");
	check_loginuser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
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
    欢迎来到用户中心,
	<?php 
		$row = db_get_row("select * from yajin where userid='". $_SESSION["studentid"] ."'");
		if ($row["id"]) {
			if($row["price"]<300)
			{
				echo("您的押金为: ".$row["price"]." 元,请充值!!");
			}
			else
			{
			echo("您的押金为: ".$row["price"]." 元!!");
			}
		}
		else{echo("请先缴纳300元押金谢谢!!");}
		 ?>
    </div>
    
    <div class="xline"></div>
    </div>
</body>
</html>