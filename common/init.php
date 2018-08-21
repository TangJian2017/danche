<?php
	header('Content-Type:text/html;charset=utf-8');
	error_reporting(0);
	//error_reporting(E_ERROR);
	if (__FILE__ == '')
	{
		die('error code: 0');
	}
	//取得网站所在根目录
	define('ROOT_PATH', str_replace('/common/init.php', '', str_replace('\\', '/', __FILE__)));
	
	include_once ROOT_PATH."/config.php";
	include_once ROOT_PATH."/common/func_db.php";
	include_once ROOT_PATH."/common/function.php";
	include_once ROOT_PATH."/common/PageWeb.class.php";
	define('__BASE__', $CONFIG["url"]);
	define('__PUBLIC__', $CONFIG["url"]."/Public");
	session_start();
	db_connection();
?>