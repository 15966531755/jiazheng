<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');

$kid = empty($OrderID) ? "" : $OrderID;
//$kid = empty($kid) ? "" : $kid;
$gongzuo = empty($gongzuo) ? "" : $gongzuo;
$name = empty($Name) ? "" : $Name;
$mobile  = empty($Mobile)  ? "" : $Mobile;
$province = empty($province) ? 0 : $province;
$city = empty($city) ? 0 : $city;
$area = empty($area) ? 0 : $area;
$HomeAddrMore = empty($HomeAddrMore) ? "" : $HomeAddrMore;
$IDNumber = empty($IDNumber) ? "" : $IDNumber;
$Birthday = empty($Birthday) ? "" : $Birthday;
$Nation = empty($Nation) ? "" : $Nation;
$gz = empty($Craft) ? "" : $Craft;
$username = empty($username) ? "" : $username;
$Education = empty($Education) ? 1 : $Education;
$Salary = empty($Salary) ? "" : $Salary;

$SelfEval = empty($SelfEval) ? "" : $SelfEval;

$huji = "";

if($province){
	$row_p = $dosql->GetOne("SELECT * FROM `province` WHERE provinceid='$province'");
	$huji = $huji . $row_p['province'];
	}
	if($city){
	$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE cityid='$city'");
	$huji = $huji.$row_c['city'];
	}
	if($area){
	$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE areaid='$area'");
	$huji = $huji.$row_a['area'];
	}
	$huji = $huji.$HomeAddrMore;
	
$date = date('Y-m-d',time());

//
//$date = empty($date) ? "" : $date;
//
//$jingyan = empty($jingyan) ? "" : $jingyan;

//$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
//$userid = $row['id'];
$userid = 0;

$sql = "insert into `#@__jianli` (kid,gongzuo,name,mobile,sfz,birthday,mz,huji,xueli,gz,userid,jianjie,date,gongzi)values('$kid','$gongzuo','$name','$mobile','$IDNumber','$Birthday','$Nation','$huji','$Education','$gz','$userid','$SelfEval','$date','$Salary')";

if($dosql->ExecNoneQuery($sql))
	{
		echo "<script type='text/javascript'>alert('提交成功');  window.location.href='guzhu.php?id=$kid';</script>";
		//header("location:guzhu.php?id=$kid");
		exit();
	}
?>