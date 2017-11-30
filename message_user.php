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
<?php echo GetHeader(1,0,0,'客户评价'); ?>

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
	    
		<div class="dy_main_right fr" style="width:1041px;">
		    <div class="dy_main_right_top l zt9" style="width:1041px;"><a href="<?php echo $cfg_webpath; ?>">首页</a> &gt; <a href="message.php">客户评价</a></div>
			<div class="hdlb">
			     
				 <?php

				$dopage->GetPage("SELECT * FROM `#@__message`  ORDER BY orderid DESC",8);
				while($row = $dosql->GetArray())
				{
					

					
					
					$date = date('Y-m-d',$row['posttime']);
				?>
				 
				 
				 <div class="hdlb_main" style="width:1041px;">
				     <div class="hdlb_main_left fl"><img src="<?php echo $row['picurl']; ?>" width="89" height="89" /></div>
					 <div class="hdlb_main_right fr" style="width:920px;">
					      <div class="hdlb_main_right_top l zt12"><?php echo $row['nickname']; ?> <?php echo $row['contact']; ?> [<?php echo $date; ?>]</div>
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