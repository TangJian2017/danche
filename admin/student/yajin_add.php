<?php 
	include_once("../../common/init.php");
	check_loginuser();
	if ($_POST){
		$data = array();
		$row = db_get_row("select * from yajin where userid='". $_SESSION["studentid"] ."'");
		if ($row["id"]) {
			if($_POST["price"]+$row["price"]<300){
			goBakMsg("押金不能少于300元");
			die;}else{db_query("update yajin set price=price+".$_POST["price"]." where id=".$row["id"]);}
		}
		else{if($_POST["price"]<300){goBakMsg("押金不能少于300元");die;}}
		$data["price"] = "'".$_POST["price"]."'";
		$data["studentid"] = "'".$_SESSION['stuname']."'";
		$data["userid"] = "'".$_SESSION['studentid']."'";
		if ($row["id"]) {
		} else {
			db_add("yajin",$data);
		}
		urlMsg("提交成功", "main.php");
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
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">缴纳押金</div></td></tr>
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
								<form name="add" method="post" action="?"  enctype="multipart/form-data">
                                    <table width="100%" class="cont">
                                        
                                       <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td align="right">添加金额：</td>
                                          <td>   
                                          		<input name="price" type="text"  class="text" required>
                                          </td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td align="right"><input type="submit" class="btn" id="submitBtn" value="提交" ></td>
                                            <td>&nbsp;</td>
                                            <td></td>
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