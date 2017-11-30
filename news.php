<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$tid = empty($tid) ? 15 : intval($tid);
$cid = empty($cid) ? 4 : intval($cid);
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
</head>
<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->


<div class="dy c">
    <div class="dy_main">

	    <div class="dy_main_left fl">
		    <div class="dy_main_left_top l zt11">培训分类</div>
			<div class="dy_main_left_bottom l">
			    <ul>
                <? $dopage->GetPage("SELECT * FROM `#@__infoclass` WHERE (parentid=15 OR parentstr LIKE '%,15,%')  AND checkinfo=true ORDER BY orderid ASC");
				while($row = $dosql->GetArray())
				{
					if($cfg_isreurl != 'Y')
		             $gourl = 'news.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'news-'.$row['id'].'-1.html';
					
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
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
					
					$date = date('Y-m-d',$row['posttime']);
				?>
				 
				 
				 <div class="hdlb_main">
				     <div class="hdlb_main_left fl"><a href="<?php echo $gourl; ?>"><img src="<? echo $row['picurl'];?>" width="89" height="89" /></a></div>
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