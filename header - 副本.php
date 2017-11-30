<!--百度站长平台验证代码-->
<meta name="baidu-site-verification" content="7xViEKydaK" />
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js" charset="utf-8"></script>
<!-- JiaThis Button END -->

<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101216639" data-redirecturi="http://www.ygayi.com" charset="utf-8"></script>
<script type="text/javascript">
//从页面收集OpenAPI必要的参数。get_user_info不需要输入参数，因此paras中没有参数
var paras = {};

//用JS SDK调用OpenAPI
QC.api("get_user_info", paras)
	//指定接口访问成功的接收函数，s为成功返回Response对象
	//.success(function(s){
//		//成功回调，通过s.data获取OpenAPI的返回数据
//		alert("获取用户信息成功！当前用户昵称为："+s.data.nickname);
//	})
//	//指定接口访问失败的接收函数，f为失败返回Response对象
//	.error(function(f){
//		//失败回调
//		alert("获取用户信息失败！");
//	})
//	//指定接口完成请求后的接收函数，c为完成请求返回Response对象
//	.complete(function(c){
//		//完成请求回调
//		alert("获取用户信息完成！");
//	});
</script>

<script type="text/javascript">
var paras = {content : "#QQ互联JSSDK测试#曾经沧海难为水，除却巫山不是云。"};

QC.api("add_t", paras)
	//.success(function(s){//成功回调
//		alert("发送微博成功，请到腾讯微博内查看！");
//	})
//	.error(function(f){//失败回调
//		alert("发送微博失败！");
//	})
//	.complete(function(c){//完成请求回调
//		alert("发送微博完成！");
//	});
</script>
	
    <script type="text/javascript">
//if(QC.Login.check()){//如果已登录
//	QC.Login.getMe(function(openId, accessToken){
//		//alert(["当前登录用户的", "openId为："+openId, "accessToken为："+accessToken].join("\n"));
//		alert("登陆成功");
//	});
//	//这里可以调用自己的保存接口
//	//...
//}
</script>
<div class="head">
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
				<div class="head_top_main_right7 fr"><img src="images/2.jpg" /></div>
				<div class="head_top_main_right8 fr"><a href="https://graph.qq.com/oauth2.0/authorize?client_id=101216639&response_type=token&scope=all&redirect_uri=http%3A%2F%2Fwww.ygayi.com"><span id="qq_login_btn"></span></a></div>
                <script type="text/javascript">
	QC.Login({//按默认样式插入QQ登录按钮
		btnId:"qq_login_btn"	//插入按钮的节点id
	});
</script>
				<div class="head_top_main_right9 fr zt1">
               <?php if($cfg_member == 'Y'){if(isset($_COOKIE['username'])){?><a href="member.php?c=default"><? echo AuthCode($_COOKIE['username']);?></a>&nbsp;&nbsp;<a href="member.php?a=logout">退出</a><?php }else{ ?><a href="member.php?c=login">登录</a>&nbsp;&nbsp;&nbsp;<a href="member.php?c=reg">注册</a><?php }}?>
  
                </div>
			</div>
		</div>
	</div>
	<div class="head_bottom">
	    <div class="head_bottom1 fl"><a href="./">
        <? $row = $dosql->GetOne("SELECT * FROM `#@__infoimg` where classid=50 AND delstate='' AND checkinfo=true order by orderid DESC LIMIT 0,1");?>
        <img src="<?php echo $row['picurl']; ?>"  width="202" height="74"/>
        
        </a></div>
		<div class="head_bottom2 fl" style="width:100px;">
		    <div class="head_bottom2_left fl">烟台</div>
			<div class="head_bottom2_right fl"> <img onclick="" src="images/15.jpg" width="24" height="24" />
       
            
            </div>
           
		</div>
		<div class="head_bottom3 fl">
        <a href="product-5-1.html"><img src="images/index_14_1.jpg" /></a>
        <a href="q_reservation.php"><img src="images/index_14_2.jpg" width="105" /></a>
        <a href=""><img src="images/index_14_3.jpg" /></a>
        </div>
        
        <form name="search" id="search" method="post" action="goods.php">
		<div class="head_bottom4 fr">
		    <div class="head_bottom4_left fl"><img src="images/index_09.jpg" width="16" height="35" alt=""></div>
			<div class="head_bottom4_main fl"><input style="width:170px;height:29px; margin-top:3px; border:none;outline:none; background-color:#26a035;" type="text" name="keyword" id="keyword" title="输入阿姨姓名或编号进行搜索" value=""  /></div>
			<div class="head_bottom4_right fr"><img style="cursor:pointer;" onclick="s_p()" src="images/index_11.jpg" width="35" height="35" alt=""></div>
		</div>
        </form>
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