<script type='text/javascript' src='js/public.js'></script>
<script type="text/javascript" src="templates/default/js/top_xuanfu.js"></script>
<style type="text/css">
/*.nav{width:1000px;background:#fff;margin:20px auto 0;border:solid 1px #ccc;zoom:1;border-radius:5px;box-shadow:0 1px 6px rgba(0,0,0,0.1);color:#D74452;}*/
.nav_scroll{position:fixed;width:100%;margin:0 auto;left:0;top:0;z-index:999;height: 47px;background: url(images/1.png) left repeat-x;}
.nav:after{content:"";display:block;height:0;clear:both;visibility:hidden;}


</style>
<script type="text/javascript">
$(document).ready(function(){
 var topMain=$("#myjQuery").height()+100//是头部的高度加头部与nav导航之间的距离
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
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
<div class="head2">
    <div class="head_top">
	    <div class="head_top_main">
		    <div class="head_top_main_left fl">有阳光阿姨的地方就有阳光</div>
			<div class="head_top_main_right fr r">
			    <div class="head_top_main_right1 fr zt1"><a href="member.php">会员中心</a></div>
				<div class="head_top_main_right2 fr"><img src="images/5.jpg" /></div>
				<div class="head_top_main_right3 fr zt1"><a href="contact-45-1.html">联系我们</a></div>
				<div class="head_top_main_right4 fr"><img src="images/4.jpg" /></div>
				<div class="head_top_main_right5 fr zt1">400-1512-215</div>
				<div class="head_top_main_right6 fr"><img src="images/3.jpg" /></div>
				<div class="head_top_main_right7 fr"><a href="data/api/oauth/connect.php?method=weixin_token"><img src="images/2.jpg" /></a></div>
				<div class="head_top_main_right8 fr"><a href="data/api/oauth/connect.php?method=qq_token" ><img src="images/1.jpg" /></a></div>
              

				<div class="head_top_main_right9 fr zt1">
               <?php if($cfg_member == 'Y'){if(isset($_COOKIE['username'])){?><a href="member.php?c=default"><? echo  AuthCode($_COOKIE['username']);?></a>&nbsp;&nbsp;<a href="member.php?a=logout">退出</a><?php }else{ ?><a href="member.php?c=login">登录</a>&nbsp;&nbsp;&nbsp;<a href="member.php?c=reg">注册</a><?php }}?>
  
                </div>
			</div>
		</div>
	</div>
	<div class="head_bottom">
	    <div class="head_bottom1 fl"><a href="./"> <? $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` where classid=50 AND delstate='' AND checkinfo=true order by orderid DESC LIMIT 0,1");?>
        <img src="<?php echo $row['picurl']; ?>"  width="202" height="74"/></a></div>
		<div class="head_bottom2 fl" style="width:100px;">
		    <div class="head_bottom2_left fl"><input onclick="d()" type="text" name="diqu" id="diqu" style="width:30px; outline:none; border:none;"/></div>
			<div class="head_bottom2_right fl"> <img onclick="" src="images/15.jpg" width="24" height="24" />
       
            
            </div>
            <div id="area_index" style=" display:none;margin-top: 25px;position: absolute;z-index:111; background:#fff; width:70px;">
            <ul> 
            
										 <?php 
	$dosql->Execute("select * from `#@__city`");
	
	while($row = $dosql->GetArray()){
		
	
?>
<li><a onclick="c('<? echo $row['city'];?>')"><? echo $row['city'];?></a></li> 
<? }?>
</ul> 
</div>
		</div>
		<div class="head_bottom3 fl">
        <a href="product-5-1.html"><img src="images/index_14_1.jpg" /></a>
        <a href="q_reservation.php"><img src="images/index_14_2.jpg" width="105" /></a>
        <a href="member.php?c=default"><img src="images/index_14_3.jpg" /></a>
        </div>
		<form name="search" id="search" method="post" action="http://www.ygayi.com/goods.php">
		<div class="head_bottom4 fr">
		    <div class="head_bottom4_left fl"><img src="images/index_09.jpg" width="16" height="35" alt=""></div>
			<div class="head_bottom4_main fl"><input style="width:170px;height:29px; margin-top:3px; border:none;outline:none; background-color:#26a035;" type="text" name="keywords" id="keywords" title="输入阿姨姓名或编号进行搜索" value=""  /></div>
			<div class="head_bottom4_right fr"><img style="cursor:pointer;" onclick="s_p()" src="images/index_11.jpg" width="35" height="35" alt=""></div>
		</div>
        </form>
	</div>
	<div id="dh" style="margin-top:0px;">
        <div class="dh_w" style="width:100%;">
		    <div class="dh_main c">
			    <ul>
					  <? 
				  $dosql->Execute("SELECT * FROM `#@__nav` WHERE parentid=1 AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		if($cfg_isreurl != 'Y')
			$gourl = $row['linkurl'];
		else
			$gourl = $row['relinkurl'];
		
			$classname = $row['classname'];
       if($row['id'] == $tid){
				  ?>
					<li><a class="nav" href="<? echo $gourl;?>"><? echo $classname;?></a></li>
                    
                    <? }else{?>
						
						<li><a  href="<? echo $gourl;?>"><? echo $classname;?></a></li>
					<?	}}?>
				</ul>
			</div>
            </div>
		</div>
</div>

<script type="text/javascript">

function d(){
	document.getElementById("area_index").style.display="block";
	}
function c(a){
	document.getElementById("diqu").value=a;
	document.getElementById("area_index").style.display="none";
	}
	function s_p(){
	document.search.submit();
	}

</script>