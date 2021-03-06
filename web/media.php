<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$tid = empty($tid) ? 54 : intval($tid);
$cid = empty($cid) ? 4 : intval($cid);
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
?>
<!DOCTYPE>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">

<title>媒体报道-阳光阿姨</title>
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="web_on_index.css" rel="stylesheet" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>

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
	  <li><a  <? if($cid == 44){?> class="n_list" <? }?> href="contact.php?cid=44">公司简介</a></li>
                   <li><a <? if($cid == 60){?> class="n_list" <? }?> href="contact.php?cid=60">团队介绍</a></li>
                    <li><a <? if($cid == 54){?> class="n_list" <? }?>href="media.php?cid=54">媒体报道</a></li>
                     <li><a <? if($cid == 24){?> class="n_list" <? }?> href="contact.php?cid=24">服务承诺</a></li>
                      <li><a  <? if($cid == 48){?> class="n_list" <? }?> href="contact.php?cid=48">法律声明</a></li>
                       <li><a <? if($cid == 61){?> class="n_list" <? }?> href="contact.php?cid=61">加盟连锁</a></li>
	
    </ul>
    </div>
	<div class="px_con">
    	<ul>
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
				 
				 
				
                   <li>
            	<div class="px_pic fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $cfg_webpath; ?>/<? echo $row['picurl'];?>" /></a></div>
                <div class="px_text fl">
                	<h2><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?> [<?php echo $date; ?>]</a></h2>
                    <span><?php echo ReStrLen(strip_tags($row['content']),200); ?>...</span>
                    <p>发布：<? echo $date;?></p>
                </div>
            </li>
                 <?php
				}
				?>
          
        </ul>
          <? echo $dopage->GetList_web();?>
    </div>
</div>








<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>