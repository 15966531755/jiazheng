<?php	if(!defined('IN_MOBILE')) exit('Request Error!');

$cid = empty($cid) ? 0 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$district = empty($district) ? 370600 : $district;
$nianling = empty($nianling) ? "" : intval($nianling);
$education = empty($education) ? 0 : $education;
$xinchou = empty($xinchou) ? "" : intval($xinchou);
$hail = empty($hail) ? 0 : $hail;
$order = empty($order) ? "" : $order;
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
$keywords = empty($keywords) ? "" : $keywords;

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
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>

<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

<script>
function AddFavorite(){
			alert("加入收藏失败，请登录！");
			window.location.href="member.php?c=login";
}

function tijiao(){
	document.myform.submit();
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
						if($row1['picurl'] != '') $picurl = $cfg_webpath."/".$row1['picurl'];
					else $picurl = $cfg_webpath.'/templates/default/images/nofoundpic.gif';
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
							$picurl = $cfg_webpath."/".$row2['picurl'];
						else
							$picurl = $cfg_webpath.'/templates/default/images/nofoundpic.gif';
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


<div id="vivo-head">
	<div class="vivo-search">
		<div class="search-box">
			<form name="search" id="search" method="post" action="http://www.ygayi.com/web/goods.php">
				<input type="text" placeholder="" name="keywords" id="keywords" class='data_q' autocomplete="off"><button>搜索</button>
			</form>
		</div>
	</div>
	
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
    <div class="sear01 fr">
    <div class="vivo-nav cl">
		<div class="search-user">
    <a href="#" class="search"><img src="web_images/index-search.png"></a>
    </div></div>
    </div>
</div>



</div>

	


<div class="list">

<form action="" method="post" name="myform">
	<div class="list_sx">
    	<div class="sx01 fl">
        <select name="district" onChange="tijiao()">
         <option value="370600">烟台市</option>
        <? 
	$dosql->Execute("SELECT * FROM `area` WHERE fatherid=370600 and area != '市辖区' limit 0,11");
    while($rows = $dosql->GetArray())
				{
						?>
                        <option value="<? echo $rows['areaid'];?>" <? if ($district == $rows['areaid']){?>selected <? }?>><? echo $rows['area'];?></option>
                        
                          <? } ?>
        </select>
        </div>
        <div class="sx02 fl">
        <select name="nianling" onChange="tijiao()">
        <option value="0" <?  if ($nianling == 0){?>selected <? }?>>年龄</option>
        <option value="35" <? if ($nianling == 35){?>selected <? }?>>35岁以下</option>
        <option value="48" <? if ($nianling == 48){?>selected <? }?>>36－48岁</option>
        <option value="53" <? if ($nianling == 53){?>selected <? }?>>49－53岁</option>
        <option value="54" <? if ($nianling == 54){?>selected <? }?>>54岁以上</option>
        
        </select></div>
        <div class="sx03 fl">
        <select name="education" onChange="tijiao()">
        <option value="0" <? if ($education == 0){?>selected <? }?>>学历</option>
        <option value="6" <? if ($education == 6){?>selected <? }?>>初中以下</option>
        <option value="5" <? if ($education == 5){?>selected <? }?>>初中</option>
        <option value="4" <? if ($education == 4){?>selected <? }?>>高中</option>
        <option value="2" <? if ($education == 2){?>selected <? }?>>大专</option>
        <option value="1" <? if ($education == 1){?>selected <? }?>>本科</option>
        </select>
        </div>
        <div class="sx04 fl">
        <select name="xinchou" onChange="tijiao()">
        <option value="0"    <? if ($xinchou == 0){?>selected <? }?>>薪酬</option>
        <option value="3000" <? if ($xinchou == 3000){?>selected <? }?>>3000-4000</option>
        <option value="4000" <? if ($xinchou == 4000){?>selected <? }?>>4000-6000</option>
        <option value="6000" <? if ($xinchou == 6000){?>selected <? }?>>6000-8000</option>
        <option value="8000" <? if ($xinchou == 8000){?>selected <? }?>>8000以上</option>
        </select>
        </div>
        <div class="sx05 fl">
        <select name="hail" onChange="tijiao()">
        <option value="0" <? if ($hail == 0){?>selected <? }?>>籍贯</option>
        <option value="1" <? if ($hail == 1){?>selected <? }?>>东北</option>
        <option value="2" <? if ($hail == 2){?>selected <? }?>>华北</option>
        <option value="3" <? if ($hail == 3){?>selected <? }?>>华东</option>
        <option value="4" <? if ($hail == 4){?>selected <? }?>>西南</option>
        <option value="5" <? if ($hail == 5){?>selected <? }?>>西北</option>
        <option value="6" <? if ($hail == 6){?>selected <? }?>>南方</option>
        </select>
        </div>
        <div class="sx06 fl">
        <select name="order" onChange="tijiao()">
        <option value="orderid" <? if ($order == "orderid"){?>selected <? }?>>排序</option>
        <option value="nianling" <? if ($order == "nianling"){?>selected <? }?>>年龄</option>
        <option value="xueli" <? if ($order == "xueli"){?>selected <? }?>>学历</option>
        <option value="xinchou" <? if ($order == "xinchou"){?>selected <? }?>>薪酬</option>
        <option value="jiguan" <? if ($order == "jiguan"){?>selected <? }?>>籍贯</option>
         <option value="hits" <? if ($order == "hits"){?>selected <? }?>>人气</option>
        </select>
        </div>
    </div>
    </form>
    
    <div class="list_con">
    	<dl>
        	
            
            
            
            
            <?php
				if($row['infotype'] == '0')
				{
					echo '<div class="info">'.Info($row['id']).'</div>';
				}

				else if($row['infotype'] == '4')
				{
					
                  // if(!empty($typeid)){
//					$dopage->GetPage_web("SELECT * FROM `#@__goods` WHERE  (typeid=$typeid  or `gz` like '%".$typeid."%')  AND delstate='' AND checkinfo=true ORDER BY orderid ASC",10);
//					  }else{
                 $sql = "SELECT * FROM `#@__goods` WHERE (classid=".$row['id']." or parentid=".$row['id']." or parentstr like '%".$row['id']."%') AND delstate='' AND checkinfo=true ";
	    		
				if($district != 370600)
				 $sql = $sql. " AND area=$district ";
                if($nianling > 0)
				{
					if($nianling == 35){
				 $sql = $sql. " AND  nianling<35 ";
					}
					else if($nianling == 48){
						 $sql = $sql. " AND  nianling>=36 and nianling<=48 ";
						}
						else if($nianling == 53){
						 $sql = $sql. " AND  nianling>=49 and nianling<=53 ";
						}
						else if($nianling == 54){
						 $sql = $sql. " AND  nianling>=54";
						}
				 
				}
               
                 if($education>0){
					
				 $sql = $sql. " and xueli=$education ";
					
				 }
					if($xinchou>0){
						if($xinchou == 3000){
					 $sql = $sql. " AND  xinchou>=3000 and xinchou<=4000 ";
						}
						else if($xinchou == 4000){
							 $sql = $sql. " AND  xinchou>=4000 and xinchou<=6000 ";
							}
							
							else if($xinchou == 6000){
							 $sql = $sql. " AND  xinchou>=6000 and xinchou<=8000 ";
							}
							
							else if($xinchou == 8000){
							 $sql = $sql. " AND  xinchou>=8000 ";
							}
					}
					  if($hail>0)
					    $sql = $sql. " AND  jiguan=$hail ";
						
					
                 if(!empty($order))
				 {
					 if($order == "orderid"){
				  $sql = $sql. " ORDER BY $order ASC";
				 }else{
					  $sql = $sql. " ORDER BY $order DESC"; 
					 }
					 }
				  
				 else if(empty($order))
				 
				  $sql = $sql. " ORDER BY orderid ASC";
				
				$dopage->GetPage_web($sql,10);
	  
	  
						//  }
					while($row1 = $dosql->GetArray())
					{
						
						$counts = $dosql->GetOne("SELECT sum(total) as count FROM `#@__userfavorite` WHERE aid=".$row1['id']);
					if($counts['count']){
					$count = $counts['count'];
					}else{
						$count = 0;
						}
						
						if($row1['picurl'] != '') $picurl = $cfg_webpath."/".$row1['picurl'];
					else $picurl = $cfg_webpath.'/templates/default/images/nofoundpic.gif';
					
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






<? }}?>

	<?php require_once('footer.php'); ?>

</body>
</html>