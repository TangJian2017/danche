<?php 
	include_once("../common/init.php");
	check_login();
	$categoryA = db_get_all("select * from category order by id desc");
	$tb_name = "cars";
	if ($_REQUEST["id"]) {
		$rs = db_get_row("select * from $tb_name where id=". $_REQUEST["id"]);
	}
	if ($_POST){
		if ($_REQUEST["id"]) {
		} else {
			$row = db_get_row("select * from cars where title='". $_POST["title"] ."'");
			if ($row["id"]) {
				goBakMsg("已存在相同名称，请重新填写");
				die;
			}
		}
		$data = array();
		$data["title"] = "'".$_POST["title"]."'";
		$data["ages"] = "'".$_POST["ages"]."'";	
		$data["categoryid"] = "'".$_POST["categoryid"]."'";
		$data["colors"] = "'".$_POST["colors"]."'";
		$data["status"] = "'".$_POST["status"]."'";
		$data["lat"] = "'".$_POST["lat"]."'";
        $data["lng"] = "'".$_POST["lng"]."'";
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
		if ($_REQUEST["id"]) {
			$res = db_mdf($tb_name,$data,$_REQUEST["id"]);
		} else {
			db_add($tb_name,$data);
		}
		goBakMsg("操作成功");
		die;
	}
?>
<?php include_once("base.php");?>
<script>
function checkadd()
{
	if (document.add.title.value=='')
	{
	alert('车牌号不能为空');
	document.add.title.focus;
	return false
	}
}
</script>
<link href="https://cdn.bootcss.com/element-ui/2.3.7/theme-chalk/index.css" rel="stylesheet">
<style>
    .lat_box{display: flex;align-items: center}
    .lat_box .item{display: flex;}
    .lat_box .item span{flex: none;}
    .lat_box button{width: 40px;margin-left: 13px;}
    .map_box{height: 500px;margin-top: 10px;}
    .dialog-footer{text-align: center;}
</style>
<body>
<div id="app">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="17" rowspan="2" valign="top" bgcolor="#FFFFFF"></td>
            <td valign="top">
                <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
                    <tr bgcolor="#FFFFFF"><td height="31"><div class="title">添加车辆</div></td></tr>
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
                                        <form name="add" method="post" action="?" onSubmit="return checkadd()"  enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $rs["id"];?>" />
                                            <table width="100%" class="cont">
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right">车牌号：</td>
                                                    <td width="200"><input name="title" type="text" class="text" size="30" v-model="form.title"></td>
                                                    <td></td>
                                                    <td width="2%">&nbsp;</td>
                                                </tr>
                                                <?php
                                                if(!empty($categoryA[0])){
                                                    ?>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td align="right"><span class="red">*</span> 选择品牌：</td>
                                                        <td>
                                                            <select name="categoryid">
                                                                <?php foreach($categoryA as $row) {	?>
                                                                    <option value="<?php echo $row["id"];?>" <?php if($rs["categoryid"]==$row["id"]){echo ' selected="selected" ';}?>><?php echo $row["title"];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right">颜色：</td>
                                                    <td width="200"><input name="colors" type="text" class="text" size="30" value="<?php echo $rs["colors"];?>"></td>
                                                    <td></td>
                                                    <td width="2%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right">车龄：</td>
                                                    <td width="200"><input name="ages" type="text" class="text" size="30" value="<?php echo $rs["ages"];?>"></td>
                                                    <td></td>
                                                    <td width="2%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right"> 图片上传：</td>
                                                    <td width="200"><input type="file" name="img" class="text" id="img"><?php if(!empty($rs['img'])){?><img src="<?php echo __PUBLIC__;?>/Upload/<?php echo $rs["img"];?>" height="50" width="50"/><?php }?></td>
                                                    <td></td>
                                                    <td width="2%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right">状态：</td>
                                                    <td width="200">
                                                        <select name="status">
                                                            <option value="正常" <?php if($rs["status"]=="正常"){echo "selected";}?>>正常</option>
                                                            <option value="维修" <?php if($rs["status"]=="维修"){echo "selected";}?>>维修</option>
                                                            <option value="报废" <?php if($rs["status"]=="报废"){echo "selected";}?>>报废</option>
                                                        </select></td>
                                                    <td></td>
                                                    <td width="2%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="120" align="right">车辆所在位置：</td>
                                                    <td width="200">
                                                        <div class="lat_box">
                                                            <div>
                                                                <div class="item">
                                                                    <span>纬度：</span><input v-model="form.lat" name="lat">
                                                                </div>
                                                                <div class="item">
                                                                    <span>经度：</span><input v-model="form.lng" name="lng">
                                                                </div>
                                                            </div>
                                                            <button type="button" @click="choisePosition()">点击选择</button>
                                                        </div>
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
    <el-dialog title="选择单车的停放位置"
               fullscreen
               :visible.sync="dialogVisible">
        <el-alert title="点击地图选择单车当前的停放位置后点击确定即可" type="success"></el-alert>
        <div id="mapBox" class="map_box"></div>
        <div slot="footer" class="dialog-footer">
            <el-button @click="dialogVisible = false">取 消</el-button>
            <el-button type="primary" @click="saveMap()">确 定</el-button>
        </div>
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
            form:{
                lat:'<?php echo $rs['lat']?:0?>',
                lng:'<?php echo $rs['lng']?:0?>',
                title:'<?php echo $rs['title'];?>',
            },
            map:{
                lat:'0',
                lng:'0'
            }
        },
        methods:{
            choisePosition:function () {
                var _this = this;
                this.dialogVisible = true;
                this.$nextTick(function () {
                    var map = new AMap.Map('mapBox', {
                        resizeEnable: true,
                        mapStyle: 'amap://styles/c94e78bbbdccdee5a21c45f18da575b1'//样式URL
                    });
                    map.on('click', function(e) {
                        updateMarker(e.lnglat.getLng(), e.lnglat.getLat())
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
                        geolocation.getCurrentPosition();
                    });
                    var marker = new AMap.Marker({
                        icon: "http://webapi.amap.com/theme/v1.3/markers/n/mark_r.png",
                        position: [_this.form.lat,_this.form.lng], //基点位置
                        draggable: true,  //是否可拖动
                    });
                    marker.setMap(map);
                    marker.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
                        offset: new AMap.Pixel(-40, -25),//修改label相对于maker的位置
                        content: "车牌号："+_this.form.title
                    });
                    function updateMarker(lat,lng) {
                        _this.map.lat = lat;
                        _this.map.lng = lng;
                        marker.setPosition([lat, lng]); //更新点标记位置
                    }

                });
            },
            //确认变更地点
            saveMap:function () {
                this.form.lat = this.map.lat;
                this.form.lng = this.map.lng;
                this.dialogVisible = false;
            }
        }
    })
</script>
</body>
</html>
