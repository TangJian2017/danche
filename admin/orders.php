<?php 
	include_once("../common/init.php");
	check_login();
	$categoryA = db_get_all("select * from category order by id desc");
	$tb_name = "orders";
	$where_sql = " 1=1 ";
	if ($_REQUEST["title"]) {
		$where_sql .= " and carstitle like '%". $_REQUEST["title"] ."%' ";
	}
	
	if ($_REQUEST["studentid"]) {
		$where_sql .= " and studentid like '%". $_REQUEST["studentid"] ."%' ";
	}
	
	if ($_REQUEST["status"]) {
		$where_sql .= " and status ='". $_REQUEST["status"] ."'";
	}
	$page = $_REQUEST["page"]?$_REQUEST["page"]:1;
	$list = db_get_page("select * from $tb_name where $where_sql order by id desc", $page,11);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "title=".$_REQUEST["title"]."&studentid=".$_REQUEST["studentid"]."&status=".$_REQUEST["status"], $page);
	$page_show = $Page->show(); 
?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">订单管理</div></td></tr>
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
                <select name="status">
					<option value="">选择状态</option>
                    <option value="借出" <?php if($_REQUEST["status"]=="借出"){echo "selected";}?>>借出</option>
					<option value="已归还" <?php if($_REQUEST["status"]=="已归还"){echo "selected";}?>>已归还</option>
					</select>
				<input type="text" name="studentid" class="text" placeholder="学号" value="<?php echo $_REQUEST["studentid"]; ?>"/> <input type="text" name="title" class="text" placeholder="车牌号" value="<?php echo $_REQUEST["title"]; ?>"/>
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
								</tr>
								<tr>
									<th width="82">编号</th>
									<th>车牌号</th>
                                  <th>学生</th>
                                  <th>提车时间</th>
                                  <th>还车时间</th>
                                  <th>金额</th>
									<th width="120">操作</th>
							  </tr>
                                <?php
									$sum=0;
									foreach($list["data"] as $row) {
								?>
								<tr align="center" class="d">
								  <td align="center"><?php echo $row['id'];?></td>
									<td><?php echo $row['carstitle'];?></td>
                                    <td><?php echo $row['studentid'];?></td>
                                    <td><?php echo $row['begintime'];?></td>
                                    <td><?php echo $row['endtime'];?></td>
                                    <td><?php echo $row['price'];?></td>
				    <td align="center"><?php if($row['status']=="借出"){?><a href="cars_edit1.php?id=<?php echo $row['id'];?>&carsid=<?php echo $row['carsid'];?>">使用中</a><?php }else{echo "已归还";}?>  <a href="del.php?id=<?php echo $row['id'];?>&del=orders" onClick="return confirm('真的要删除?不可恢复!');">删除</a></td>
								</tr>
                                <?php 
								$sum+=$row['price'];
								} ?>
								<th colspan="7">本页累计金额：&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum;?></th>
								
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
