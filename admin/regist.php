<?php 
	include_once("../common/init.php");

	if ($_POST){
		$row = db_get_row("select * from user where studentid='". $_POST["studentid"] ."'");
		if ($row["id"]) {
			goBakMsg("学号已存在");
			die;
		}
		$data = array();
		$data["studentid"] = "'". $_POST["studentid"] ."'";
		$data["tel"] = "'". $_POST["tel"] ."'";
		$data["password"] = "'". md5($_POST["password"]) ."'";
		$data['stuname'] = "'".$_POST['stuname']."'";
		$res = db_add("user", $data);
		urlMsg("注册成功", "login.php");
		die;
	}
?>