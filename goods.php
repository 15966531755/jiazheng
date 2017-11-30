<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 0 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$district = empty($district) ? "" : $district;
$age1 = empty($age1) ? "" : $age1;
$age2 = empty($age2) ? "" : $age2;                        
$education = empty($education) ? "" : $education;
$pay1 = empty($pay1) ? "" : $pay1;
$pay2 = empty($pay2) ? "" : $pay2;
$hail = empty($hail) ? "" : $hail;
$order = empty($order) ? "" : $order;
$id = empty($id) ? 0 : intval($id);
$str = empty($str) ? "" : intval($str);
$keywords = empty($keywords) ? "" : $keywords;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid,$id,$str,$tid); ?>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>
<script type="text/javascript">
$(function(){
    $(".goods_list li img").LoadImage({width:220,height:220});
});
</script>

<script type="text/javascript">

		function AddFavorite(){
	
			alert("加入收藏失败，请登录！");
			window.location.href="member.php?c=login";
	
}

function login(){
	 var username = document.getElementById("username").value;
	
	  if(username == ""){
						window.location.href="member.php?c=login&url=q_reservation.php";
						   return false;
						   }
						   window.location.href="q_reservation.php";
	}
		</script>
</head>
<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header--> 
<div class="aysx c" style="height:1550px;">
    <div class="aysx_top">
	    <div class="aysx_top_top"><img src="images/21.jpg" width="1040" height="96" /></div>
        
            <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
      <input type="hidden" name="keywords" id="keywords" value="<? echo $keywords;?>"/>

		<div class="aysx_top_bottom">
		    <div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">服务范围：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
                  
                        <li><a <?php if($district == ""){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">全部</a></li>
					   <li><a>烟台市</a></li>
						<? 
	$dosql->Execute("SELECT * FROM `area` WHERE fatherid=370600 and area != '市辖区' limit 0,11");
    while($rows = $dosql->GetArray())
				{
						?>
                        <li><a <?php if($district == $rows['areaid']){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $rows['areaid'];?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>"><? echo $rows['area'];?></a></li>
                        
                        <? } ?>
					</ul>
				</div>
			</div>
			<div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">年　　龄：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
					    <li><a <?php if(($age1 == "")and($age2 == "")){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=&age2=&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">全部</a></li>
						<li><a <?php if(($age1 == "")and($age2 == 35)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=&age2=35&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">35岁以下</a></li>
						<li><a <?php if(($age1 == 36)and($age2 == 48)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=36&age2=48&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">36－48岁</a></li>
						<li><a <?php if(($age1 == 49)and($age2 == 53)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=49&age2=53&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">49－53岁</a></li>
						<li><a <?php if(($age1 == 54)and($age2 == "")){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=54&age2=&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">54岁以上</a></li>
					</ul>
			  </div>
			</div>
			<div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">学　　历：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
					    <li><a <?php if($education == ""){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">全部</a></li>
					    <li><a <?php if($education == 6){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=6&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">初中以下</a></li>
						<li><a <?php if($education == 5){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=5&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">初中</a></li>
						<li><a <?php if($education == 4){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=4&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">高中</a></li>
                        <li><a <?php if($education == 3){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=3&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">大专</a></li>
						<li><a <?php if($education == 2){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=2&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">本科</a></li>
					</ul>
			  </div>
			</div>
			<div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">薪　　酬：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
					    <li><a <?php if(($pay1 == "") and ($pay2 == "")){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=&pay2=&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">全部</a></li>
						<li><a <?php if(($pay1 == 3000) and ($pay2 == 4000)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=3000&pay2=4000&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">3000-4000</a></li>
						<li><a <?php if(($pay1 == 4000) and ($pay2 == 6000)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=4000&pay2=6000&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">4000-6000</a></li>
						<li><a <?php if(($pay1 == 6000) and ($pay2 == 8000)){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=6000&pay2=8000&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">6000-8000</a></li>
						<li><a <?php if(($pay1 == 8000) and ($pay2 == "")){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=8000&pay2=&hail=<? echo $hail;?>&order=<? echo $order;?>&keywords=<? echo $keywords;?>">8000以上</a></li>
					</ul>
			  </div>
			</div>
			<div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">籍　　贯：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
					    <li><a <?php if($hail == ""){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=&order=<? echo $order;?>&keywords=<? echo $keywords;?>">全部</a></li>
						<li><a <?php if($hail == 1){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=1&order=<? echo $order;?>&keywords=<? echo $keywords;?>">东北</a></li>
						<li><a <?php if($hail == 2){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=2&order=<? echo $order;?>&keywords=<? echo $keywords;?>">华北</a></li>
						<li><a <?php if($hail == 3){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=3&order=<? echo $order;?>&keywords=<? echo $keywords;?>">华东</a></li>
						<li><a <?php if($hail == 4){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=4&order=<? echo $order;?>&keywords=<? echo $keywords;?>">西南</a></li>
						<li><a <?php if($hail == 5){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=5&order=<? echo $order;?>&keywords=<? echo $keywords;?>">西北</a></li>
						<li><a <?php if($hail == 6){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=6&order=<? echo $order;?>&keywords=<? echo $keywords;?>">南方</a></li>
					</ul>
			  </div>
			</div>
			<div class="aysx_top_bottom_main">
			    <div class="aysx_top_bottom_main_left fl zt7">排　　序：</div>
				<div class="aysx_top_bottom_main_right fr">
				    <ul>
					    <li><a <?php if($order == ""){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=&keywords=<? echo $keywords;?>">默认</a></li>
						<li><a <?php if($order == "nianling"){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=nianling&keywords=<? echo $keywords;?>">年龄</a></li>
						<li><a <?php if($order == "xueli"){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=xueli&keywords=<? echo $keywords;?>">学历</a></li>
						<li><a <?php if($order == "xinchou"){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=xinchou&keywords=<? echo $keywords;?>">薪酬</a></li>
						<li><a <?php if($order == "jiguan"){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=jiguan&keywords=<? echo $keywords;?>">籍贯</a></li>
						<li><a <?php if($order == "hits"){ ?> class="cur" <? }?> href="goods.php?cid=<? echo $cid;?>&tid=<? echo $tid;?>&district=<? echo $district;?>&age1=<? echo $age1;?>&age2=<? echo $age2;?>&education=<? echo $education;?>&pay1=<? echo $pay1;?>&pay2=<? echo $pay2;?>&hail=<? echo $hail;?>&order=hits&keywords=<? echo $keywords;?>">人气</a></li>
					</ul>
			  </div>
			</div>
		</div>
        
      
	</div>
	<div class="aysx_main">
	<div class="aysx_main_top" style="height:1020px;">
	    
		
		
		
        
        <?php
				
				if($tid)
				//$row = $dosql->GetOne("SELECT * FROM `#@__goodstype` WHERE id=".$tid); 
					$sql = "SELECT * FROM `#@__goods` WHERE  (typeid=$tid  or `gz` like '%".$tid."%') AND delstate='' AND checkinfo=true ";
					
					else
					$sql = "SELECT * FROM `#@__goods` WHERE  delstate='' AND checkinfo=true ";
					if(!empty($keywords))
				{
					$keywords = htmlspecialchars($keywords);
					 $sql = "SELECT * FROM `#@__goods` WHERE  (title LIKE '%$keywords%' or bianhao like '%$keywords%') AND delstate='' AND checkinfo=true ";

				}
				
				if(!empty($district))
				 $sql = $sql. " AND area=$district ";
                if(!empty($age1))
				 $sql = $sql. " AND  nianling>=$age1 ";
                if(!empty($age2))
				 $sql = $sql. " and nianling<=$age2 ";
                 if(!empty($education)){
					 
					if($education ==  2 ){ 
				 $sql = $sql. " and xueli<=$education ";
					}
					else { 
				 $sql = $sql. " and xueli=$education ";
					}
				 }
					if(!empty($pay1))
					 $sql = $sql. " AND  xinchou>=$pay1 ";
					 if(!empty($pay2))
					  $sql = $sql. " AND  xinchou<$pay2 ";
					  if(!empty($hail))
					    $sql = $sql. " AND  jiguan=$hail ";
						
					
                 if(!empty($order))
				  $sql = $sql. " ORDER BY $order ASC";
				  
				 else if(empty($order))
				 
				  $sql = $sql. " ORDER BY orderid ASC";
				 
				 
				 
				
				$dopage->GetPage($sql,8);
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
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
		<div class="aysx_main_main fl">
		    <div class="aysx_main_main_left fl"><a href="<? echo $gourl;?>"><img src="<?php echo $picurl; ?>" width="151" height="200" /></a></div>
			<div class="aysx_main_main_right fl">
			    <div class="aysx_main_main_right1">
				    <div class="aysx_main_main_right1_left fl zt6" style="width:75px;"><a href="<? echo $gourl;?>"><?php echo ReStrLen($row['title'],20); ?></a></div>
					<div class="aysx_main_main_right1_right fl"><img src="images/27.jpg" width="30" height="30" /></div>
				</div>
				<div class="aysx_main_main_right2 l" style="overflow:hidden; height:87px;">
                <? echo $row['description'];?>
                </div>
				<div class="aysx_main_main_right3">
				    <div class="aysx_main_main_right3_left fl">参考工资：</div>
					<div class="aysx_main_main_right3_right fl zt8"><? echo $row['xinchou'];?>元/月</div>
				</div>
               
				<div class="aysx_main_main_right4">
				    <div class="aysx_main_main_right41 fr"><a href="javascript:;" onclick="<? if(isset($_COOKIE['username'])){?>AddUserFavorite(<? echo $row['id'];?>,<? echo $row['classid'];?>,<? echo $row['typeid'];?>) <? }else{?> AddFavorite()<? }?>">收藏</a>(<? echo $count;?>)</div>
					<div class="aysx_main_main_right42 fr"><img src="images/29.jpg" /></div>
					<div class="aysx_main_main_right43 fr"><a href="<? echo $gourl;?>">查看</a></div>
					<div class="aysx_main_main_right44 fr"><img src="images/28.jpg" /></div>
				</div>
			</div>
		</div>
		
		<?php
				}
				?>
                
	
		
		
		
		
		
		

		</div>
		    <div class="aysx_main_bottom">
			  <?php echo $dopage->GetList(); ?>
			</div>
	</div>
	<div class="aysx_bottom"><a style="cursor:pointer;" onclick="login()"><img src="images/24.jpg" width="799" height="89" border="0" /></a></div>
</div>

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->


</body>
</html>