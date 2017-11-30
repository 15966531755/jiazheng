<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
$tid  = empty($tid)  ? 0 : intval($tid);
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

<?php echo GetHeader(1,$cid,$id); ?>
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="web_on_index.css" rel="stylesheet" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">
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
<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

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
</div>
<? }?>

<div class="px_con_box">
	<div class="ac_li">
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
            
         <div class="blank"></div>   

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>