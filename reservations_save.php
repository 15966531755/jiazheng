<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');

//
//$name = empty($name) ? "" : $name;
//$mobile  = empty($mobile)  ? "" : $mobile;
//$province = empty($province) ? "" : $province;
//$city = empty($city) ? "" : $city;
//$area = empty($area) ? "" : $area;
//$username = empty($username) ? "" : $username;
//$ewxq = empty($ewxq) ? "" : $ewxq;
//$date = empty($date) ? "" : $date;
//$goods_id = empty($goods_id) ? "" : $goods_id;
//$bianhao = empty($bianhao) ? "" : $bianhao;


$name = empty($_GET['name']) ? "" : $_GET['name'];
$mobile  = empty($_GET['mobile'])  ? "" : $_GET['mobile'];
$province = empty($_GET['province']) ? 0 : $_GET['province'];
$city = empty($_GET['city']) ? 0 : $_GET['city'];
$area = empty($_GET['area']) ? 0 : $_GET['area'];
$username = empty($_GET['username']) ? "" : $_GET['username'];
$ewxq = empty($_GET['ewxq']) ? "" : $_GET['ewxq'];
$date = empty($_GET['date']) ? "" : $_GET['date'];
$goods_id = empty($_GET['goods_id']) ? "" : $_GET['goods_id'];
$bianhao = empty($_GET['bianhao']) ? "" : $_GET['bianhao'];
$jingliren = empty($_GET['jingliren']) ? "" : $_GET['jingliren'];
$gz = empty($_GET['gz']) ? "" : $_GET['gz'];
$amount = empty($_GET['amount']) ? 0 : $_GET['amount'];


$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];
$time = date('Y-m-d h:i:s',time());

$sql = "insert into `#@__yuyue` (name,mobile,province,city,area,goods_id,bianhao,userid,username,ewxq,date,checkinfo,paymode,time,jingliren,amount)values('$name','$mobile','$province','$city','$area', '$goods_id', '$bianhao', '$userid', '$username', '$ewxq','$date','','1','$time','$jingliren','$amount')";

if($dosql->ExecNoneQuery($sql))
	{  
	  echo "<div id='light' class='white_content' style='display:block;'></div> 
        <div id='fade' class='black_overlay' style='display:block;'>

<a href = 'javascript:void(0)' onclick = 'close_f()'><img class='dialog_close' src='images/dialog_close.png'/></a>
 
<div class='tjcg c'>
    <div class='tjcg_top'>";
	

	
	$dosql->Execute("select * from `#@__goods` where gz like '%".$gz."%' or typeid=".$gz."  or  area=".$area."    order by id  limit 9");
	
	
	while($rows = $dosql->GetArray()){
		if($rows['city']>0){
	$row_c = 	$dosql->GetOne("SELECT city FROM `city` WHERE cityid='".$rows['city']."'");
	$diqu = $row_c['city'];
		}
		else{$diqu="不限";}
		if($rows['area']>0){
	$row_a = 	$dosql->GetOne("SELECT area FROM `area` WHERE areaid='".$rows['area']."'");
	$diqu = $diqu.$row_a['area'];
		}else{
			$diqu="不限";
			}
	
		
	echo"
	<a href='goodsshow-".$rows['classid']."-".$rows['typeid']."-".$rows['id']."-1.html'>
	    <div class='tjcg_top_main fl'>
		    <div class='tjcg_top_main_left fl'><img onload='javascript:DrawImage(this,'75','75');' width='75' height='75' src='".$rows['picurl']."' /></div>
			<div class='tjcg_top_main_right fr'>
			    <div class='tjcg_top_main_right_top l'>
				    <div class='tjcg_top_main_right_top_left fl'>".$rows['title']."</div>
					<div class='tjcg_top_main_right_top_right fl'><img src='images/76.jpg' style='margin-left:5px; margin-top:5px;' /></div>
				</div>
				<div class='tjcg_top_main_right_main l' title=".$diqu.">工作地址：".$diqu."</div>
				<div class='tjcg_top_main_right_bottom l'>
				    <div class='tjcg_top_main_right_bottom_left fl'>参考工资：</div>
					<div class='tjcg_top_main_right_bottom_right fl'>".$rows['xinchou']."元/月</div>
				</div>
			</div>
		</div></a>";
		
	}
		
		
		
		
		
	
		echo "
	<a href='goods-21-".$gz."-1.html'><div class='tjcg_bottom'>查看更多</div></a>
</div>


        </div> 
'";
	}
?>