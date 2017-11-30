<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 5 : intval($cid);
$tid = empty($tid) ? 5 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />
<?php echo GetHeader(1,$cid); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>
<script type="text/javascript" src="templates/default/js/jquery.1.4.2-min.js"></script>
<script src="templates/default/js/mz-packed.js" type="text/javascript"></script>
<link rel="stylesheet" href="MagicZoom.css" type="text/css" media="screen" />

<link href="on_index.css" rel="stylesheet" type="text/css">
<script src="js/bplayer.js" type="text/javascript"></script>
<style type="text/css">
/*.nav{width:1000px;background:#fff;margin:20px auto 0;border:solid 1px #ccc;zoom:1;border-radius:5px;box-shadow:0 1px 6px rgba(0,0,0,0.1);color:#D74452;}*/
.nav_scroll{position:fixed;width:100%;margin:0 auto;left:0;top:0;z-index:999;height: 47px;background: url(images/1.png) left repeat-x;}
.nav:after{content:"";display:block;height:0;clear:both;visibility:hidden;}
</style>
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
<script type="text/javascript">
$(function(){
    $(".product_list li img").LoadImage({width:220,height:150});
});


function tijiao(){
	document.search.submit();
	
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
<div class="cxda c" style="height:auto; margin-bottom:20px;">

<form name="searchs" id="searchs" method="get" action="product.php" style="margin-bottom:30px;">
 <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
    <div class="cxda_top">
	    <div class="cxda_top_top zt6">输入阿姨姓名或编号 查询阿姨档案</div>
		<div class="cxda_top_bottom">
		    <div class="cxda_top_bottom_left fl"><img src="images/30.jpg" /></div>
			<div class="cxda_top_bottom_main fl"><input name="keyword" id="keyword" type = "text" style=" outline:none;width:288px; height:25px; line-height:25px; font-size:14px; border:0px; margin-top:8px;"/></div>
			<div class="cxda_top_bottom_right fr">
            <button type="submit" id="search_btn"  style=" background:url(images/31.jpg); width:54px; height:41px; border:none; cursor:pointer;"></button>
           </div>
		</div>
	</div>
    </form>
    
    <?php
				if(!empty($keyword))
				{
					$keyword = htmlspecialchars($keyword);

					$dopage->GetPage("SELECT * FROM `#@__goods` WHERE  (title='".$keyword."' or bianhao ='".$keyword."') AND delstate='' AND checkinfo=true");
				}
				

				
				while($row = $dosql->GetArray())
				{
					
				?>		
	<div class="cxda_bottom">
	    <div class="cxda_bottom1">
		    <div class="cxda_bottom1_left fl"><img src="<? echo $row['picurl'];?>" width="161" height="216" alt="" /></div>
			<div class="cxda_bottom1_right fl l">
			    <div class="cxda_bottom1_right_main">
				    <div class="cxda_bottom1_right_main1 fl zt9">姓名</div>
					<div class="cxda_bottom1_right_main2 fl zt10"><? echo $row['title'];?></div>
					<div class="cxda_bottom1_right_main3 fl zt9">出生日期</div>
					<div class="cxda_bottom1_right_main4 fl zt10"><? echo $row['birthday'];?></div>
				</div>
				<div class="cxda_bottom1_right_main">
				    <div class="cxda_bottom1_right_main1 fl zt9">民族</div>
					<div class="cxda_bottom1_right_main2 fl zt10"><? echo $row['minzu'];?></div>
					<div class="cxda_bottom1_right_main3 fl zt9">健康状况</div>
					<div class="cxda_bottom1_right_main4 fl zt10"><? echo $row['jkzk'];?></div>
				</div>
				<div class="cxda_bottom1_right_main">
				    <div class="cxda_bottom1_right_main1 fl zt9">身高</div>
					<div class="cxda_bottom1_right_main2 fl zt10"><? echo $row['height'];?>cm</div>
					<div class="cxda_bottom1_right_main3 fl zt9">求职意向</div>
					<div class="cxda_bottom1_right_main4 fl zt10"><? echo $row['qzyx'];?></div>
				</div>
				<div class="cxda_bottom1_right_main">
				    <div class="cxda_bottom1_right_main1 fl zt9">学历</div>
					<div class="cxda_bottom1_right_main2 fl zt10">
						<?
							 if($row['xueli'] == 1)
							 echo "本科";
							 else if($row['xueli'] == 2)
							 echo "大专";
							  else if($row['xueli'] == 3)
							 echo "中专";
							  else if($row['xueli'] == 4)
							 echo "高中";
							  else if($row['xueli'] == 5)
							 echo "初中";
							  else
							 echo "小学";
								 
								 ?>
                    </div>
					<div class="cxda_bottom1_right_main3 fl zt9">从业经验</div>
					<div class="cxda_bottom1_right_main4 fl zt10"><? echo $row['cyjy'];?></div>
				</div>
				<div class="cxda_bottom1_right_main">
				    <div class="cxda_bottom1_right_main1 fl zt9">籍贯</div>
					<div class="cxda_bottom1_right_main2 fl zt10" style="overflow:hidden;" title="<? echo $row['jg'];?>"><? echo $row['jg'];?></div>
					<div class="cxda_bottom1_right_main3 fl zt9">居住地址</div>
					<div class="cxda_bottom1_right_main4 fl zt10"><? echo $row['jzdz'];?></div>
				</div>
			</div>
		</div>
		<div class="cxda_bottom2">
		    <div class="cxda_bottom2_left fl">
          <a href="<?php echo $row['sfz']; ?>"  class="MagicZoom">
          <img src="<?php echo $row['sfz']; ?>" width="280" height="180" />
       </a>
            </div>
			<div class="cxda_bottom2_right fl" style="text-align: -webkit-center;">
             <a href="images/72.jpg"  class="MagicZoom">
          <img src="images/72.jpg" width="130" height="180" />
          </a>
            </div>
		</div>
		<div class="cxda_bottom3">
        <div style="width:775px;margin-top:20px; float: left;">
        <?php
		
					if($row['picarrs'] != '')
					{
						$picarrs = unserialize($row['picarrs']);
						foreach($picarrs as $v)
						{
							$v = explode(',', $v);
							?>
						  <a href="<? echo $v[0];?>"  class="MagicZoom" style="float:left; margin-left:5px;"> <img src=" <? echo $v[0];?>" width="180" height="120"/></a>
						<?
                        }
					}
				
					?>
       
            </div>
        </div>
        <marquee onMouseOver=this.stop() onMouseOut=this.start() scrollamount=6 scrolldelay=6 direction=rtl width=68% height=100%>
		<div class="cxda_bottom4">
			<?php
				$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=67 and orderid!=1 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,12");
				while($row = $dosql->GetArray())
				{
					if($row['linkurl'] != '')$gourl = $row['linkurl'];
					else $gourl = 'javascript:;';
			?>

			<div id="myjQuery" style="height: 180px;width:25%;float: left;">
			    <div id="myjQueryContent" style="height: 180px;width: 100%;">
			    
			        <div class="smask" style="height: 100%;width :100%; float: left;margin-left: 5px;"><img src="<?php echo $row['picurl']; ?>" style="width:100%; height:180px;" /></div>

				
			    </div>
  			</div>

  			<?php
				}
			?>

		</div>
		</marquee>
	</div>
	<div class="tx">阳光阿姨诚信档案信息真实可靠，电子版和纸质版双重入档，我们为阿姨的诚信保驾护航！</div>
    
    	<?php
				}
				?>
    
    <div class="aysx_bottom" style="height:auto; margin-top:20px;"><a style="cursor:pointer;" onclick="login()"><img src="images/24.jpg" width="799" height="89" border="0" /></a></div>

</div>
<script src="templates/default/js/jquery.star-rating-svg.js"></script>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>