<div class="head">
    <div class="head_top">
	    <div class="head_top_main">
		    <div class="head_top_main_left fl">有阳光的地方就有阳光阿姨</div>
			<div class="head_top_main_right fr r">
			    <div class="head_top_main_right1 fr zt1"><a href="member.php">会员中心</a></div>
				<div class="head_top_main_right2 fr"><img src="images/5.jpg" /></div>
				<div class="head_top_main_right3 fr zt1"><a href="contact-14-1.html">联系我们</a></div>
				<div class="head_top_main_right4 fr"><img src="images/4.jpg" /></div>
				<div class="head_top_main_right5 fr zt1">0535-2112156</div>
				<div class="head_top_main_right6 fr"><img src="images/3.jpg" /></div>
				<div class="head_top_main_right7 fr"><img src="images/2.jpg" /></div>
				<div class="head_top_main_right8 fr"><img src="images/1.jpg" /></div>
				<div class="head_top_main_right9 fr zt1">
                <?php if($cfg_member == 'Y'){if(isset($_COOKIE['username'])){?>
    <a href="member.php?c=default">会员中心</a>&nbsp;&nbsp;
    <a href="member.php?a=logout">退出</a>
	<?php }else{ ?>
    <a href="member.php?c=login">[登录]</a>&nbsp;&nbsp;&nbsp;<a href="member.php?c=reg">[免费注册]</a>
	<?php }} ?>
  
                </div>
			</div>
		</div>
	</div>
	<div class="head_bottom">
	    <div class="head_bottom1 fl"><a href="./"><img src="images/index_05.jpg" /></a></div>
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
		<div class="head_bottom3 fl"><img src="images/index_14.jpg" /></div>
		<div class="head_bottom4 fr">
		    <div class="head_bottom4_left fl"><img src="images/index_09.jpg" width="16" height="35" alt=""></div>
			<div class="head_bottom4_main fl"></div>
			<div class="head_bottom4_right fr"><img src="images/index_11.jpg" width="35" height="35" alt=""></div>
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

</script>