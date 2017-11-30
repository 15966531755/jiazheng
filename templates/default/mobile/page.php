<?php	if(!defined('IN_MOBILE')) exit('Request Error!'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<?php echo GetHeader(1,$cid); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/mobile.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script>
function AddFavorite(){
			alert("加入收藏失败，请登录！");
			window.location.href="member.php?c=login";
}
</script>
</head>
<body>

<? if ($cid != 21){?>

	
	
	
		<!-- 栏目内容 -->
		<?php
		$row = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		if(!empty($row['id']))
		{
		?>
       <div class="px_top">
	<p class="fl"><?php echo $cfg_webname; ?>-<?php echo $row['classname']; ?></p>
    <div class="sear01 fr"><a href=""><img src="web_images/index-search.png"></a></div>
</div>



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
				<?php
				if($row['infotype'] == '0')
				{
					echo '<div class="info">'.Info($row['id']).'</div>';
				}

				else if($row['infotype'] == '1')
				{
					echo '<ul class="list">';

					$dopage->GetPage_web("SELECT * FROM `#@__infolist` WHERE (classid=".$row['id']." or parentid=".$row['id']." or parentstr like '%".$row['id']."%') AND delstate='' AND checkinfo=true ORDER BY orderid ASC",10);
					while($row1 = $dosql->GetArray())
					{
						if($row1['picurl'] != '') $picurl = $row1['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					$date = date('Y-m-d',$row1['posttime']);	
				?>
                
                <li>
            	<div class="px_pic fl"><a href="?m=show&cid=<?php echo $row['id'];?>&id=<?php echo $row1['id']?>"><img src="<? echo $picurl;?>"></a></div>
                <div class="px_text fl">
                	<h2><a href="?m=show&cid=<?php echo $row['id'];?>&id=<?php echo $row1['id']?>"><?php echo $row1['title']; ?></a></h2>
                    <span><? echo $row1['description'];?>...</span>
                    <p>发布：<? echo $date;?></p>
                </div>
            </li>
            
				
				<?php
					}

					echo '<div class="cl"></div></ul>';
					echo $dopage->GetList_web();
				}

				else if($row['infotype'] == '2')
				{
					echo '<ul class="img2">';

					$dopage->GetPage_web("SELECT * FROM `#@__infoimg` WHERE (classid=".$row['id']." or parentid=".$row['id']." or parentstr like '%".$row['id']."%') AND delstate='' AND checkinfo=true ORDER BY orderid ASC",2);
					while($row2 = $dosql->GetArray())
					{

						//获取缩略图地址
						if($row2['picurl']!='')
							$picurl = $row2['picurl'];
						else
							$picurl = 'templates/default/images/nofoundpic.gif';
				?>
				<li>
					<a href="?m=show&cid=<?php echo $row['id'];?>&id=<?php echo $row2['id']?>" class="imgarea"><img width="100%" src="<?php echo $picurl; ?>" title="<?php echo $row2['title']; ?>" /></a><p><a href="?m=show&cid=<?php echo $row['id'];?>&id=<?php echo $row2['id']?>"><?php echo $row2['title']; ?></a></p>
				</li>
				<?php
					}

					echo '<div class="cl"></div></ul>';
					echo $dopage->GetList_web();
				}
				?>
			</div>
		</div>
		<?php
		}
		else
		{
			echo '<li>网站资料更新中...</li>';
		}
		?>




<? }else{?>

	<?php
		$row = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		
		
		if(!empty($row['id']))
		{
		?>
<div class="list_top">
	<p class="fl">
	<?
	if(!empty($typeid)){
		$rows = $dosql->GetOne("SELECT * FROM `#@__goodstype` WHERE id = $typeid AND checkinfo = 'true' ORDER BY orderid ASC");
		
	 if(!empty($rows['id'])){?>
        <?php echo $cfg_webname; ?>-<? echo $rows['classname'];?>-列表
        <? }else{?>
         <?php echo $cfg_webname; ?>-列表
        <? }}else{?>
            <?php echo $cfg_webname; ?>-列表
        
        <? }?>
        </p>
    <div class="sear01 fr"><a href=""><img src="web_images/index-search.png"></a></div>
</div>


<div class="list">
	<div class="list_sx">
    	<div class="sx01 fl"><select><option>服务范围</option><option>服务范围</option><option>服务范围</option><option>服务范围</option><option>服务范围</option></select></div>
        <div class="sx02 fl"><select><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option></select></div>
        <div class="sx03 fl"><select><option>学历</option><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option></select></div>
        <div class="sx04 fl"><select><option>薪酬</option><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option></select></div>
        <div class="sx05 fl"><select><option>籍贯</option><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option></select></div>
        <div class="sx06 fl"><select><option>排序</option><option>年龄</option><option>年龄</option><option>年龄</option><option>年龄</option></select></div>
    </div>
    
    
    <div class="list_con">
    	<dl>
        	
            
            
            
            
            <?php
				if($row['infotype'] == '0')
				{
					echo '<div class="info">'.Info($row['id']).'</div>';
				}

				else if($row['infotype'] == '4')
				{
					
                   if(!empty($typeid)){
					$dopage->GetPage_web("SELECT * FROM `#@__goods` WHERE  (typeid=$typeid  or `gz` like '%".$typeid."%')  AND delstate='' AND checkinfo=true ORDER BY orderid ASC",10);
					  }else{
	    		$dopage->GetPage_web("SELECT * FROM `#@__goods` WHERE (classid=".$row['id']." or parentid=".$row['id']." or parentstr like '%".$row['id']."%') AND delstate='' AND checkinfo=true ORDER BY orderid ASC",10);
	  
						  }
					while($row1 = $dosql->GetArray())
					{
						
						$counts = $dosql->GetOne("SELECT sum(total) as count FROM `#@__userfavorite` WHERE aid=".$row1['id']);
					if($counts['count']){
					$count = $counts['count'];
					}else{
						$count = 0;
						}
						
						if($row1['picurl'] != '') $picurl = $row1['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					$date = date('Y-m-d',$row1['posttime']);
					$gourl = '4g.php?m=show&cid='.$row1['classid'].'&id='.$row1['id'];
					
				?>
            
             <dd>
            <div class="ab_pic fl"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>"></a></div>
            <div class="aytj_ab fl">
            	<div class="ab_1"><a href="<? echo $gourl;?>"><p><? echo $row1['title'];?></p></a><h1><img src="web_images/aytj_level.png"></h1><ul><li style="color:#0072fe;"><? echo $row1['typename'];?></li></ul></div>
                <div class="ab_2"> <? echo $row1['description'];?>
</div>
                <div class="ab_3"><p><a href="javascript:;" onclick="<? if(isset($_COOKIE['username'])){?>AddUserFavorite(<? echo $row1['id'];?>,<? echo $row1['classid'];?>,<? echo $row1['typeid'];?>) <? }else{?> AddFavorite()<? }?>">收藏</a>(<? echo $count;?>)</p><h3>参考工资：<span><? echo $row1['xinchou'];?>元/月</span></h3></div>
            </div>
            </dd>
            
         
            <? }}?>
               <? echo $dopage->GetList_web();?>
            
            
        </dl>
    </div>
</div>

<div class="fixed">
	<ul>
    	<li><a href=""><img src="web_images/fix1.png"  height="20"><p>首页</p></a></li>
        <li><a href=""><img src="web_images/fix2.png"  height="20"><p>活动专区</p></a></li>
        <li><a href=""><img src="web_images/fix3.png"  height="20"><p>会员中心</p></a></li>
        <li><a href=""><img src="web_images/fix4.png"  height="20"><p>关于我们</p></a></li>
    </ul>
</div>




<? }}?>

	<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</body>
</html>