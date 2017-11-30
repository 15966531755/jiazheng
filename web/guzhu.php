<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
$id = empty($id) ? "" : $id;
$tid = empty($tid) ? 0 : intval($tid);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<link rel="stylesheet"  href="templates/default/style/css.css" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">

<title>雇主发布</title>
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script>
   function tijiao(){
					   var username=document.getElementById("username").value;
					    var id=document.getElementById("id").value;
					   if(username == ""){
						   window.location.href="member.php?c=login";
						 
						   }
						   else{
							    window.location.href="job.php?&aid="+id;
							   }
					   }
</script>
</head>

<body>
 <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
 
<div class="myorder_top">
	<p>雇主发布--详情页面</p>
</div>

 <? 	
			$row = $dosql->GetOne("SELECT * FROM `#@__ksyy` WHERE id=$id");
			
			if($row['city']){
	$row_c1 = $dosql->GetOne("SELECT * FROM `city` WHERE cityid=".$row['city']);
	}
	if($row['area']){
	$row_a1 = $dosql->GetOne("SELECT * FROM `area` WHERE areaid=".$row['area']);
	}
	
	//$row_t3 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid != 0 and molds = 44");
//	$row_t4 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid = 0 and molds = 44");
//	if($row_t3){
//	$total3 = $row_t3['total'];
//	}
//	else{$total3 = 0;}
//	if($row_t4){
//	$total4 = $row_t4['total'];
//	}else{$total4 = 0;}
//			
//			$total=$total3+$total4;
			?>
 <input type="hidden" name="id" id="id" value="<? echo $row['id'];?>"/>
<div class="gzdt_con_box">
	<div class="gzdt_con">
        <p>雇主：<? echo $row['name'];?></p>
        <span>
        需求：<? echo $row['gz'];?><br>
        <? if(!empty($row['ewxq'])){?>要求：<? echo $row['ewxq'];}?>
        可接受工资:<? echo $row['xinzi'];?><br>
        服务时间：<? echo $row['date'];?><br>
        地址<? if (!empty($row_c)){ ?>：<? echo $row_c1['city'];?><? echo $row_a1['area'];?> <? }?>
        </span>
        <div class="gzdt_jl"><a class="button4"  onclick="tijiao();" style="color: #FFF; cursor:pointer; ">投递简历</a></div>
    </div>
</div>

<div class="gzfb">
	<div class="gzfb_tlt">
    	<img src="web_images/gufb.png" style="float:left;">
    	<div class="arrow fr"><a href="guzhu_list.php"><img src="web_images/arrow01.png"></a></div>
    </div>
    <div class="gzfb_con">
    	<ul>
        
        <? 

$sql = "SELECT * FROM `#@__ksyy`  where gz ='".$row['gz']."'  and  id!=".$id."  ORDER BY id DESC ";
$dopage->GetPage($sql,8);
				while($rows = $dosql->GetArray()){
					
					if($rows['city']){
	$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE cityid=".$rows['city']);
	}
	if($rows['area']){
	$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE areaid=".$rows['area']);
	}
	
//	$row_t1 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$rows['id']." and uid != 0 and molds = 44");
//	$row_t2 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$rows['id']." and uid = 0 and molds = 44");
//	if($row_t1){
//	$total1 = $row_t1['total'];
//	}
//	else{$total1 = 0;}
//	if($row_t2){
//	$total2 = $row_t2['total'];
//	}else{$total2 = 0;}
	
	
					?>

        <li>
        <div class="gzfb_li">
            <p><? echo $rows['gz'];?>&nbsp;<? echo $rows['name'];?><br>
           所在地: <? if (!empty($row_c)){ if($row_c['city'] != ""){echo $row_c['city'];}?><? if($row_a['area'] != ""){echo $row_a['area'];}}?> <br>
            可接受工资：<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<? echo $rows['xinzi'];?></p>
            <div class="gzfb_ck"><span><a class="view" style="color:#FFF;" href="guzhu.php?id=<? echo $rows['id'];?>" target="_blank">查看</a></span></div>
        </div>
        </li>
       <? }?>
        </ul>
    </div>
    <? echo $dopage->GetList_web();?>
</div>


            
<div class="blank"></div>

    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>