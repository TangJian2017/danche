<?php 
	include_once("../common/init.php");

	if($_REQUEST["type"]=="logout"){
		session_destroy();
		session_start();
		urlMsg("退出成功", __BASE__."/admin/login.php");
		die;
	}
	if ($_POST) {
		if($_POST["type"]=="学生"){
			$rsRow = db_get_row("select * from user where studentid='". $_POST["account"] ."'");
			if ($rsRow['password'] == md5($_POST["password"])){
				$_SESSION["studentid"]	=	$rsRow['id'];
				$_SESSION['stuname']	=	$rsRow['studentid'];
				$_SESSION['categoryid']	=	$rsRow['categoryid'];
				$_SESSION['type2']		=	"学生";
				
				urlMsg("登录成功", "student/index.php");
				
				die;
			} else {
				goBakMsg("账号不存在或密码错误");
			}
		}
		elseif($_POST["type"]=="维修人员"){
			$rsRow = db_get_row("select * from eacher where username='". $_POST["account"] ."'");
			if ($rsRow['password'] == md5($_POST["password"])){
				$_SESSION["eachersid"]	=	$rsRow['id'];
				$_SESSION['tsname']	=	$rsRow['tname'];
				$_SESSION['type2']		=	"维修人员";
				
				urlMsg("登录成功", "eacher/index.php");
				
				die;
			} else {
				goBakMsg("账号不存在或密码错误");
			}
		}
		else{
			$rsRow = db_get_row("select * from admin where username='". $_POST["account"] ."'");
			if ($rsRow['password'] == md5($_POST["password"])){
				$_SESSION["adminid"]	=	$rsRow['id'];
				$_SESSION['adminname']	=	$rsRow['username'];
				$_SESSION['type2']		=	$rsRow['type'];
				
				urlMsg("登录成功", "index.php");
			} else {
				goBakMsg("账号不存在或密码错误");
			}
		}
	}
?>