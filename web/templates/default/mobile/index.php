<?php	if(!defined('IN_MOBILE')) exit('Request Error!'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<?php echo GetHeader(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">

<script type="text/javascript" src="templates/default/js/comment.js"></script>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="web_on_index.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
<script src="js/bplayer.js" type="text/javascript"></script>
<SCRIPT language=javascript src="js/Designer.js"></SCRIPT>


<script >
//window.onload=function(){
//	
//	viewWIdth=document.documentElement.clientWidth;
//	alert(viewWIdth);
//	
//	}
	
		function AddFavorite(){
	
			alert("加入收藏失败，请登录！");
			window.location.href="member.php?c=login";
	
}
</script>
</head>
<body>
<div class="top">
	<img src="web_images/index_logo.png">
    <div class="se01 fl"><select><option>烟台</option><option>威海</option><option>济南</option><option>青岛</option></select></div>
    <div class="sear01 fr"><a href=""><img src="web_images/index-search.png"></a></div>
</div>

<div class="banner">


<div id="myjQuery">
    <div id="myjQueryContent">
    <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=57 and orderid=1 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,10");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
             <div><a ><img src="<?php echo $row['picurl']; ?>" style=" width:100%; height:160px;" /></a></div>
					<?php
			}
			?>
     
       <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=57 and orderid!=1 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,10");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
              <div class="smask"><img src="<?php echo $row['picurl']; ?>" style="width:100%; height:160px;" /></div>
          
					<?php
			}
			?>
  
    </div>
   
  </div>
  
  
</div>

<div class="index_li">
	<ul>
    	<li style="width:33%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21&typeid=28"><img src="web_images/inli01.png"></a></li>
        <li style="width:33%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21&typeid=29"><img src="web_images/inli02.png"></a></li>
        <li style="width:34%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21&typeid=30"><img src="web_images/inli03.png"></a></li>
        <li style="width:33%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21&typeid=31"><img src="web_images/inli04.png"></a></li>
        <li style="width:33%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=list&cid=15"><img src="web_images/inli05.png"></a></li>
        <li style="width:34%;"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21&typeid=5"><img src="web_images/inli06.png"></a></li>
    </ul>
</div>

<div class="gzfb">
	<div class="gzfb_tlt">
    	<img src="web_images/gufb.png" style="float:left;">
    	<div class="arrow fr"><a href=""><img src="web_images/arrow01.png"></a></div>
    </div>
    <div class="gzfb_con">
    	<ul>
        
        <li>
        <div class="gzfb_li">
            <p>吴昊&nbsp;催乳师<br>
            所在地：烟台市<br>
            可接受工资：<br>
            &nbsp;&nbsp;&nbsp;&nbsp;3000-4000</p>
            <div class="gzfb_ck"><span><a href="">查看</a></span></div>
        </div>
        </li>
        <li>
        <div class="gzfb_li">
            <p>吴昊&nbsp;催乳师<br>
            所在地：烟台市<br>
            可接受工资：<br>
            &nbsp;&nbsp;&nbsp;&nbsp;3000-4000</p>
            <div class="gzfb_ck"><span><a href="">查看</a></span></div>
        </div>
        </li>
        </ul>
    </div>
</div>

<div class="aytj">
	<div class="aytj_tlt">
    	<img src="web_images/aytj.png" style="float:left;">
    	<div class="arrow fr"><a href="<?php echo $cfg_webpath; ?>4g.php?m=img&cid=21"><img src="web_images/arrow01.png"></a></div>
    </div>
    <div class="aytj_con">
    	<dl>
        	<? 
				$dosql->Execute("SELECT * FROM `#@__goods` WHERE  delstate='' AND checkinfo=true and flag like '%c%' ORDER BY orderid ASC limit 3");
				
				while($row = $dosql->GetArray())
				{
						$counts = $dosql->GetOne("SELECT sum(total) as count FROM `#@__userfavorite` WHERE aid=".$row['id']);
					if($counts['count']){
					$count = $counts['count'];
					}else{
						$count = 0;
						}
						if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					$gourl = '4g.php?m=show&cid='.$row['classid'].'&id='.$row['id'];
					
					
					?>
            <dd>
            <div class="ab_pic fl"><a href="<? echo $gourl;?>"><img src="<? echo $row['picurl'];?>"></a></div>
            <div class="aytj_ab fl">
            	<div class="ab_1"><a href="<? echo $gourl;?>"><p><? echo $row['title'];?></p></a><h1><img src="web_images/aytj_level.png"></h1><ul><li style="color:#0072fe;"><? echo $row['typename'];?></li></ul></div>
                <div class="ab_2"> <? echo $row['description'];?>
</div>
                <div class="ab_3"><p><a href="javascript:;" onclick="<? if(isset($_COOKIE['username'])){?>AddUserFavorite(<? echo $row['id'];?>,<? echo $row['classid'];?>,<? echo $row['typeid'];?>) <? }else{?> AddFavorite()<? }?>">收藏</a>(<? echo $count;?>)</p><h3>参考工资：<span><? echo $row['xinchou'];?>元/月</span></h3></div>
            </div>
            </dd>
            	<? }?>
            
        </dl>
    </div>
</div>

<div class="mtbd">
	<div class="mtbd_tlt">
    	<img src="web_images/mtbd.png" style="float:left;">
    	<div class="arrow fr"><a href=""><img src="web_images/arrow01.png"></a></div>
    </div>
    <div class="mtbd_con">
    	<ul>
        	 <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=54 OR parentstr LIKE '%,54,%') AND delstate='' and flag like '%c%' AND checkinfo=true ORDER BY orderid ASC",6);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='') $gourl = '?m=show&cid='.$row['classid'].'&id='.$row['id'];
					
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'media.php?cid='.$row['classid'];
					else $gourl2 = 'media-'.$row['classid'].'-1.html';
					
						if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					$date = date('Y-m-d',$row['posttime']);
				?>
           
            <li>
            <div class="mtbd_pic fl"><a href="<?php echo $gourl; ?>"><img src="<? echo $picurl;?>"></a></div>
            <div class="mtbd_text fl">
            <p><span><? echo $date?></span><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></p>
            <span>　<? echo strip_tags($row['description']);?></span>
            </div>
            </li>
            <? }?>
         
         
        </ul>
    </div>
</div>

<div class="bottom_box">
	<div class="bottom">
	<h1>我们郑重承诺</h1>
    <ul>
    	<li style="width:33%;"><a href=""><img src="web_images/cn01.png"></a></li>
        <li style="width:33%;"><a href=""><img src="web_images/cn02.png"></a></li>
        <li style="width:34%;"><a href=""><img src="web_images/cn03.png"></a></li>
        <li style="width:33%;"><a href=""><img src="web_images/cn04.png"></a></li>
        <li style="width:33%;"><a href=""><img src="web_images/cn05.png"></a></li>
        <li style="width:34%;"><a href=""><img src="web_images/cn06.png"></a></li>
    </ul>
    <p>Copyright&nbsp;©&nbsp;2014-2015&nbsp;烟台怡恩家政服务有限公司&nbsp;版权所有</p>
    </div>
</div>


	<?php require_once(dirname(__FILE__).'/footer.php'); ?>

</body>
</html>