<?php
include_once("../common/init.php");
check_login();
$tb_name = "baoxiu";
$where_sql = " 1=1 ";

if ($_REQUEST["status"]) {
    $where_sql .= " and status ='" . $_REQUEST["status"] . "'";
}
$page = $_REQUEST["page"] ? $_REQUEST["page"] : 1;

$list = db_get_page("select * from $tb_name where $where_sql order by id desc", $page, 11);
if ($page * 1 > $list["page"] * 1) {
    $page = $list["page"];
}
$Page = new PageWeb($list["total"], $list["page_size"], "status=" . $_REQUEST["status"], $page);
$page_show = $Page->show();
?>
<?php include_once("base.php"); ?>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
        <td valign="top">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
                <tr bgcolor="#FFFFFF">
                    <td height="31">
                        <div class="title">报修管理</div>
                    </td>
                </tr>
            </table>
        </td>
        <td width="16" rowspan="2" bgcolor="#FFFFFF"></td>
    </tr>
    <tr>
        <td valign="top" bgcolor="#F7F8F9">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="4" height="10"></td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="96%">
                        <table width="100%" class="cont">
                            <tr>
                                <td width="1%"></td>
                                <td>
                                    <form id="pagerForm" action="?" method="post">
                                        <input type="hidden" name="pageNum" value="<?php echo $page; ?>"/>
                                        <select name="status">
                                            <option value="">选择状态</option>
                                            <option value="维修中" <?php if ($_REQUEST["status"] == "维修中") {
                                                echo "selected";
                                            } ?>>维修中
                                            </option>
                                            <option value="完成" <?php if ($_REQUEST["status"] == "完成") {
                                                echo "selected";
                                            } ?>>完成
                                            </option>
                                        </select>
                                        <button type="submit" id="chaxun" class="btn">查询</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="96%">
                        <table width="100%">
                            <td colspan="2">
                                <table width="100%" class="cont tr_color" id="info">
                                    <tr>
                                        <th width="82" >编号</th>
                                        <th >车牌号</th>
                                        <th >维修人员</th>
                                        <th >提交时间</th>
                                        <th >车辆状态</th>
                                        <th width="120">操作</th>
                                    </tr>
                                    <?php
                                    foreach ($list["data"] as $row) {
                                        ?>
                                        <tr align="center" class="d">
                                            <td align="center"><?php echo $row['id']; ?></td>
                                            <td><?php echo db_get_val("cars", $row["carsid"], "title") ?></td>
                                            <td><?php echo db_get_val("eacher", $row["eacherid"], "tname") ?: '<span style="color: red;">待分配</span>' ?></td>
                                            <td><?php echo $row['addtime']; ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td align="center"><a
                                                    href="baoxiu_edit.php?id=<?php echo $row['id']; ?>&carsid=<?php echo $row['carsid']; ?>">修改</a>
                                                <a href="del.php?id=<?php echo $row['id']; ?>&del=baoxiu"
                                                   onClick="return confirm('真的要删除?不可恢复!');">删除</a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            </tr>
                        </table>
                        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
                            <tr>
                                <td align="center"><?php echo $page_show; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="1%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>






