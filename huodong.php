<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
$tid  = empty($tid)  ? 0 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
<link href="on_index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<SCRIPT language=javascript src="js/Designer.js"></SCRIPT>
<script src="js/bplayer.js" type="text/javascript"></script>
<script type="text/javascript">

function d(){
	document.getElementById("area_index").style.display="block";
	}
function c(a){
	document.getElementById("diqu").value=a;
	document.getElementById("area_index").style.display="none";
	}

</script>
<script type="text/javascript">
$(document).ready(function(){
 var topMain=$("#myjQuery").height()+130//是头部的高度加头部与nav导航之间的距离
 var nav=$(".dh_w");
 $(window).scroll(function(){
  if ($(window).scrollTop()>topMain){//如果滚动条顶部的距离大于topMain则就nav导航就添加类.nav_scroll，否则就移除
   nav.addClass("nav_scroll");
   
  }else{
   nav.removeClass("nav_scroll");
  }
 });
})
</script>

</head>
<body>
<!-- header-->
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<!-- /header-->


<div class="hdzx c" style="height:1300px;">
    <div id="myjQuery" class="hdzx_banner">
    
 
    <div id="myjQueryContent">
    <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=58 and orderid=1 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,5");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
             <div><a ><img src="<?php echo $row['picurl']; ?>" style=" width:100%; height:606px;" /></a></div>
					<?php
			}
			?>
     
       <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=58 and orderid!=1 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,5");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
              <div class="smask"><img src="<?php echo $row['picurl']; ?>" style="width:100%; height:606px;" /></div>
          
					<?php
			}
			?>
  
    </div>
    <!--<ul id="myjQueryNav">
      <li class="current"></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>-->

 
    
    
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
	
	
	
</div>





<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>