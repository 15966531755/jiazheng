<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('weblink');

/*
**************************
(C)2010-2014 phpMyWind.com
update: 2014-5-30 18:08:58
person: Feng
**************************
*/


//初始化参数
$tbname = '#@__city';
$gourl  = 'city.php';
$action = isset($action) ? $action : '';


//引入操作类
require_once(ADMIN_INC.'/action.class.php');


//添加友情链接
if($action == 'add')
{
   $sql1 = "select cityid,fatherid from city where city like  '%$city%'";
   $row = $dosql->GetOne($sql1);
	$sql = "INSERT INTO `$tbname` (cityid,city, checkinfo,fatherid) VALUES ('".$row['cityid']."','$city', '$checkinfo','".$row['fatherid']."');";
	if($dosql->ExecNoneQuery($sql))
	{
		header("location:$gourl");
		exit();
	}
}


//修改友情链接
else if($action == 'update')
{
	
	$sql = "UPDATE `$tbname` SET city='$city', checkinfo='$checkinfo' WHERE id=$id";
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