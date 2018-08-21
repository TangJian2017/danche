<?php 
	include_once("../common/init.php");
	check_login();
	$rs = db_get_row("select * from admin where id=".$_SESSION["adminid"]);
	if ($_POST){
		$data = array();
		$data["password"] = "'".md5($_POST["password"])."'";
		db_mdf("admin",$data,$_SESSION["adminid"]);
		goBakMsg("密码修改成功");
	}
?>
<?php include_once("base.php");?>
<script>
function check()
{
	if (document.form1.password.value=='')
	{
		alert('密码不能为空');
		document.form1.password.focus();
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
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">修改密码</div></td></tr>
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
							<form name="form1" method="post" action="?" onSubmit="return check()">
								<table width="100%" class="cont tr_color">
									<tr class="d">
										<td width="2%">&nbsp;</td>
										<td width="120" align="right">管理员帐号： </td>
										<td><?php echo $rs["username"];?></td>
									</tr>
									<tr class="d">
										<td width="2%">&nbsp;</td>
										<td align="right">新 密 码： </td>
										<td><input class="text" type="password" name="password" value=""/></td>
									</tr>
									<tr class="d">
										<td>&nbsp;</td>
										<td align="right"><input class="btn" type="submit" value="提交" /></td>
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