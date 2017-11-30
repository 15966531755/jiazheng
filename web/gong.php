<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($_POST['name_g']) ? "" : $_POST['name_g'];
$mobile  = empty($_POST['mobile_g'])  ? "" : $_POST['mobile_g'];
$province = empty($_POST['province']) ? "" : $_POST['province'];
$city = empty($_POST['city']) ? "" : $_POST['city'];
$area = empty($_POST['area']) ? "" : $_POST['area'];
$gz = empty($_POST['gz_g']) ? "" : $_POST['gz_g'];
$username = empty($_POST['usernames']) ? "" : $_POST['usernames'];
if($username != ""){
$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];
}else{
	$userid = 0;
	}

$sql = "insert into `#@__zgz` (name,mobile,province,city,area,gz,userid)values('$name','$mobile','$province','$city','$area','$gz','$userid')";

if($dosql->ExecNoneQuery($sql))
	{   
	ShowMsg('发布成功！','gong_add.php');
	}
?>