<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder');

/*
**************************
(C)2010-2014 phpMyWind.com
update: 2014-5-30 16:33:57
person: Feng
**************************
*/


//初始化参数
$tbname = '#@__zayi';
$gourl  = 'goodszay.php';
$action = isset($action) ? $action : '';

require_once(ADMIN_INC.'/action.class.php');

//引入操作类
if($action == 'update')
{
	
if(is_array($flag))
	{
		$flag = implode(',',$flag);
	}


	$sql = "UPDATE `$tbname` SET flag='$flag' WHERE id=$id";
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