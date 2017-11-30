<?php 

	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder');

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
$jingyan = empty($orderid) ? 0 : $orderid;

if(is_array($flag))
	{
		$flag = implode(',',$flag);
	}


$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];


$sql = "insert into `#@__ksyy` (name,mobile,province,city,area,gz,userid,ewxq,date,xinzi,jingyan,flag,orderid)values('$name','$mobile','$province','$city','$area','$gz','$userid','$ewxq','$date','$xinzi','$jingyan', '$flag', '$orderid')";

if($dosql->ExecNoneQuery($sql))
	{
		header("location:goodsksyy.php");
		exit();
	}
?>