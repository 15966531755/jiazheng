<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$tid = empty($tid) ? 20 : intval($tid);
$cid = empty($cid) ? 4 : intval($cid);
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">

<?php echo GetHeader(1,$cid,$id,$str,$tid); ?>
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/mobile.css" rel="stylesheet" type="text/css">

<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

</head>
<body>
<div id="vivo-head">
	<div class="vivo-search">
		<div class="search-box">
			<form name="search" id="search" method="post" action="http://www.ygayi.com/web/goods.php">
				<input type="text" placeholder="" name="keywords" id="keywords" class='data_q' autocomplete="off"><button>搜索</button>
			</form>
		</div>
	</div>
	
    
    <?php
		$rows = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		if(!empty($rows['id']))
		{
		?>
<div class="px_top">
	<p class="fl"><?php echo $cfg_webname; ?>-<?php echo $rows['classname']; ?></p>
    <div class="sear01 fr">
    <div class="vivo-nav cl">
		<div class="search-user">
    <a href="#" class="search"><img src="web_images/index-search.png"></a>
    </div></div>
    </div>
</div>
<? }?>

    

</div>
<div class="px_con_box">
	
    <div class="ac_li">
 <ul>
	  <li>
      <a  <? if($cid == 44){?> class="n_list" <? }?> href="contact.php?cid=44">公司简介</a></li>
                   <li><a <? if($cid == 60){?> class="n_list" <? }?> href="contact.php?cid=60">团队介绍</a></li>
                    <li><a <? if($cid == 54){?> class="n_list" <? }?>href="media.php?cid=54">媒体报道</a></li>
                     <li><a <? if($cid == 24){?> class="n_list" <? }?> href="contact.php?cid=24">服务承诺</a></li>
                      <li><a  <? if($cid == 48){?> class="n_list" <? }?> href="contact.php?cid=48">法律声明</a></li>
                       <li><a <? if($cid == 61){?> class="n_list" <? }?> href="contact.php?cid=61">加盟连锁</a></li>
	
    </ul>
    </div>
    

<div class="px_con">
<div class="ft">
            	<div class="subCont">
			<?php

			//检测文档正确性
			$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
			if(is_array($row))
			{
				//增加一次点击量
				$dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
			
			?>
			
				
					<h1 class="title"><?php echo $row['title']; ?></h1>
				
				<div class="continfo"><span>更新时间：</span><?php echo GetDateTime($row['posttime']); ?></div>
				
                <div class="conttxt">
				<?php
				if($row['content'] != '')
					echo GetContPage(str_replace('height','',str_replace('width','',$row['content'])));
				else
					echo '网站资料更新中...';
				?>
                </div>
                
                <? }?>
                </div>
                </div>
			</div>
            </div>
            <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>