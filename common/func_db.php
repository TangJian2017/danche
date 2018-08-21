<?php
	/*
	功能：数据库参数及连接
	*/
	function db_connection(){
		global $CONFIG;
		$host		= $CONFIG["db_host"];
		$user		= $CONFIG["db_user"];
		$password	= $CONFIG["db_pass"];
		$database	= $CONFIG["db_name"];
		$db	= mysql_connect($host,$user,$password) or die("数据库连接中......");
		$select_db	= mysql_select_db($database,$db) or die("数据库选择中......");
		mysql_query("set names utf8;");
	}
	/*
	功能：添加数据
	*/
	function db_add($table,$dataA) {
		if($table && count($dataA)>0) {
			$strleft='';
			$strright='';
			foreach($dataA as $key=>$val) {
				$strleft.=','.$key;
				$strright.=','.$val;
			}
			$strleft='insert into '.$table.' ('.ltrim($strleft,',').')';
			$strright=' values ('.ltrim($strright,',').')';
			$sql=$strleft.$strright;
			//echo $sql;
			//die;
			db_query($sql);

			return db_insert_id();
		}
	}
	/*
	功能：修改数据
	*/
	function db_mdf($table,$dataA,$id) {
		if($table && count($dataA)>0 && $id) {
			$setsql='';
			$wheresql='';
			foreach($dataA as $key=>$val) {
				$setsql.=', '.$key.'='.$val;
			}
			$setsql = ltrim($setsql,',');
			$wheresql = " id in(". $id .")";

			$sql='update '.$table.' set '.$setsql;
			$sql.=' where '.$wheresql;
			db_query($sql);
			//echo $sql;
		}
	}
	/*
	功能：取出单个数据
	*/
	function db_get_val($table,$id,$field) {
		$result=db_query("select $field from $table where id=$id");
		$rs = mysql_fetch_array($result);
		//echo "select $field from $table where id=$id";
		return $rs[$field];
	}
	/*
	功能：删除数据
	*/
	function db_del($table,$id) {
		if($table && $id) {
			$wheresql=' id in('. $id .')';
			$sql="delete from `".$table."` where ".$wheresql;
			db_query($sql);
			//echo $sql;
		}
	}
	/*
	功能：删除参数数据
	*/
	function db_dela($table,$where) {
		if($table && $where) {
			$sql="delete from `".$table."` where ".$where;
			//echo $sql;
			//die;
			db_query($sql);
		}
	}
	/*
	功能：调出一条信息
	*/
	function db_get_row($sql) {
		$result=db_query($sql);
		$rs = mysql_fetch_array($result);
		return $rs;
	}
	/*
	功能：调出多条信息数组
	*/
	function db_get_all($sql) {
		$result=db_query($sql);
		$rs = array();
		while( $row = mysql_fetch_array($result)){
			$rs[] = $row;
		}
		return $rs;
	}
	/*
	功能：获取分页数据
	*/
	function db_get_page($sql,$page,$page_size) {
		$page = $page*1?$page:1;
		$num_sql = "select count(1) as num from (".$sql.") t";
		$rsNum = db_get_row($num_sql);

		$total = $rsNum["num"];

		if (ceil($total/$page_size)<$page){
			$page = ceil($total/$page_size);
		}
		$start = ($page-1)*$page_size;

		$rs_sql = "select * from (".$sql.") t limit $start,$page_size";
		$rsData = db_get_all($rs_sql);
		$pageA = array();
		$pageA["page"] = $page;
		$pageA["page_size"] = $page_size;
		$pageA["total"] = $total;
		$pageA["data"] = $rsData;
		return $pageA;
	}

	/*
	功能：执行sql
	*/
	function db_query($sql,$dbconn='')
	{
		Return mysql_query($sql);
	}
	/*
	功能：返回sql值 数组
	*/
	function db_fetch_array($result)
	{
		Return mysql_fetch_array($result);
	}
	/*
	功能：返回行数
	*/
	function db_num_rows($result)
	{
		Return mysql_num_rows($result);
	}
	/*
	功能：返回新插入的ID
	*/
	function db_insert_id()
	{
		Return mysql_insert_id();
	}
	/*
	功能：关闭数据库
	*/
	function db_close()
	{
		mysql_close();
	}

	/*
	功能：返回前一次 MySQL 操作所影响的记录行数
	*/
	function db_affected_rows()
	{
		Return mysql_affected_rows();
	}

?>