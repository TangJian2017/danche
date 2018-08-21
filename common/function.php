<?php
	function check_loginuser(){
		if(!$_SESSION['studentid']) {
	
			echo "<script language='javascript'>alert('请登录');location.href='".__BASE__."/admin/login.php';</script>";
		}
	}
	
	function check_login(){
		if(!$_SESSION['adminid']) {
			header("Location:".__BASE__."/admin/login.php");
		}
	}
	function check_loginthe1(){
		if(!$_SESSION['eachersid']) {
			header("Location:".__BASE__."/admin/login.php");
		}else{
			if($_SESSION['type2']!="维修人员"){
				header("Location:".__BASE__."/admin/login.php");
			}
		}
	}
	//js弹出框
	function alertMsg($msg)
	{	
		echo "<script language='javascript'>alert('".$msg."');</script>";
	}
	function goBakMsg($msg)
	{	
		echo "<script language='javascript'>alert('".$msg."');history.go(-1);</script>";
	}
	
	function goBakLoadFun($msg,$fun)
	{	
		echo "<script language='javascript'>alert('".$msg."');parent.location.reload();".$fun."</script>";
	}
	function goBakLoad($msg)
	{	
		echo "<script language='javascript'>alert('".$msg."');parent.location.reload();</script>";
	}
	function urlMsg($msg,$url)
	{	
		echo "<script language='javascript'>alert('".$msg."');location.href='$url';</script>";
	}
	function parentUrlMsg($msg,$url)
	{	
		echo "<script language='javascript'>alert('".$msg."');parent.location.href='$url';</script>";
	}
	
	function delMsg($msg)
	{	
		echo "return confirm('".$msg."')";
	}
?>