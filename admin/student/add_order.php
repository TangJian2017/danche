<?php
/**
 * Created by PhpStorm.
 * User: 唐佩良
 * Date: 2018/4/14
 * Time: 18:39
 */

include_once("../../common/init.php");
check_loginuser();
$tb_name = "orders";

$cars_id = intval($_GET['carsid']);
if(!$cars_id){
    goBakMsg("缺少参数carsid");
    exit();
}
$rs1 = db_get_row("select * from cars where id={$cars_id}");
$row1 = db_get_row("select * from yajin where studentid='". $_SESSION["stuname"] ."'");
if (!$row1["id"]) {
    goBakMsg("没有交押金！");
    die;
}else{
    if ($row1["price"]<300) {
        goBakMsg("押金不够！");
        die;
    }
}

if(!empty($_POST['submit'])){
    $data = array();
    $data["status"] = "'借出'";
    $data["studentid"] = "'".$_SESSION["stuname"]."'";
    $data["carsid"] = "'".$_POST["carsid"]."'";
    $data["carstitle"] = "'".$_POST["carstitle"]."'";
    $data["endtime"] = "'".$_POST["endtime"]."'";
    $data["begintime"] = "'".$_POST["begintime"]."'";

    $data["price"] = "'".$_POST["price"]."'";
    $res = db_add($tb_name,$data);
    if($res > 0){
        db_query("update cars set status='借出' where id=".$_POST["carsid"]);
        urlMsg("操作成功",'orders.php');
        exit();
    }
    else{
        goBakMsg("借车失败");
    }
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
                                    <form name="add" method="post" action="">
                                        <input type="hidden" name="carsid" value="<?php echo $rs1["id"];?>" />
                                        <input type="hidden" name="carstitle" value="<?php echo $rs1["title"];?>" />
                                        <input type="hidden" name="submit" value="1" />
                                        <input id="price2" type="hidden" name="price" value="0" />
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
                                                <td width="200"><?php echo $_SESSION["stuname"] ?></td>
                                                <td></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td width="120" align="right">提车日期：</td>
                                                <td width="200"><script language="javascript" type="text/javascript" src="../../My97DatePicker/WdatePicker.js"></script>
                                                    <input name="begintime" id="datepicker1" onchange="dateChange()"  onClick="WdatePicker()" style="width:350px;" class="text" value="<?php echo $rs["begintime"];?>"  required></td>
                                                <td></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td width="120" align="right">还车日期：</td>
                                                <td width="200"><script language="javascript" type="text/javascript" src="../../My97DatePicker/WdatePicker.js"></script>
                                                    <input name="endtime" id="datepicker2" onchange="dateChange()" onClick="WdatePicker()" style="width:350px;" class="text"  value="<?php echo $rs["endtime"];?>" required></td>
                                                <td></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td width="120" align="right">预计金额：</td>
                                                <td width="200" id="price"></td>
                                                <td></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="right"><input class="btn" type="submit" value="提交" onclick='return check()'  /></td>
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
<script>
    function dateChange() {
        var start = $("#datepicker1").val();
        var end = $("#datepicker2").val();

        if(start && end){
            var time = getTime2Time(end,start);
            if(time == 0){
                time = 1;
            }
            var sum = time * 1;
            $("#price").text(sum);
            $("#price2").val(sum);
        }else{
            $("#price").text('0');
            $("#price2").val('0');
        }
    }
    function check() {
        var start = $("#datepicker1").val();
        var end = $("#datepicker2").val();
        if(start && end){
            dateChange();
            return true
        }
        alert('请选择时间');
        return false;
    }

    function getTime2Time(time1, time2)
    {
        time1 = Date.parse(time1)/1000;
        time2 = Date.parse(time2)/1000;
        var time_ = time1 - time2;
        return (time_/(3600*24));
    }
</script>
</body>
</html>
