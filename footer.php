

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

