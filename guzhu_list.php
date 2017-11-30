<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 

$tid = empty($tid) ? 0 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<title>雇主发布</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>

</head>

<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<div id="page">


<h2 style="margin:20px; 0 20px 20px; color: #249428;font-weight: bold;font-size: 1.5em;">雇主发布</h2>


<div id="jobList" class="list_box">
    
           

<? 

$sql = "SELECT * FROM `#@__ksyy`   ORDER BY id DESC ";

       $dopage->GetPage($sql,8);
				while($row = $dosql->GetArray()){?>
<div class="list_item">
    <div class="info">
        <div class="title">
<a href="guzhu-<? echo $row['id'];?>.html" target="_blank"><? echo $row['name'];?> <? echo $row['gz'];?></a>        </div>
        <div class="number"></div>
        <? 
		if($row['city']){
	$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE cityid=".$row['city']);
	}
	if($row['area']){
	$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE areaid=".$row['area']);
	}
	
		$row_t1 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid != 0 and molds = 44");
	$row_t2 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid = 0 and molds = 44");
	if($row_t1){
	$total1 = $row_t1['total'];
	}
	else{$total1 = 0;}
	if($row_t2){
	$total2 = $row_t2['total'];
	}else{$total2 = 0;}
	$total = $total1+$total2;
			?>
        <div class="summary"><? if (!empty($row_c)){  if($row['city'] != "" and $row_c['city'] != ""){echo $row_c['city'];}?><? if( $row['area'] != "" and $row_a['area'] != ""){echo $row_a['area'];}}?> </div>
        
        <div class="salary">
                可接受工资：<span class="money"><? echo $row['xinzi'];?></span>
</div>
        <div class="bottom">
            <a class="view" href="guzhu-<? echo $row['id'];?>.html" target="_blank">查看</a>
        </div>
    </div>
</div>

<? }?>

<div class="clear"></div>


</div>

 <div class="aysx_main_bottom" style="  margin-bottom: 10px;">
			  <?php echo $dopage->GetList(); ?>
			</div>





    </div>
    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>