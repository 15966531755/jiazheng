<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
$tid  = empty($tid)  ? 0 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid,$id); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="templates/default/style/lightbox.css" type="text/css" rel="stylesheet" />
<!--[if IE 6]><link href="templates/default/style/lightbox.ie6.css" rel="stylesheet" type="text/css"/><![endif]-->
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/slidespro.js"></script>
<script type="text/javascript" src="templates/default/js/lightbox.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">
$(function(){
	jQuery('.lightbox').lightbox();
	$(".picarr .picture img").LoadImage({width:530,height:350});
	$(".picarr .preview img").LoadImage({width:58,height:45});
	$(".small").click(function(){$("#textarea").css('font-size','12px');});
	$(".big").click(function(){$("#textarea").css('font-size','14px');});
});
</script>
<script type="text/javascript">

function d(){
	document.getElementById("area_index").style.display="block";
	}
function c(a){
	document.getElementById("diqu").value=a;
	document.getElementById("area_index").style.display="none";
	}

</script>
</head>
<body>
<!-- header-->
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header--><!-- /header--> 

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
</div>

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>