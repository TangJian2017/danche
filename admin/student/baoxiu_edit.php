<?php
include_once("../../common/init.php");
check_loginuser();

$order_id = intval($_GET['order_id']);
if(!$order_id){
    goBakMsg("缺少参数order_id");
    exit();
}

$cars_id = intval($_GET['carsid']);
if(!$cars_id){
    goBakMsg("缺少参数carsid");
    exit();
}
$order = db_get_row("select * from `orders` where id={$order_id}");
$cars = db_get_row("select * from `cars` where id={$cars_id}");

?>
<?php include_once("base.php");?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">添加订单</div></td></tr>
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
						<tr>
						  <td colspan="2">
								<form name="add" method="post" action="baoxiu_order.php">
								<input type="hidden" name="carsid" value="<?php echo $cars_id;?>" />
                                <input type="hidden" name="order_id" value="<?php echo $order_id;?>" />
                                    <table width="100%" class="cont">
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">车牌号：</td>
                                          <td width="200"><?php echo $cars["title"];?></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">报修原因：</td>
                                          <td width="200"><textarea name="content"></textarea></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td align="right"><input class="btn" type="submit" value="提交" /></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
							</form>
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
