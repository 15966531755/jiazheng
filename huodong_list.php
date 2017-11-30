<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$tid  = empty($tid)  ? 0 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">

function d(){
	document.getElementById("area_index").style.display="block";
	}
function c(a){
	document.getElementById("diqu").value=a;
	document.getElementById("area_index").style.display="none";
	}


function DrawImage(ImgD,FitWidth,FitHeight){
    var image=new Image();
	image.src=ImgD.src;
	if(image.width>0 && image.height>0){
		if(image.width/image.height>= FitWidth/FitHeight){
			if(image.width>FitWidth){
				ImgD.width=FitWidth;
				ImgD.height=(image.height*FitWidth)/image.width;
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			}
		}else{
			if(image.height>FitHeight){
				ImgD.height=FitHeight;
				ImgD.width=(image.width*FitHeight)/image.height;
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			} 
		}
	}
	//居中
	if(ImgD.height < FitHeight ){
		var paddH = parseInt((FitHeight - ImgD.height)/2);
		ImgD.style.paddingTop    = paddH+"px";
		ImgD.style.paddingBottom = paddH+"px";
	}
	if(ImgD.width < FitWidth ){
		var paddW = parseInt((FitWidth - ImgD.width)/2);
		ImgD.style.paddingRight = paddW+"px";
		ImgD.style.paddingLeft  = paddW+"px";
	}
	//var paddH = parseInt((FitHeight - ImgD.height)/2);
	//var paddW = parseInt((FitWidth - ImgD.width)/2);
	//var paddH = ((FitHeight - ImgD.height)/2);
	//var paddW = ((FitWidth - ImgD.width)/2);
	//ImgD.style.padding = paddH+"px "+paddW+"px "+paddH+"px "+paddW+"px";
 }

</script>
</head>
<body>
<!-- header-->
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<!-- /header-->


<div class="dy c">
    <div class="dy_main">
	    <div class="dy_main_left fl">
		    <div class="dy_main_left_top l zt11">活动专区</div>
			<div class="dy_main_left_bottom l">
			    <ul>
                <? $dopage->GetPage("SELECT * FROM `#@__infoclass` WHERE (parentid=25 OR parentstr LIKE '%,25,%')  AND checkinfo=true ORDER BY orderid ASC");
				while($row = $dosql->GetArray())
				{
					if($cfg_isreurl != 'Y')
		             $gourl = 'huodong_list.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'huodong_list-'.$row['id'].'-1.html';
					
					if($cid == $row['id']){
					?>
				    <li><a class="n_list" href="<? echo $gourl;?>"><? echo $row['classname'];?></a></li>
                    <? }else{?>
                     <li><a href="<? echo $gourl;?>"><? echo $row['classname'];?></a></li>
					<? }}?>
				</ul>
			</div>
		</div>
		<div class="dy_main_right fr">
		    <div class="dy_main_right_top l zt9"><?php echo GetPosStr($cid); ?></div>
			<div class="hdlb">
			     
				 <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
					
					$date = date('Y-m-d',$row['posttime']);
				?>
				 
				 
				 <div class="hdlb_main">
				     <div class="hdlb_main_left fl"><a href="<?php echo $gourl; ?>"><img onload="javascript:DrawImage(this,'89','89');" src="<? echo $row['picurl'];?>" width="89" height="89"  /></a></div>
					 <div class="hdlb_main_right fr">
					      <div class="hdlb_main_right_top l zt12"><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?> [<?php echo $date; ?>]</a></div>
						  <div class="hdlb_main_right_bottom l" style="overflow:hidden;"><?php echo ReStrLen(strip_tags($row['content']),200); ?></div>
					 </div>
				 </div>
				 
                 <?php
				}
				?>
                 
                 
                 
				 
			</div>
		</div>
       
		<div class="clear"></div>
        
        	<?php echo $dopage->GetList(); ?>
	</div>
</div>





<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>