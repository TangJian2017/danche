<?php
/**
 * Created by PhpStorm.
 * User: 唐佩良
 * Date: 2018/4/15
 * Time: 0:57
 */

include_once("../../common/init.php");
check_loginuser();
$tb_name = "orders";

$order_id = intval($_POST['order_id']);
if(!$order_id){
    goBakMsg("缺少参数order_id");
    exit();
}

$cars_id = intval($_POST['carsid']);
if(!$cars_id){
    goBakMsg("缺少参数carsid");
    exit();
}
$order = db_get_row("select * from {$tb_name} where id={$order_id}");

//把车设为维修
db_query("update cars set status='维修' where id={$cars_id}");
//扣除押金
$date_now = date('Y-m-d');
$date = diffBetweenTwoDays($order['begintime'],$date_now);
if($date == 0){
    $date = 1;
}
$price = 1 * $date;
db_query("update yajin set price=price-".$price." where studentid='{$_SESSION['stuname']}'");

//把订单设为已归还
db_query("update {$tb_name} set status='已归还',`price`={$price},`endtime`='{$date_now}' where `id`='{$order_id}'");

//添加维修信息
$insert_arr = array(
    'carsid' => $cars_id,
    'content' => "'".addslashes($_POST['content'])."'"
);
db_add('baoxiu',$insert_arr);


function diffBetweenTwoDays ($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);

    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}
?>

<body>
<h3>报修成功<br>本次借车：<?php echo $date?>天<br>开始借车时间：<?php echo $order['begintime']?><br>还车时间：<?php echo date('Y-m-d')?><br>共扣除金额：<?php echo $price?>元</h3>
</body>
</html>
