<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 9 : intval($cid);
$tid = empty($tid) ? '' : intval($tid);
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
 <? 

 $rows = $dosql->GetOne("SELECT parentid FROM `#@__infoclass` WHERE id=$cid AND checkinfo=true ORDER BY orderid ASC");
 $rowss = $dosql->GetOne("SELECT classname FROM `#@__infoclass` WHERE id=".$rows['parentid']." AND checkinfo=true ORDER BY orderid ASC");

				?>
<div class="dy c">
    <div class="dy_main" >
       
	    <div class="dy_main_left fl">
		    <div class="dy_main_left_top l zt11">
			
			<?php if($rows['parentid']){echo $rowss['classname']; }else{ echo "关于我们";}?>
            
            </div>
			<div class="dy_main_left_bottom l">
			    <ul>
              
                <?
				if($rows['parentid']){
				 $dopage->GetPage("SELECT * FROM `#@__infoclass` WHERE (parentid=".$rows['parentid']." OR parentstr LIKE '%,".$rows['parentid'].",%')  AND checkinfo=true ORDER BY orderid ASC");
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'contact.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'contact-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
					
					?>
               <li><a  <? if($cid == $row['id']){?> class="n_list" <? }?> href="<? echo $gourl;?>"><? echo $row['classname'];?></a></li>
              
                  <? }}else{?>
                  
                
                    <li><a  <? if($cid == 44){?> class="n_list" <? }?> href="contact-44-1.html">公司简介</a></li>
                   <li><a <? if($cid == 60){?> class="n_list" <? }?> href="contact-60-1.html">团队介绍</a></li>
                    <li><a <? if($cid == 54){?> class="n_list" <? }?>href="media-54-1.html">媒体报道</a></li>
                     <li><a <? if($cid == 24){?> class="n_list" <? }?> href="contact-24-1.html">服务承诺</a></li>
                      <li><a  <? if($cid == 48){?> class="n_list" <? }?> href="contact-48-1.html">法律声明</a></li>
                       <li><a <? if($cid == 61){?> class="n_list" <? }?> href="contact-61-1.html">加盟连锁</a></li>
                       
                  
                  
                  
                  <? }?>
				</ul>
			</div>
		</div>
        
     
		<div class="dy_main_right fr" >
		    <div class="dy_main_right_top l zt9" ><?php echo GetPosStr($cid); ?></div>
			<div class="dy_main_right_bottom l" >
			<?php echo Info($cid); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div><!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>