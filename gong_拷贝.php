<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($name_g) ? "" : $name_g;
$mobile  = empty($mobile_g)  ? "" : $mobile_g;
$province = empty($provinces) ? "" : $provinces;
$city = empty($citys) ? "" : $citys;
$area = empty($areas) ? "" : $areas;
$gz = empty($gz_g) ? "" : $gz_g;
$username = empty($usernames) ? "" : $usernames;
if($username != ""){
$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];
}else{
	$userid = 0;
	}

$sql = "insert into `#@__zgz` (name,mobile,province,city,area,gz,userid)values('$name','$mobile','$province','$city','$area','$gz','$userid')";

if($dosql->ExecNoneQuery($sql))
	{   
	    echo "<script> alert('提交成功'); window.location.href='./';</script>";
	//	header("location:./");
		exit();
	}
?>