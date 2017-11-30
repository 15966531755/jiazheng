<div class="foot c">
  <div class="foot_top">
	    <div class="foot_top_main fl">
		    <div class="foot_top_main_top l zt3">选择服务</div>
			<div class="foot_top_main_bottom l zt4">
         <?php echo GetNavs(); ?>
            </div>
		</div>
		 <div class="foot_top_main fl">
		    <div class="foot_top_main_top l zt3">合作单位</div>
			<div class="foot_top_main_bottom l zt4">
            
			 <?php
	$dosql->Execute("SELECT * FROM `#@__weblink` WHERE classid=1 AND checkinfo=true ORDER BY orderid,id DESC");
	while($row = $dosql->GetArray())
	{
	?>
	<a href="<?php echo $row['linkurl']; ?>" target="_blank" rel="nofollow"><?php echo $row['webname']; ?></a><br />
	<?php
	}
	?>
            </div>
		</div>
		 <div class="foot_top_main fl">
		    <div class="foot_top_main_top l zt3"> 优惠活动</div>
			<div class="foot_top_main_bottom l zt4">
            
           <? 
		   $dopage->GetPage("SELECT * FROM `#@__infoclass` WHERE (parentid=22 OR parentstr LIKE '%,22,%')  AND checkinfo=true ORDER BY orderid ASC",8);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'contact.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'contact-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					
				?>
                <a href="<? echo $gourl;?>"><? echo $row['classname'];?></a><br />
                
                <? }?>
               
               </div>
		</div>
		 <div class="foot_top_main fl">
		    <div class="foot_top_main_top l zt3">服务须知</div>
			<div class="foot_top_main_bottom l zt4">
             <? 
		   $dopage->GetPage("SELECT * FROM `#@__infoclass` WHERE (parentid=23 OR parentstr LIKE '%,23,%')  AND checkinfo=true ORDER BY orderid ASC",8);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'contact.php?cid='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'contact-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					
				?>
                <a href="<? echo $gourl;?>"><? echo $row['classname'];?></a><br />
                
                <? }?>
            
            </div>
		</div>
	</div>
	<div class="foot_bottom zt2">
	  <p>
     <a href="contact-44-1.html" rel="nofollow">关于我们</a>  |
       <a href="contact-45-1.html" rel="nofollow">联系我们</a>  | 
       <a href="contact-46-1.html" rel="nofollow">加入我们</a>  | 
       
           <a href="contact-48-1.html" rel="nofollow">法律声明</a>
           </p>
	  <p>阳光阿姨（ygayi.com）率先推出融在线预定、点评为一体的家政经纪服务平台，</p>
	  <p>是家政的践行者。我们将线上的雇佣查询、预定、合同管理、雇佣评价与线下的经纪人主导的面试撮合、背景调查、雇后服务相结合，让雇主真正实现放心找阿姨、有事找经纪。</p>
	  <p>鲁ICP备15001476号-1</p>
	  <p>Copyright © 2014-2015 烟台良源母婴护理服务有限公司 版权所有 </p>
	  
	  	 <!-- 百度统计-->
	  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?b877323a2d224040cee94fb0ff26496f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
  </div>
</div>


<div id="xixi" class="fudong" style="z-index:999" >
    <div class="fudong_top">
	    <div class="qqkf">
		    <div class="qqkf_top"><a href="tencent://message/?uin=328562219&Site= http://www.axyz.cn&Menu=yes"><img src="images/19.jpg" width="47" height="47" /></a></div>
			<div class="qqkf_bottom c"><a href="tencent://message/?uin=328562219&Site= http://www.axyz.cn&Menu=yes" style="color:#68bb4b;">QQ客服</a></div>
		</div>
	</div>
	<div class="fudong_main">
	    <div class="dhkf">
		    <div class="dhkf_top"><img src="images/20.jpg" width="47" height="47" /></div>
			<div class="dhkf_bottom c">电话客服</div>
		</div>
	</div>
	<div class="fudong_bottom">
	    <div class="fudong_bottom_top c">400-1512-215</div>
		<div class="fudong_bottom_main">
         <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=63  AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,1");
			while($row = $dosql->GetArray())
			{?>
        <img src="<?php echo $row['picurl']; ?>" width="105" height="105" />
			<? } ?>
		</div>
		<div class="fudong_bottom_bottom c">扫一扫<br />
	    关注微信公众号</div>
	</div>
</div>

<SCRIPT language=javascript>
		客服果果=function (id,_top,_left){
		var me=id.charAt?document.getElementById(id):id, d1=document.body, d2=document.documentElement;
		d1.style.height=d2.style.height='100%';me.style.top=_top?_top+'px':0;me.style.right=_left+"px";//[(_left>0?'left':'left')]=_left?Math.abs(_left)+'px':0;
		me.style.position='absolute';
		setInterval(function (){me.style.top=parseInt(me.style.top)+(Math.max(d1.scrollTop,d2.scrollTop)+_top-parseInt(me.style.top))*0.1+'px';},10+parseInt(Math.random()*20));
		return arguments.callee;
		};
		window.onload=function (){
		客服果果
		('xixi',150,0)
		}
	</SCRIPT>

<SCRIPT language=javascript> 
			lastScrollY=0; 
			
			var InterTime = 20;
			var maxWidth=-1;
			var minWidth=157;
			var numInter =8;
			
			var BigInter ;
			var SmallInter ;
			
			var o =  document.getElementById("xixi");
				var i = parseInt(o.style.left);
				function Big()
				{
					if(parseInt(o.style.left)<maxWidth)
					{
						i = parseInt(o.style.left);
						i += numInter;	
						o.style.left=i+"px";	
						if(i==maxWidth)
							clearInterval(BigInter);
					}
				}
				function toBig()
				{
					clearInterval(SmallInter);
					clearInterval(BigInter);
						BigInter = setInterval(Big,InterTime);
				}
				function Small()
				{
					if(parseInt(o.style.left)>minWidth)
					{
						i = parseInt(o.style.left);
						i -= numInter;
						o.style.left=i+"px";
						
						if(i==minWidth)
							clearInterval(SmallInter);
					}
				}
				function toSmall()
				{
					clearInterval(SmallInter);
					clearInterval(BigInter);
					SmallInter = setInterval(Small,InterTime);
					
				}
				
</SCRIPT>

