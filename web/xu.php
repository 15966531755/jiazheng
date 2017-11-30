<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($_POST['name_x']) ? "" : $_POST['name_x'];
$mobile  = empty($_POST['mobile_x'])  ? "" : $_POST['mobile_x'];
$province = empty($_POST['province']) ? 0 : $_POST['province'];
$city = empty($_POST['city']) ? 0 : $_POST['city'];
$area = empty($_POST['area']) ? 0 : $_POST['area'];
$gz = empty($_POST['gz_x']) ? "" : $_POST['gz_x'];
$username = empty($_POST['username']) ? "" : $_POST['username'];
if($username != ""){
$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];
}else{
	$userid= 0;
	}

$sql = "insert into `#@__zayi` (name,mobile,province,city,area,gz,userid)values('$name','$mobile','$province','$city','$area','$gz','$userid')";

if($dosql->ExecNoneQuery($sql))
	{
		
	ShowMsg('发布成功！','xu_add.php');
	}
?>