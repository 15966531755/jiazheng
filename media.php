<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$tid = empty($tid) ? 54 : intval($tid);
$cid = empty($cid) ? 4 : intval($cid);
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<title>媒体报道-阳光阿姨</title>
<meta name="generator" content="" />
<meta name="author" content="" />
<meta name="keywords" content="烟台月嫂培训,烟台育婴师,烟台催乳师培训,烟台小儿推拿,烟台小儿推拿师,母婴护理加盟,烟台家政,烟台月嫂" />
<meta name="description" content="阳光阿姨(ygayi.com)是提供烟台月嫂,烟台育婴师,烟台催乳师培训,烟台小儿推拿等烟台家政服务,以及烟台月嫂培训,烟台催乳师培训,烟台小儿推拿师培训和母婴护理加盟服务的家政服务平台,我们将线上的雇佣查询、预定、合同管理、雇佣评价与线下的经纪人主导的面试撮合、背景调查、雇后服务相结合,让雇主真正实现放心找阿姨、有事找经纪." />
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

	    <div class="dy_main_left fl" style="margin-top:40px;">
		  <div class="dy_main_left_top l zt11">
			
			媒体报道
            
            </div>
			<div class="dy_main_left_bottom l">
			    <ul>
                 <li><a  <? if($cid == 44){?> class="n_list" <? }?> href="contact-44-1.html">公司简介</a></li>
                   <li><a <? if($cid == 60){?> class="n_list" <? }?> href="contact-60-1.html">团队介绍</a></li>
                    <li><a <? if($cid == 54){?> class="n_list" <? }?>href="media-54-1.html">媒体报道</a></li>
                     <li><a <? if($cid == 24){?> class="n_list" <? }?> href="contact-24-1.html">服务承诺</a></li>
                      <li><a  <? if($cid == 48){?> class="n_list" <? }?> href="contact-48-1.html">法律声明</a></li>
                       <li><a <? if($cid == 45){?> class="n_list" <? }?> href="contact-45-1.html">联系我们</a></li>
                            <li><a <? if($cid == 61){?> class="n_list" <? }?> href="contact-61-1.html">加盟连锁</a></li>
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
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'mediashow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'mediashow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'media.php?cid='.$row['classid'];
					else $gourl2 = 'media-'.$row['classid'].'-1.html';
					
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