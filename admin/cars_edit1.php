<?php 
	include_once("../common/init.php");
	check_login();
	$tb_name = "orders";
	$rs1 = db_get_row("select * from cars where id=". $_REQUEST["carsid"]);
	if ($_REQUEST["id"]) {
		$rs = db_get_row("select * from orders where id=". $_REQUEST["id"]);
	}
	if ($_POST){
		$row = db_get_row("select * from user where studentid='". $_POST["studentid"] ."'");
		if (!$row["id"]) {
			goBakMsg("没有此学号");
			die;
		}
		$row1 = db_get_row("select * from yajin where studentid='". $_POST["studentid"] ."'");
		if (!$row1["id"]) {
			goBakMsg("没有交押金！");
			die;
		}else{
			if ($row1["price"]<300) {
			goBakMsg("押金不够！");
			die;
			}
		}
		$data = array();
		if ($_REQUEST["id"]) {
			db_query("update cars set status='正常' where id=".$_POST["carsid"]);
			db_query("update yajin set price=price-".$_POST["price"]." where studentid=".$_POST["studentid"]);
			$data["status"] = "'已归还'";
		}else{
			db_query("update cars set status='借出' where id=".$_POST["carsid"]);
			$data["status"] = "'借出'";
			}
		$data["studentid"] = "'".$_POST["studentid"]."'";
		$data["carsid"] = "'".$_POST["carsid"]."'";	
		$data["carstitle"] = "'".$_POST["carstitle"]."'";	
		$data["endtime"] = "'".$_POST["endtime"]."'";
		$data["begintime"] = "'".$_POST["begintime"]."'";
		
		$data["price"] = "'".$_POST["price"]."'";
		if ($_REQUEST["id"]) {
			db_mdf($tb_name,$data,$_REQUEST["id"]);
		} else {
			db_add($tb_name,$data);
		}
		goBakMsg("操作成功");
		die;
	}
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
								<form name="add" method="post" action="?" onSubmit="return checkadd()">
								<input type="hidden" name="carsid" value="<?php echo $rs1["id"];?>" />
                                <input type="hidden" name="carstitle" value="<?php echo $rs1["title"];?>" />
                                <input type="hidden" name="id" value="<?php echo $rs["id"];?>" />
                                    <table width="100%" class="cont">
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">车牌号：</td>
                                          <td width="200"><?php echo $rs1["title"];?></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                       
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">学号：</td>
                                          <td width="200"><input name="studentid" type="text" class="text" size="30" value="<?php echo $rs["studentid"];?>" required="required"></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">提车日期：</td>
                                          <td width="200"><script language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script>     
                                          		<input name="begintime" id="datepicker" type="text"   onClick="WdatePicker()" style="width:350px;" class="text" value="<?php echo $rs["begintime"];?>"  required></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">还车日期：</td>
                                          <td width="200"><script language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script>     
                                          		<input name="endtime" id="datepicker" type="text"   onClick="WdatePicker()" style="width:350px;" class="text"  value="<?php echo $rs["endtime"];?>" required></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">预计金额：</td>
                                          <td width="200"><input name="price" type="text" class="text" size="30" value="<?php echo $rs["price"];?>" required="required"></td>
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
