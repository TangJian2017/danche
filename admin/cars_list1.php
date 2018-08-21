<?php 
	include_once("../common/init.php");
	check_login();
	$categoryA = db_get_all("select * from category order by id desc");
	$tb_name = "cars";
	$where_sql = " status='正常' ";
	if ($_REQUEST["title"]) {
		$where_sql .= " and title like '%". $_REQUEST["title"] ."%' ";
	}
	
	if ($_REQUEST["categoryid"]) {
		$where_sql .= " and categoryid =". $_REQUEST["categoryid"] ." ";
	}
	$page = $_REQUEST["page"]?$_REQUEST["page"]:1;
	$list = db_get_page("select * from $tb_name where $where_sql order by id desc", $page,11);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "title=".$_REQUEST["title"]."&categoryid=".$_REQUEST["categoryid"], $page);
	$page_show = $Page->show(); 
?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">车辆管理</div></td></tr>
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
				<input type="hidden" name="pageNum" value="<?php echo $page; ?>"/>
				<select name="categoryid">
					<option value="">-- 请选择 --</option>
					<?php
                    foreach($categoryA as $row) {
                    ?>
					<option value="<?php echo $row["id"];?>" <?php if($_REQUEST["categoryid"]==$row["id"]){echo ' selected="selected" ';}?>><?php echo $row["title"];?></option>
					<?php } ?>
				</select> <input type="text" name="title" class="text" placeholder="车牌号" value="<?php echo $_REQUEST["title"]; ?>"/>
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
									<th width="82" >编号</th>
								  <th >车牌号</th>
                                  <th >车龄</th>
                                  <th >颜色</th>
									<th width="120">操作</th>
							  </tr>
                                <?php
									foreach($list["data"] as $row) {
								?>
								<tr align="center" class="d">
								  <td align="center"><?php echo $row['id'];?></td>
									<td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['ages'];?></td>
                                    <td><?php echo $row['colors'];?></td>
									<td align="center"><a href="<?php echo $tb_name;?>_edit1.php?carsid=<?php echo $row['id'];?>">下单</a></td>
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