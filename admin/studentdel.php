<?php
	include_once("../common/init.php");
	check_login();
	
	if ($_REQUEST["del"]) {
		$stuid=db_get_val("user",$_REQUEST["id"],"studentid");
		db_del($_REQUEST["del"],$_REQUEST["id"]);
		db_dela("yajin","studentid='".$stuid."'");
		goBakMsg("删除成功");
	} else {
		die;
	}

?>