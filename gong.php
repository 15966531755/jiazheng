<?php 
require_once(dirname(__FILE__).'/include/config.inc.php');


$name = empty($_GET['name_g']) ? "" : $_GET['name_g'];
$mobile  = empty($_GET['mobile_g'])  ? "" : $_GET['mobile_g'];
$province = empty($_GET['provinces']) ? "" : $_GET['provinces'];
$city = empty($_GET['citys']) ? "" : $_GET['citys'];
$area = empty($_GET['areas']) ? "" : $_GET['areas'];
$gz = empty($_GET['gz_g']) ? "" : $_GET['gz_g'];
$username = empty($_GET['usernames']) ? "" : $_GET['usernames'];
if($username != ""){
$row = $dosql->GetOne("SELECT id FROM `#@__member` WHERE username='$username'"); 
$userid = $row['id'];
}else{
	$userid = 0;
	}

$sql = "insert into `#@__zgz` (name,mobile,province,city,area,gz,userid)values('$name','$mobile','$province','$city','$area','$gz','$userid')";

if($dosql->ExecNoneQuery($sql))
	{   
	    echo "
		<div id='light' class='white_content' style='display:block;'></div> 
        <div id='fade' class='black_overlay' style='display:block;'>
		<a href = 'javascript:void(0)' onclick = 'close_f()'><img class='dialog_close' src='images/dialog_close.png'/></a>
		<div class='tjcg2 c'>
  
</div>
</div>
";
	
	}
?>