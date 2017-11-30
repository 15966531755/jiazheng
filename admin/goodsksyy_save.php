<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder');

/*
**************************
(C)2010-2014 phpMyWind.com
update: 2014-5-30 16:33:57
person: Feng
**************************
*/


//初始化参数
$tbname = '#@__ksyy';
$gourl  = 'goodsksyy.php';
$action = isset($action) ? $action : '';
$name = empty($name) ? "" : $name;
$mobile  = empty($mobile)  ? "" : $mobile;
$province = empty($province) ? 0 : $province;
$city = empty($city) ? 0 : $city;
$area = empty($area) ? 0 : $area;
$gz = empty($gz) ? "" : $gz;
$username = empty($username) ? "" : $username;
$ewxq = empty($ewxq) ? "" : $ewxq;
$date = empty($date) ? "" : $date;
$xinzi = empty($xinzi) ? "" : $xinzi;
$jingyan = empty($jingyan) ? "" : $jingyan;
$orderid = empty($orderid) ? 0 : $orderid;



//引入操作类
	require_once(ADMIN_INC.'/action.class.php');
if($action == 'update')
{
	
if(is_array($flag))
	{
		$flag = implode(',',$flag);
	}


	$sql = "UPDATE `$tbname` SET flag='$flag', name='$name', mobile='$mobile', province='$province',city='$city', area='$area', gz='$gz',ewxq='$ewxq',date='$date',xinzi='$xinzi',jingyan='$jingyan', orderid='$orderid' WHERE id=$id";
	if($dosql->ExecNoneQuery($sql))
	{
    	header("location:$gourl");
		exit();
	}
}


//修改订单信息
if($action == 'del')
{

	

	$sql = "delete  from `$tbname` WHERE id=$id";
	if($dosql->ExecNoneQuery($sql))
	{
    	header("location:$gourl");
		exit();
	}
}


//无条件返回
else
{
    header("location:$gourl");
	exit();
}
?>