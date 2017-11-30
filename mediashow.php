<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$tid = empty($tid) ? 20 : intval($tid);
$cid = empty($cid) ? 4 : intval($cid);
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid,$id,$str,$tid); ?>
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
             <!-- JiaThis Button BEGIN -->
<div class="jiathis_style" style="margin-top:20px; margin-bottom:50px;">
	<span class="jiathis_txt">分享到：</span>
	<a class="jiathis_button_qzone">QQ空间</a>
	<a class="jiathis_button_tsina">新浪微博</a>
	<a class="jiathis_button_tqq">腾讯微博</a>
	<a class="jiathis_button_weixin">微信</a>
	<a class="jiathis_button_renren">人人网</a>
	<a class="jiathis_button_cqq">QQ好友</a>
	<a class="jiathis_button_yixin">易信</a>
	<a class="jiathis_button_xiaoyou">朋友网</a>
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
	<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
			<div class="dy_main_right_bottom l">
            
            	<?php

			//检测文档正确性
			$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
			if(is_array($row))
			{
				//增加一次点击量
				$dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
			?>
			<?php
				if($row['content'] != '')
					echo GetContPage($row['content']);
				else
					echo '网站资料更新中...';
				?>
            <? }?>
            </div>
		</div>
       
		<div class="clear"></div>
        
        
</div>





<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>