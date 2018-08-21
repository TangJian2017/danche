<?php
	include_once("../common/init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title>欢迎登录<?php echo $CONFIG["webname"];?></title>
<link href="skin/login/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="skin/login/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="skin/login/images/login.js"></script>
<script language="javascript">
function checklogin()
{
  if(document.login.account.value=='')
     {alert('请输入帐户');
      document.login.account.focus();
      return false
    }
  if (document.login.password.value=='')
   {alert('请输入密码');
    document.login.password.focus();
    return false
   }
}
</script>
</head>
<body>
<h1><?php echo $CONFIG["webname"];?></h1>
<div class="login" style="margin-top:50px;">
    
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
			<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">学生注册</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>    
  
    
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 285px;">    
            <div class="web_login" id="web_login">
            <div class="login-box">
			<div class="login_form">
				<form action="logincheck.php" name="login" method="post" class="loginForm" onSubmit="return checklogin();">
                <div class="uinArea" id="uinArea">
                <label class="input-tips" for="u">帐号：</label>
                <div class="inputOuter" id="uArea">
                    
                    <input type="text" name="account" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">密码：</label> 
               <div class="inputOuter" id="pArea">
                    
                    <input type="password" name="password" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">人员：</label> 
               <div class="inputOuter" id="pArea">
                    
                    <select name="type" class="inputstyle">
							<option value="学生">学生</option>
                                                        <option value="维修人员">维修人员</option>
							<option value="管理员">管理员</option>
						</select>
                </div>
                </div>
                <div style="padding-left:50px;margin-top:20px;"><input type="submit" value="登 录" style="width:150px;" class="button_blue"/></div>
              </form>
           </div>
           </div>
      </div>
  </div>
<script type="text/javascript"> 
function check(){   
    if(document.form1.studentid.value==""){
		alert("请输入学号");
		document.form1.studentid.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("请输入密码");
		document.form1.password.focus();
		return false;
	}
	if(document.form1.password1.value==""){
		alert("请输入确认密码");
		document.form1.password1.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password1.value){
		alert("两次输入密码不一致");
		document.form1.password1.focus();
		return false;
	}
	var mobile=document.form1.tel.value;
		if(mobile.length==0) 
       { 
          alert('请输入手机号码！'); 
          document.form1.tel.focus(); 
          return false; 
       }     
       if(mobile.length!=11) 
       { 
           alert('请输入有效的手机号码！'); 
           document.form1.tel.focus(); 
           return false; 
       } 

		   
       var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
       if(!myreg.test(mobile)) 
       { 
           alert('请输入有效的手机号码！'); 
           document.form1.tel.focus(); 
           return false; 
       }
}
</script>
  <!--注册-->
    <div class="qlogin" id="qlogin" style="display: none; ">
   
    <div class="web_login"><form name="form1" id="form1" accept-charset="utf-8"  action="regist.php" method="post" onSubmit="return checklogin1();">
        <ul class="reg_form" id="reg-ul">
        		<div style="height:20px;"></div>
                <li>
                	
                    <label for="user"  class="input-tips2">学号：</label>
                    <div class="inputOuter2">
                        <input type="text"  name="studentid" maxlength="16" class="inputstyle2"/>
                    </div>
                    
                </li>
            <li>

                <label for="user"  class="input-tips2">姓名：</label>
                <div class="inputOuter2">
                    <input type="text"  name="stuname" maxlength="16" class="inputstyle2"/>
                </div>

            </li>
                
                <li>
                <label for="passwd" class="input-tips2">密码：</label>
                    <div class="inputOuter2">
                        <input type="password"  name="password" maxlength="16" class="inputstyle2"/>
                    </div>
                    
                </li>
                <li>
                <label for="passwd2" class="input-tips2">确认密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="password2" name="" maxlength="16" class="inputstyle2" />
                    </div>
                    
                </li>
                
                <li>
                 <label for="qq" class="input-tips2">手机：</label>
                    <div class="inputOuter2">
                       
                        <input type="text" name="tel" maxlength="20" class="inputstyle2"/>
                    </div>
                   
                </li>
                
                <li>
                    <div class="inputArea">
                        <input type="submit"  style="margin-top:10px;margin-left:85px;" class="button_blue" value="提交注册"/>
                    </div>
                    
                </li><div class="cl"></div>
            </ul></form>
           
    
    </div>
   
    
    </div>
    <!--注册end-->
</div>

<div class="jianyi">*推荐使用IE9或以上版本IE浏览器或Chrome内核浏览器访问本站</div>
</body>
</html>
