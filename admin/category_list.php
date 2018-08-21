<?php 
	include_once("../common/init.php");
	check_login();
	$list = db_get_all("select * from category order by id desc");
?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">品牌管理</div></td></tr>
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
								  <th width="200">品牌名称</th>
								  <th>&nbsp;</th>
									<th width="120">操作</th>
							  </tr>
                                <?php
									foreach($list as $row){
								?>
								<tr align="center" class="d">
								  <td><?php echo $row['id'];?></td>
									<td align="center"><?php echo $row['title'];?></td>
									<td align="center">&nbsp;</td>
									<td><a href="category_edit.php?id=<?php echo $row['id'];?>">编辑</a>　<a href="del.php?id=<?php echo $row['id'];?>&del=category" onClick="return confirm('真的要删除?不可恢复!');">删除</a></td>
								</tr>
                                <?php } ?>
							</table>
						</td>
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