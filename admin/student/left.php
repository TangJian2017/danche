<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title>无标题文档</title>
<link href="../skin/index/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../skin/index/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>系统管理</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span></span>管理信息
    </div>
    	<ul class="menuson">
        <li><cite></cite><a href='password.php' target='main'>修改资料</a><i></i></li>
        </ul>    
    </dd>
    <dd><div class="title">
    <span></span>缴纳押金
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='main.php' target='main'>我的押金</a><i></i></li>
        <li><cite></cite><a href='yajin_add.php' target='main'>缴纳押金</a><i></i></li>
	</ul>     
    </dd>
    <dd><div class="title">
    <span></span>租赁信息
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='stu_jieche.php' target='main'>车辆租赁</a><i></i></li>
    	<li><cite></cite><a href='orders.php' target='main'>租赁信息</a><i></i></li>
        <li><cite></cite><a href='map.php' target='main'>车辆地图</a><i></i></li>
	</ul>     
    </dd> 
     
    
    </dl>
</body>
</html>