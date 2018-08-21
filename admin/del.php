<?php
	include_once("../common/init.php");
	check_login();
	
	if ($_REQUEST["del"]) {
		db_del($_REQUEST["del"],$_REQUEST["id"]);
		goBakMsg("删除成功");
	} else {
		die;
	}

?>