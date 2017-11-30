<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
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

<?php echo GetHeader(1,$cid); ?>
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="web_on_index.css" rel="stylesheet" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">

function d(){
	document.getElementById("area_index").style.display="block";
	}
function c(a){
	document.getElementById("diqu").value=a;
	document.getElementById("area_index").style.display="none";
	}


function DrawImage(ImgD,FitWidth,FitHeight){
    var image=new Image();
	image.src=ImgD.src;
	if(image.width>0 && image.height>0){
		if(image.width/image.height>= FitWidth/FitHeight){
			if(image.width>FitWidth){
				ImgD.width=FitWidth;
				ImgD.height=(image.height*FitWidth)/image.width;
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			}
		}else{
			if(image.height>FitHeight){
				ImgD.height=FitHeight;
				ImgD.width=(image.width*FitHeight)/image.height;
			}else{
				ImgD.width=image.width; 
				ImgD.height=image.height;
			} 
		}
	}
	//居中
	if(ImgD.height < FitHeight ){
		var paddH = parseInt((FitHeight - ImgD.height)/2);
		ImgD.style.paddingTop    = paddH+"px";
		ImgD.style.paddingBottom = paddH+"px";
	}
	if(ImgD.width < FitWidth ){
		var paddW = parseInt((FitWidth - ImgD.width)/2);
		ImgD.style.paddingRight = paddW+"px";
		ImgD.style.paddingLeft  = paddW+"px";
	}
	//var paddH = parseInt((FitHeight - ImgD.height)/2);
	//var paddW = parseInt((FitWidth - ImgD.width)/2);
	//var paddH = ((FitHeight - ImgD.height)/2);
	//var paddW = ((FitWidth - ImgD.width)/2);
	//ImgD.style.padding = paddH+"px "+paddW+"px "+paddH+"px "+paddW+"px";
 }

</script>
<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

<style>
.ac_li .n_list{background: #fff;color: #26A035;}
</style>
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
	
    
<div class="px_top">
	<p class="fl">阳光阿姨-活动专区</p>
    <div class="sear01 fr">
    <div class="vivo-nav cl">
		<div class="search-user">
    <a href="#" class="search"><img src="web_images/index-search.png"></a>
    </div></div>
    </div>
    
    </div>
</div>

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
    	<ul>
        	 <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
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