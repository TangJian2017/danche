<?php 
	include_once("../common/init.php");
	check_login();
	if ($_REQUEST["id"]) {
		$rs = db_get_row("select * from yajin where id=". $_REQUEST["id"]);
	}
	if ($_POST){
		$data = array();
		$data["price"] = "'".$_POST["price"]."'";
		if ($_REQUEST["id"]) {
			db_mdf("yajin",$data,$_REQUEST["id"]);
		}
		goBakMsg("操作成功");
		die;
	}
?>
<?php include_once("base.php");?>
<script>
function checkadd()
{
	if (document.add.price.value=='')
	{
	alert('金额不能为空');
	document.add.price.focus;
	return false
	}
}
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
		<td valign="top">
			<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">修改押金</div></td></tr>
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
								<input type="hidden" name="id" value="<?php echo $rs["id"];?>" />
                                    <table width="100%" class="cont">
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right"><span class="red">*</span> 金额：</td>
                                          <td width="200"><input name="price" type="text" class="text" size="30" value="<?php echo $rs["price"];?>" required="required"></td>
                                            <td>填写数字</td>
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
