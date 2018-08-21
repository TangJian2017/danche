<?php 
	include_once("../common/init.php");
	check_login();
	$page = $_REQUEST["page"]?$_REQUEST["page"]:1;
	$where_sql = " 1=1 ";
	if ($_REQUEST["studentid"]) {
		$where_sql .= " and studentid like '%". $_REQUEST["studentid"] ."%' ";
	} 

	$list = db_get_page("select * from user where $where_sql order by id desc", $page,10);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "studentid=".$_REQUEST["studentid"], $page);
	$page_show = $Page->show(); 

?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">学生列表</div></td></tr>
			</table>
		</td>
		<td width="16" rowspan="2" bgcolor="#FFFFFF"></td>
	</tr>
	<tr>
	<td valign="top" bgcolor="#F7F8F9">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr><td colspan="4" height="10"></td></tr>
            <tr><td width="1%">&nbsp;</td><td width="96%">
            <table width="100%" class="cont">
			<tr>
            <td width="1%"></td>
            <td>
            <form id="pagerForm" action="?" method="post">
            <input type="text" name="studentid" class="text" value="<?php echo $_REQUEST["studentid"]; ?>"/>
				<button type="submit"  id="chaxun" class="btn">查询</button>
			</form></td></tr></table>
            </td><td width="1%">&nbsp;</td></tr>
			<tr>
				<td width="1%">&nbsp;</td>
				<td width="96%">
					<table width="100%">
						<td colspan="2">
							<table width="100%"  class="cont tr_color">
								<tr>
									<th width="82">编号</th>
								  <th>学生学号</th>
								  <th>所在班级</th>
								  <th>手机</th>
								  <th>姓名</th>
								  <th width="160">操作</th>
							  </tr>
                                <?php
									foreach($list["data"] as $row) {
								?>
								<tr align="center" class="d">
								  <td><?php echo $row['id'];?></td>
									<td align="center"><?php echo $row['studentid'];?></td>
									<td align="center"><?php echo $row['banji'];?></td>
									<td align="center"><?php echo $row['tel'];?></td>
									<td align="center"><?php echo $row['stuname'];?></td>
									<td><a href="user_edit.php?id=<?php echo $row['id'];?>">修改资料</a>&nbsp;&nbsp;<a href="studentdel.php?id=<?php echo $row['id'];?>&del=user" onclick='return confirm("真的要删除?不可恢复!");'>删除</a></td>
								</tr>
                                <?php } ?>
							</table>
						</td>
					</tr>
					</table>
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
                        <tr>
                          <td align="center"><?php echo $page_show;?></td>
                        </tr>
                      </table>    
					</td>
					<td width="1%">&nbsp;</td>
				</tr>
				<tr><td height="20"></td></tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>