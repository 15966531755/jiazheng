<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$tid  = empty($tid)  ? 0 : intval($tid);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>

<?php echo GetHeader(1,$cid); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">

<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="web_on_index.css" rel="stylesheet" type="text/css">

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
<script src="js/bplayer.js" type="text/javascript"></script>
<SCRIPT language=javascript src="js/Designer.js"></SCRIPT>

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
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

<div id="myjQuery">
    <div id="myjQueryContent">
    <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=57 and orderid=1 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,10");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
             <div><a ><img src="<?php echo $cfg_webpath; ?>/<?php echo $row['picurl']; ?>" style=" width:100%; height:160px;" /></a></div>
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
              <div class="smask"><img src="<?php echo $cfg_webpath; ?>/<?php echo $row['picurl']; ?>" style="width:100%; height:160px;" /></div>
          
					<?php
			}
			?>
  
    </div>
   
  </div>    
	<div class="hdzx_dh">
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
	<div class="hdzx1">
	    <div class="hdzx1_top l"><img src="images/46.jpg" /></div>
		<div class="hdzx1_bottom" style="margin-left:-25px; width:1095px;">
         <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=32 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC limit 3");
				while($row = $dosql->GetArray())
				{
				if(isset($row['id']))
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					//获取缩略图地址
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
		    <div class="hdzx1_bottom_left fl" style="margin-left:25px;"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" width="340" height="177" /></a></div>
			<?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
		</div>
	</div>
	<div class="hdzx2">
	    <div class="hdzx1_top l"><img src="images/47.jpg" width="96" height="23" /></div>
		<div class="hdzx1_bottom" style="margin-left:-25px; width:1095px;">
        
        
		     <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=33 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 3");
				while($row = $dosql->GetArray())
				{
				if(isset($row['id']))
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					//获取缩略图地址
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
		    <div class="hdzx1_bottom_left fl" style="margin-left:25px;"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" width="340" height="177"/></a></div>
			<?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
		</div>
	</div>
	
	
	





<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>