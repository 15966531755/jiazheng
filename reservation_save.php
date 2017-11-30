<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($_GET['name']) ? "" : $_GET['name'];
$mobile  = empty($_GET['mobile'])  ? "" : $_GET['mobile'];
$province = empty($_GET['province']) ? 0 : $_GET['province'];
$city = empty($_GET['city']) ? 0 : $_GET['city'];
$area = empty($_GET['area']) ? 0 : $_GET['area'];
$gz = empty($_GET['gz']) ? "" : $_GET['gz'];
$username = empty($_GET['username']) ? "" : $_GET['username'];
$ewxq = empty($_GET['ewxq']) ? "" : $_GET['ewxq'];
$date = empty($_GET['date']) ? "" : $_GET['date'];
$xinzi = empty($_GET['xinzi']) ? "" : $_GET['xinzi'];
$jingyan = empty($_GET['jingyan']) ? "" : $_GET['jingyan'];

$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];


$sql = "insert into `#@__ksyy` (name,mobile,province,city,area,gz,userid,ewxq,date,xinzi,jingyan)values('$name','$mobile','$province','$city','$area','$gz','$userid','$ewxq','$date','$xinzi','$jingyan')";

if($dosql->ExecNoneQuery($sql))
	{
		 echo "<div id='light' class='white_content' style='display:block;'></div> 
        <div id='fade' class='black_overlay' style='display:block;'>

<a href = 'javascript:void(0)' onclick = 'close_f()'><img class='dialog_close' src='images/dialog_close.png'/></a>
 
<div class='tjcg c'>
    <div class='tjcg_top'>";
	
	$row1 = $dosql->GetOne("SELECT id FROM `#@__goodstype` WHERE classname='".$gz."'");
	
	$dosql->Execute("select * from `#@__goods` where gz like '%".$row1['id']."%' or  area=".$area."    order by id  limit 9");
	
	
	while($rows = $dosql->GetArray()){
		
	$row_c = 	$dosql->GetOne("SELECT city FROM `city` WHERE cityid='".$city."'");
	$row_a = 	$dosql->GetOne("SELECT area FROM `area` WHERE areaid='".$area."'");
		
	echo"
	<a href='goodsshow-".$rows['classid']."-".$rows['typeid']."-".$rows['id']."-1.html'>
	    <div class='tjcg_top_main fl'>
		    <div class='tjcg_top_main_left fl'><img onload='javascript:DrawImage(this,'75','75');' width='75' height='75' src='".$rows['picurl']."' /></div>
			<div class='tjcg_top_main_right fr'>
			    <div class='tjcg_top_main_right_top l'>
				    <div class='tjcg_top_main_right_top_left fl'>".$rows['title']."</div>
					<div class='tjcg_top_main_right_top_right fl'><img src='images/76.jpg' style='margin-left:5px; margin-top:5px;' /></div>
				</div>
				<div class='tjcg_top_main_right_main l' title=".$row_c['city'].$row_a['area'].">工作地址：".$row_c['city'].$row_a['area']."</div>
				<div class='tjcg_top_main_right_bottom l'>
				    <div class='tjcg_top_main_right_bottom_left fl'>参考工资：</div>
					<div class='tjcg_top_main_right_bottom_right fl'>".$rows['xinchou']."元/月</div>
				</div>
			</div>
		</div></a>";
		
	}
		
		
		
		
		
	
		echo "
	<a href='goods-21-".$row1['id']."-1.html'><div class='tjcg_bottom'>查看更多</div></a>
</div>


        </div> 
'";
	}
?>