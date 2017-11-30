<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$tid  = empty($tid)  ? 0 : intval($tid);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<link rel="stylesheet"  href="templates/default/style/css.css" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">
<?php echo GetHeader(1,$cid); ?>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
<script src="js/bplayer.js" type="text/javascript"></script>
<SCRIPT language=javascript src="js/Designer.js"></SCRIPT>

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>

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

<div class="ac_box">
	<div class="ac_li">
    	<ul>
          <? 
				  $dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=25 AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodong_list.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'huodong_list-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
		?>
	       <li><a href="<? echo $gourl;?>"><? echo $row['classname']?></a></li>
		 <? }?>
      
        </ul>
    </div>
    
    <div class="ac_con">
    	<ul>
        	
                <?php
				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE parentid=25  AND delstate='' AND checkinfo=true ORDER BY orderid ASC",8);
				while($row = $dosql->GetArray())
				{
				if(isset($row['id']))
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
									else
						$gourl = $row['linkurl'];

					//获取缩略图地址
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
						
						$date = date('Y-m-d',$row['posttime']);
				?>
		    
			  <li>
            <div class="ac_pic fl"><a href="<? echo $gourl;?>"><img src="/<? echo $picurl;?>"></a></div>
            <div class="ac_text fl">
            	<p><a href="<? echo $gourl;?>"><? echo $row['title']?> </a>[<? echo $date;?>]</p>
                <span><?php echo ReStrLen(strip_tags($row['content']),200); ?>...</span>
            </div>
            </li>
            
			<?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
            
            
          
         
         
          
        </ul>
    </div>
      <? echo $dopage->GetList_web();?>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>