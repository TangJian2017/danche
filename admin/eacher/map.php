<?php
include_once("../../common/init.php");
check_loginthe1();
$list = db_get_all("select `b`.`id`,`c`.`id` as `carid`,`c`.`title`,`c`.`lat`,`c`.`lng` from `baoxiu` as `b` join `cars` as `c` on `b`.`carsid`=`c`.`id` where `b`.`status`='维修中' and `b`.`eacherid`={$_SESSION['eachersid']}");

?>
<?php include_once("base.php");?>
<style>
    .map_box{height: 600px;}
</style>
<body>
<h2 style="text-align: center;margin: 15px">点击车辆可以直接修改维修状态</h2>
<div id="mapBox" class="map_box"></div>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.6&key=ea1a7b8b8265fda0230e7235809a6037"></script>
<script>
    var list = <?php echo json_encode($list)?>;
    console.log(list)
    var map = new AMap.Map('mapBox', {
        resizeEnable: true,
        mapStyle: 'amap://styles/c94e78bbbdccdee5a21c45f18da575b1'//样式URL
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
    for (var i=0;i<list.length;i++){
        if(list[i].lat > 0 && list[i].lng >0){
            var marker = new AMap.Marker({
                icon: "http://webapi.amap.com/theme/v1.3/markers/n/mark_r.png",
                position: [list[i].lat,list[i].lng], //基点位置
                draggable: true,  //是否可拖动
            });
            marker.setMap(map);
            marker.setLabel({//label默认蓝框白底左上角显示，样式className为：amap-marker-label
                offset: new AMap.Pixel(-40, -25),//修改label相对于maker的位置
                content: "车牌号："+list[i].title
            });
            marker.carinfo = list[i];
            AMap.event.addListener(marker, 'click', function (e) {
                window.location.href = "baoxiu_edit.php?carsid="+e.target.carinfo.carid+"&id="+e.target.carinfo.id;
            });
        }

    }

</script>
</body>
</html>