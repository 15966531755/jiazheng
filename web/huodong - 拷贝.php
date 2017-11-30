<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 4 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
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

</script>
</head>
<body>
<!-- header-->
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<!-- /header-->


<div class="hdzx c">
    <div class="hdzx_banner"><img src="images/45.jpg" style="width:100%; height:624px;" /></div>
	<div class="hdzx_dh">
	   <ul>
        <? 
				  $dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=25 AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'news.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'news-'.$row['id'].'-1.html';
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
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=32 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 3");
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
		    <div class="hdzx1_bottom_left fl" style="margin-left:25px;"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" /></a></div>
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
		    <div class="hdzx1_bottom_left fl" style="margin-left:25px;"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" /></a></div>
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
	<div class="hdzx3">
	    <div class="hdzx3_top l"><img src="images/48.jpg" width="96" height="23" /></div>
		<div class="hdzx3_bottom">
        
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=34 AND flag LIKE '%a%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 1");
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
            <div class="huodong_bottom_left fl">
              <div class="huodong_bottom_left_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="165" height="180" alt="" /></a></div>
              <div class="huodong_bottom_left_right fr">
                <div class="huodong_bottom_left_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                <div class="huodong_bottom_left_right_bottom l" style="overflow:hidden;">
                <? echo $row['content'];?>
                </div>
              </div>
            </div>
            <?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
            
            <div class="huodong_bottom_right fr">
              
              
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=34 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
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
              <div class="huodong_bottom_right_main fl">
                <div class="huodong_bottom_right_main_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="97" height="80" alt="" /></a></div>
                <div class="huodong_bottom_right_main_right fr">
                  <div class="huodong_bottom_right_main_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                  <div class="huodong_bottom_right_main_right_bottom l" style="overflow:hidden;"><?php echo $row['content']; ?></div>
                </div>
              </div>
              
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
	<div class="hdzx3">
	    <div class="hdzx3_top l"><img src="images/48.jpg" width="96" height="23" /></div>
		<div class="hdzx3_bottom">
        
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=35 AND flag LIKE '%a%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 1");
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
            <div class="huodong_bottom_left fl">
              <div class="huodong_bottom_left_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="165" height="180" alt="" /></a></div>
              <div class="huodong_bottom_left_right fr">
                <div class="huodong_bottom_left_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                <div class="huodong_bottom_left_right_bottom l" style="overflow:hidden;">
                <? echo $row['content'];?>
                </div>
              </div>
            </div>
            <?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
            
            <div class="huodong_bottom_right fr">
              
              
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=35 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
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
              <div class="huodong_bottom_right_main fl">
                <div class="huodong_bottom_right_main_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="97" height="80" alt="" /></a></div>
                <div class="huodong_bottom_right_main_right fr">
                  <div class="huodong_bottom_right_main_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                  <div class="huodong_bottom_right_main_right_bottom l" style="overflow:hidden;"><?php echo $row['content']; ?></div>
                </div>
              </div>
              
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
	<div class="hdzx3">
	    <div class="hdzx3_top l"><img src="images/48.jpg" width="96" height="23" /></div>
		<div class="hdzx3_bottom">
        
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=36 AND flag LIKE '%a%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 1");
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
            <div class="huodong_bottom_left fl">
              <div class="huodong_bottom_left_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="165" height="180" alt="" /></a></div>
              <div class="huodong_bottom_left_right fr">
                <div class="huodong_bottom_left_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                <div class="huodong_bottom_left_right_bottom l" style="overflow:hidden;">
                <? echo $row['content'];?>
                </div>
              </div>
            </div>
            <?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
            
            <div class="huodong_bottom_right fr">
              
              
            <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=36 AND flag LIKE '%c%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC limit 4");
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
              <div class="huodong_bottom_right_main fl">
                <div class="huodong_bottom_right_main_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="97" height="80" alt="" /></a></div>
                <div class="huodong_bottom_right_main_right fr">
                  <div class="huodong_bottom_right_main_right_top l zt6"><a href="<?php echo $gourl; ?>"><? echo $row['title'];?></a></div>
                  <div class="huodong_bottom_right_main_right_bottom l" style="overflow:hidden;"><?php echo $row['content']; ?></div>
                </div>
              </div>
              
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
</div>





<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>