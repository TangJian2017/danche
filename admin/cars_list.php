<?php 
	include_once("../common/init.php");
	check_login();
	$categoryA = db_get_all("select * from category order by id desc");
	$tb_name = "cars";
	$where_sql = " 1=1 ";
	if ($_REQUEST["title"]) {
		$where_sql .= " and title like '%". $_REQUEST["title"] ."%' ";
	}
	
	if ($_REQUEST["categoryid"]) {
		$where_sql .= " and categoryid =". $_REQUEST["categoryid"] ." ";
	}
	$page = $_REQUEST["page"]?$_REQUEST["page"]:1;
	$list = db_get_page("select * from $tb_name where $where_sql order by id desc", $page,11);
	if ($page*1>$list["page"]*1){
		$page = $list["page"];
	}
	$Page = new PageWeb($list["total"],$list["page_size"], "title=".$_REQUEST["title"]."&categoryid=".$_REQUEST["categoryid"], $page);
	$page_show = $Page->show(); 
?>
<?php include_once("base.php");?>
<link href="https://cdn.bootcss.com/element-ui/2.3.7/theme-chalk/index.css" rel="stylesheet">
<style>
    .map_box{height: 500px;}
</style>
<body>
<div id="app">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
            <td valign="top">
                <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
                    <tr bgcolor="#FFFFFF"><td height="31"><div class="title">车辆管理</div></td></tr>
                </table>
            </td>
            <td width="16" rowspan="2" bgcolor="#FFFFFF"></td>
        </tr>
        <tr>
            <td valign="top" bgcolor="#F7F8F9">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr><td colspan="4" height="10"></td></tr>
                    <tr><td width="1%">&nbsp;</td><td width="96%">
                            <table width="100%" class="cont">
                                <tr>
                                    <td width="1%"></td>
                                    <td>
                                        <form id="pagerForm" action="?" method="post">
                                            <input type="hidden" name="pageNum" value="<?php echo $page; ?>"/>
                                            <select name="categoryid">
                                                <option value="">-- 请选择 --</option>
                                                <?php
                                                foreach($categoryA as $row) {
                                                    ?>
                                                    <option value="<?php echo $row["id"];?>" <?php if($_REQUEST["categoryid"]==$row["id"]){echo ' selected="selected" ';}?>><?php echo $row["title"];?></option>
                                                <?php } ?>
                                            </select> <input type="text" name="title" class="text" placeholder="车牌号" value="<?php echo $_REQUEST["title"]; ?>"/>
                                            <button type="submit"  id="chaxun" class="btn">查询</button>
                                        </form></td></tr></table>
                        </td><td width="1%">&nbsp;</td></tr>
                    <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="96%">
                            <table width="100%">
                                <td colspan="2">
                                    <table width="100%"  class="cont tr_color">
                                        <tr>
                                            <th width="82">编号</th>
                                            <th>车牌号</th>
                                            <th>车龄</th>
                                            <th>颜色</th>
                                            <th>状态</th>
                                            <th width="140">操作</th>
                                        </tr>
                                        <?php
                                        foreach($list["data"] as $row) {
                                            ?>
                                            <tr align="center" class="d">
                                                <td align="center"><?php echo $row['id'];?></td>
                                                <td><?php echo $row['title'];?></td>
                                                <td><?php echo $row['ages'];?></td>
                                                <td><?php echo $row['colors'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                                <td align="center">
                                                    <a href="javascript:;" @click="showPosition(<?php echo $row['lat']?:0?>,<?php echo $row['lng']?:0?>,'<?php echo $row['title']?:''?>')">位置</a>
                                                    <?php if($row['status']=="正常"){?>
                                                        <a href="baoxiu_edit.php?carsid=<?php echo $row['id'];?>">报修</a>
                                                    <?php }?>
                                                    <a href="<?php echo $tb_name;?>_edit.php?id=<?php echo $row['id'];?>">编辑</a>
                                                    <a href="del.php?id=<?php echo $row['id'];?>&del=<?php echo $tb_name;?>" onClick="return confirm('真的要删除?不可恢复!');">删除</a></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
                                <tr>
                                    <td align="center"><?php echo $page_show;?></td>
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
    <el-dialog title="停放位置查看"
               fullscreen
               :visible.sync="dialogVisible">
        <div id="mapBox" class="map_box"></div>
    </el-dialog>
</div>
<script src="https://cdn.bootcss.com/vue/2.5.17-beta.0/vue.js"></script>
<script src="https://cdn.bootcss.com/element-ui/2.3.7/index.js"></script>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.6&key=ea1a7b8b8265fda0230e7235809a6037"></script>
<script>
    new Vue({
        el:'#app',
        data:{
            dialogVisible:false,
        },
        methods:{
            showPosition:function (lat,lng,no) {
                if(lat>0 && lng>0){
                    this.dialogVisible = true;
                    this.$nextTick(function () {
                        var map = new AMap.Map('mapBox', {
                            zoom: 17,
                            resizeEnable: true,
                            mapStyle: 'amap://styles/c94e78bbbdccdee5a21c45f18da575b1',//样式URL
                            center: [lat,lng]
                        });
                        map.plugin('AMap.Geolocation', function() {
                            geolocation = new AMap.Geolocation({
                                enableHighAccuracy: true,//是否使用高精度定位，默认:true
                                timeout: 10000,          //超过10秒后停止定位，默认：无穷大
                                buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
                                zoomToAccuracy: true,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
                                buttonPosition:'RB'
                            });
                            map.addControl(geolocation);
                        });
                        var marker = new AMap.Marker({
                            icon: "http://webapi.amap.com/theme/v1.3/markers/n/mark_r.png",
                            position: [lat,lng], //基点位置
                            draggable: true,  //是否可拖动
                        });
                        marker.setMap(map);
                        marker.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
                            offset: new AMap.Pixel(-40, -25),//修改label相对于maker的位置
                            content: "车牌号："+no
                        });
                    });
                }else{
                    this.$message({
                        message: '该车辆未设置位置，请先设置车辆位置后再进行查看吧',
                        type: 'warning'
                    });
                }
            },
        }
    })
</script>
</body>
</html>