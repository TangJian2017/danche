<?php 
	include_once("../common/init.php");
	check_login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="skin/index/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="skin/index/js/jquery.js"></script>

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
	<div class="lefttop"><span></span>后台管理</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span></span>管理信息
    </div>
    	<ul class="menuson">
        <li><cite></cite><a href='password.php' target='main'>修改密码</a><i></i></li>
        <?php if($_SESSION['type2']=="超级管理员"){?>
        <li><cite></cite><a href='admin_list.php' target='main'>账号管理</a><i></i></li>
        <li><cite></cite><a href='admin_edit.php' target='main'>添加账号</a><i></i></li>
		<?php }?>
        </ul>    
    </dd>
        
    <dd><div class="title">
    <span></span>押金管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='yajin_list.php' target='main'>押金管理</a><i></i></li>
	</ul>     
    </dd> 
    
    <dd><div class="title">
    <span></span>车辆管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='cars_edit.php' target='main'>添加车辆</a><i></i></li>
        <li><cite></cite><a href='cars_list.php' target='main'>车辆管理</a></i></li>
        <li><cite></cite><a href='map.php' target='main'>车辆地图</a></i></li>
	</ul>     
    </dd> 
    
    <dd><div class="title">
    <span></span>车辆订单
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='cars_list1.php' target='main'>查询车辆</a><i></i></li>
        <li><cite></cite><a href='orders.php' target='main'>订单管理</a></i></li>
	</ul>     
    </dd> 
    
     <dd><div class="title">
    <span></span>报修管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='baoxiu_list.php' target='main'>报修管理</a><i></i></li>
	</ul>     
    </dd> 
    
    <dd><div class="title">
    <span></span>车辆品牌
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='category_edit.php' target='main'>添加品牌</a><i></i></li>
        <li><cite></cite><a href='category_list.php' target='main'>品牌管理</a></i></li>
	</ul>     
    </dd> 
    
    <dd><div class="title">
    <span></span>维修员管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href='eacher_edit.php' target='main'>添加维修员</a><i></i></li>
        <li><cite></cite><a href='eacher_list.php' target='main'>维修员管理</a></i></li>
	</ul>     
    </dd> 
    
    
    <dd><div class="title"><span></span>学生管理</div>
    <ul class="menuson">
        <li><cite></cite><a href='user_edit.php' target='main'>添加学生</a><i></i></li>
        <li><cite></cite><a href='user_list.php' target='main'>学生管理</a><i></i></li>
	</ul> 
    </dd>  
    
    </dl>
</body>
</html>
