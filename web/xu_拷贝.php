<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($name_x) ? "" : $name_x;
$mobile  = empty($mobile_x)  ? "" : $mobile_x;
$province = empty($province) ? "" : $province;
$city = empty($city) ? "" : $city;
$area = empty($area) ? "" : $area;
$gz = empty($gz_x) ? "" : $gz_x;
$username = empty($username) ? "" : $username;

if($username){
$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];

$sql = "insert into `#@__zayi` (name,mobile,province,city,area,gz,userid)values('$name','$mobile','$province','$city','$area','$gz','$userid')";

if($dosql->ExecNoneQuery($sql))
	{
		 echo "<script>  window.location.href='float.php?gz=".$gz."';</script>";
	//	header("location:./");
		exit();
	}


}
//else{
	//setcookie("sessionid","1",time()+180);
//	$sessionid = $_COOKIE['sessionid'];
//	$sql = "insert into `#@__zayi` (name,mobile,province,city,area,gz,sessionid)values('$name','$mobile','$province','$city','$area','$gz','$sessionid')";
//      $dosql->ExecNoneQuery($sql);
//	 echo "";
//	
//	}

?>