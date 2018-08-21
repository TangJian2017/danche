<?php 
	include_once("../../common/init.php");
	check_loginthe1();
	$rs = db_get_row("select * from eacher where id=".$_SESSION["eachersid"]);
	if ($_POST){
		$data = array();
		$data["tname"] = "'".$_POST["tname"]."'";
		$data["begintime"] = "'".$_POST["begintime"]."'";
		$data["desc1"] = "'".$_POST["desc1"]."'";
		$data["sex"] = "'".$_POST["sex"]."'";
		$data["tel"] = "'".$_POST["tel"]."'";
		if($_POST["password"]){
			$data["password"] = "'".md5($_POST["password"])."'";
		}
		
		if(!empty($_FILES['img']['name'])){
			$file = $_FILES['img'];//得到传输的数据
			//得到文件名称
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
			//判断文件类型是否被允许上传
			if(!in_array($type, $allow_type)){
			  //如果不被允许，则直接停止程序运行
			}
			//判断是否是通过HTTP POST上传的
			$upload_path = ROOT_PATH.'/Public/Upload/'; //上传文件的存放路径
			
			//开始移动文件到相应的文件夹
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileName =$mu.".".$type;
			}else{
			  //echo "Failed!";
			}
			$data["img"] = "'".$fileName."'";	
		}
		db_mdf("eacher",$data,$_SESSION["eachersid"]);
		goBakMsg("修改成功");
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
				<tr bgcolor="#FFFFFF"><td height="31"><div class="title">修改资料</div></td></tr>
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
							<form name="form1" method="post" action="?"  enctype="multipart/form-data">
								<table width="100%" class="cont">
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">用户名或编号：</td>
                                          <td width="200"><input name="username" type="text" class="text" size="30"  maxlength="20" value="<?php echo $rs["username"];?>" readonly></td>
                                            <td>&nbsp;</td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td align="right">密码：</td>
                                          <td><input name="password" type="password" class="text" size="30"  maxlength="20">
                                          </td>
                                            <td>不修改请留空</td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">姓名：</td>
                                          <td width="200"><input name="tname" type="text" class="text" size="30"  maxlength="20" value="<?php echo $rs["tname"];?>" required></td>
                                            <td>&nbsp;</td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">性别：</td>
                                          <td width="200"><select name="sex">
                                <option value="男" <?php if($rs["sex"]=="男"){echo "selected";}?>>男</option>
                                <option value="女" <?php if($rs["sex"]=="女"){echo "selected";}?>>女</option>
                            </select></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">出生日期：</td>
                                          <td width="200"><script language="javascript" type="text/javascript" src="../../My97DatePicker/WdatePicker.js"></script>     
                                          		<input name="begintime" id="datepicker" type="text"   onClick="WdatePicker()" style="width:350px;" class="text" value="<?php echo $rs["begintime"];?>" required></td>
                                            <td>&nbsp;</td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right"> 头像上传：</td>
                                          <td width="200"><input type="file" name="img" class="text" id="img"><?php if(!empty($rs['img'])){?><img src="<?php echo __PUBLIC__;?>/Upload/<?php echo $rs["img"];?>" height="50" width="50"/><?php }?></td>
                                            <td></td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">电话：</td>
                                          <td width="200"><input name="tel" type="text" class="text" size="30"  maxlength="20" value="<?php echo $rs["tel"];?>" required></td>
                                            <td>&nbsp;</td>
                                            <td width="2%">&nbsp;</td>
                                        </tr>
                                         <tr>
                                          <td width="2%">&nbsp;</td>
                                            <td width="120" align="right">备注：</td>
                                          <td width="200"><textarea name="desc1" cols="30" class="text"><?php echo $rs["desc1"];?></textarea></td>
                                            <td>&nbsp;</td>
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