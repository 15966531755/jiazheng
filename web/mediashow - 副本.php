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
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/mobile.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
		$rows = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		if(!empty($rows['id']))
		{
		?>
<div class="px_top">
	<p class="fl"><?php echo $cfg_webname; ?>-<?php echo $rows['classname']; ?></p>
    <div class="sear01 fr"><a href=""><img src="web_images/index-search.png"></a></div>
</div>
<? }?>

<div class="px_con_box">
	<div class="px_li">
    	<ul>
        	<li><a href=""><img src="web_images/px01.png"></a></li>
            <li><a href=""><img src="web_images/px02.png"></a></li>
            <li style="margin-right:0;"><a href=""><img src="web_images/px03.png"></a></li>
            <li style="margin-bottom:0;><a href=""><img src="web_images/px04.png"></a></li>
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