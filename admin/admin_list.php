<?php 
	include_once("../common/init.php");
	check_login();
	$page = $_REQUEST["page"]?$_REQUEST["page"]:1;
	$list = db_get_page("select * from admin where id<>1 order by id desc", $page,12);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "", $page);
	$page_show = $Page->show(); 

?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">管理员列表</div></td></tr>
			</table>
		</td>
		<td width="16" rowspan="2" bgcolor="#FFFFFF"></td>
	</tr>
	<tr>
	<td valign="top" bgcolor="#F7F8F9">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr><td colspan="4" height="10"></td></tr>
			<tr>
				<td width="1%">&nbsp;</td>
				<td width="96%">
					<table width="100%">
						<td colspan="2">
							<table width="100%"  class="cont tr_color">
								<tr>
									<th width="82">编号</th>
								  <th width="100">用户名</th>
								  <th width="100">姓名</th>
								  <th width="120">电话</th>
								  <th width="130">出生日期</th>
								  <th>备注</th>
								  <th width="60">性别</th>
									<th width="120">操作</th>
							  </tr>
                                <?php
									foreach($list["data"] as $row) {
								?>
								<tr align="center" class="d">
								  <td align="center"><?php echo $row['id'];?></td>
									<td><?php echo $row['username'];?></td>
									<td><?php echo $row['tname'];?></td>
									<td><?php echo $row['tel'];?></td>
									<td><?php echo $row['begintime'];?></td>
									<td><?php echo $row['desc1'];?></td>
									<td align="center"><?php echo $row['sex'];?></td>
									<td align="center"><a href="admin_edit.php?id=<?php echo $row['id'];?>">修改</a> <a href="del.php?id=<?php echo $row['id'];?>&del=admin" onclick='return confirm("真的要删除?不可恢复!");'>删除</a></td>
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