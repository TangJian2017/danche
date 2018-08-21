<?php 
	include_once("../common/init.php");
	check_login();
	$tb_name = "baoxiu";
	$eacher = db_get_all("select * from eacher order by id asc ");
	$rs1 = db_get_row("select * from cars where id=". $_REQUEST["carsid"]);
	if ($_REQUEST["id"]) {
		$rs = db_get_row("select * from $tb_name where id=". $_REQUEST["id"]);
	}
	if ($_POST){
		$data = array();
		db_query("update cars set status='".$_POST["status"]."' where id=".$_POST["carsid"]);
		$data["eacherid"] = "'".$_POST["eacherid"]."'";
		$data["carsid"] = "'".$_POST["carsid"]."'";	
		$data["status"] = "'".$_POST["status1"]."'";	
		$data["content"] = "'".$_POST["content"]."'";	
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
                                        <?php 
											if(!empty($eacher[0])){
										?>
                                        <tr>
                                          <td>&nbsp;</td>
                                            <td align="right"><span class="red">*</span> 选择维修工：</td>
                                          <td>
                                          <select name="eacherid">
											  <?php foreach($eacher as $row) {	?>
                                                <option value="<?php echo $row["id"];?>" <?php if($rs["eacherid"]==$row["id"]){echo ' selected="selected" ';}?>><?php echo $row["tname"];?></option>
                                            <?php } ?>
                                          </select>
                                          </td>
                                          <td></td>
                                        </tr>
                                        <?php }?>
                                       <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">车辆状态：</td>
                                          <td width="200">
                                          	<select name="status">
                                                <option value="维修" <?php if($rs1["status"]=="维修"){echo "selected";}?>>维修</option>
                                                <option value="报废" <?php if($rs1["status"]=="报废"){echo "selected";}?>>报废</option>
                                                <option value="正常" <?php if($rs1["status"]=="正常"){echo "selected";}?>>正常</option>
                                            </select></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">报修状态：</td>
                                          <td width="200">
                                          	<select name="status1">
                                                <option value="维修中" <?php if($rs["status"]=="维修中"){echo "selected";}?>>维修中</option>
                                                <option value="完成" <?php if($rs["status"]=="完成"){echo "selected";}?>>完成</option>
                                            </select></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                       <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">备注：</td>
                                          <td width="200"><textarea name="content"><?php echo $rs["content"];?></textarea></td>
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
