<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
$id = empty($id) ? "" : $id;
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
<script>
   function tijiao(){
					   var username=document.getElementById("username").value;
					    var id=document.getElementById("id").value;
					   if(username == ""){
						   window.location.href="member.php?c=login";
						 
						   }
						   else{
							    window.location.href="job-"+id+".html";
							   }
					   }
</script>
</head>

<body>
 <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<div id="page">

        
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

<div class="textbox" style="padding-right:0;">
    <div class="job_detail">
        <h1 style="color: #249428;font-weight: bold;font-size: 1.8em;margin: 15px 0 20px 10px;">
      
        <? echo $row['name'];?> <? echo $row['gz'];?>
        </h1>
        <div class="buttons" style="float:right;">
<a class="button4"  onclick="tijiao();" style="color: #FFF; cursor:pointer; ">投简历</a>                
            </div>
            <input type="hidden" name="id" id="id" value="<? echo $row['id'];?>"/>
        <div class="info">
           
                <p style="margin: 0 0 6px 0;line-height: 1.8em;"><? if(!empty($row['ewxq'])){echo $row['ewxq'];}?></p>
                    <p style="margin: 0 0 6px 0;line-height: 1.8em;" class="salary">可接受工资：<span class="money"><? echo $row['xinzi'];?></span></p>
                <p style="margin: 0 0 6px 0;line-height: 1.8em;" class="salary">服务时间：<span class="money"><? echo $row['date'];?></span></p>
            
        </div>

        <!--<div class="manager">
            <div class="evaluation">
                <div class="text">
                    <span>我是这位雇主的所属经纪人</span> <a href="http://www.ayilaile.cn/Detail/Manager/c1afc7cf-1803-4707-9997-759ed5a5247e" target="_blank">丛金凤</a><br>
                    您现在可以 <a href="http://www.ayilaile.cn/Account/OrderJob?jid=1a38be55-1c30-4f76-adda-710a22488bc1" target="_blank">提交简历</a> 给我申请这个工作。
                </div>
            </div>
            <a href="http://www.ayilaile.cn/Detail/Manager/c1afc7cf-1803-4707-9997-759ed5a5247e" target="_blank"><img src="./王女士 包月小时工 阿姨来了 - 家政员在线预订及支付平台_files/bd520776.jpg" class="photo" alt="丛金凤" width="120" height="120"></a>
        </div>-->

        <div class="clear"></div>
    </div>
</div>
<div class="dark"></div>

<h2 style="margin:20px; 0 20px 20px; color: #249428;font-weight: bold;font-size: 1.5em;">您可能还感兴趣的雇主</h2>


<div id="jobList" class="list_box">
    
           





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


<div class="list_item">
    <div class="info">
        <div class="title">
<a href="guzhu-<? echo $row['id'];?>.html" target="_blank"><? echo $rows['name'];?> <? echo $rows['gz'];?></a>        </div>
        <div class="number"></div>
      
        <div class="summary"><? if($row_c['city'] != ""){echo $row_c['city'];}?><? if($row_a['area'] != ""){echo $row_a['area'];}?> </div>
        <div class="salary">
                可接受工资：<span class="money"><? echo $rows['xinzi'];?></span>
</div>
        <div class="bottom">
            
            <a class="view" href="guzhu-<? echo $rows['id'];?>.html" target="_blank">查看</a>
        </div>
    </div>
</div>

<? }?>



<div class="clear"></div>

<script language="javascript" type="text/javascript">
        
        $(function () {
            SetJobPage(103, 1, 1027);
        });
        
</script>

</div>

 <div class="aysx_main_bottom" style="text-align:center;">
			  <?php echo $dopage->GetLists(); ?>
			</div>




<div class="dark"></div>






        <div class="clear"></div>

    </div>
    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>