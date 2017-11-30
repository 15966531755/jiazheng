<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_webname; ?> - 会员登陆</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
<!--<script type="text/javascript" 
src="http://qzonestyle.gtimg.cn/qzone/openapi/qc.js#appId=101216639"
charset="UTF-8">
</script>-->
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


</head>

<body>
<div class="header">
	<div class="area">
		<!--<div class="logo"><a href="<?php echo $cfg_webpath; ?>/"></a></div>-->
		<div class="retxt"><a href="<?php echo $cfg_webpath; ?>/">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?c=reg">注册</a></div>
	</div>
</div>
<div class="mainbody" style="position:relative;">
	<div class="top">
		<h2>登陆账户</h2>
		<div class="txt">欢迎您登陆<?php echo $cfg_webname; ?>会员，如果您还没有注册，则可在此 <a href="?c=reg">注册</a></div>
	</div>
	<?php
	if($d == md5('reg'))
	{
		echo '<div class="infor">恭喜您，注册成功，请登陆！</div>';
	}
	else if($d == md5('newpwd'))
	{
		echo '<div class="infor">重设新密码成功！</div>';
	}
	?>
	<form id="form" method="post" action="?a=login" onsubmit="return CheckLog();">
     <input type="hidden" name="name_x" id="name_x" value="<? echo $cid;?>"/>
    <input type="hidden" name="mobile_x" id="mobile_x" value="<? echo $tid;?>"/>
    <input type="hidden" name="province" id="province" value="<? echo $aid;?>"/>
    <input type="hidden" name="city" id="city" value="<? echo $molds;?>"/>
    <input type="hidden" name="area" id="area" value="<? echo $area;?>"/>
    <input type="hidden" name="gz_x" id="gz" value="<? echo $gz;?>"/>
     <input type="hidden" name="gourl" id="gourl" value="<? echo $_GET['url'];?>"/>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="100" height="50">用户名：</td>
				<td colspan="2"><input type="text" name="username" id="username" class="input" /></td>
				</tr>
				<tr>
					<td height="50">密　码：</td>
					<td colspan="2"><input type="password" name="password" id="password" class="input" /></td>
				</tr>
				<tr>
					<td height="50">验证码：</td>
					<td colspan="2"><input type="text" name="validate" id="validate" class="input" maxlength="4" />
						<span><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></span><br /></td>
				</tr>
				<tr>
					<td height="70"> </td>
					<td width="110"><input type="submit" value="立即登陆" class="sub" /></td>
                    <td width="110"><input type="button" value="经理人登陆" class="sub"  onclick=" javascript:window.location.href='http://www.ygayi.com/admin'"/></td>
					<td width="1138"><a href="?c=findpwd" class="findpwd">忘记密码？</a></td>
				</tr>
				<tr>
					<td height="22">&nbsp;</td>
					<td colspan="2"><input type="checkbox" title="两周内自动登录" name="autologin" id="autologin" value="1" />
					<label for="autologin" title="为了您的信息安全，请不要在网吧或公用电脑上使用此功能！"> 两周内自动登录</label></td>
				</tr>
				<?php
				if($cfg_oauth == 'Y')
				{
				?>
				<tr>
					<td height="40"> </td>
					<td colspan="2" valign="bottom">合作账号：<span id="qq_login_btn"></span>
<!-- <a href="data/api/oauth/connect.php?method=weibo_token" class="osina">微博登录</a>--></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</form>
    
    <script type="text/javascript">
QC.Login({
btnId:"qq_login_btn" //插入按钮的节点id
}); 

</script>
	<div class="regbtn" style="color:#000;font-size:20px;">
    还没有注册阳光阿姨？<br />赶快注册吧！<br />
   <a href="member.php?c=reg"><input type="button" value="注册用户" class="sub" /></a>
   </div>
	<div class="cl"></div>
</div>
<div class="footer"><?php echo $cfg_copyright; ?></div>
</body>
</html>
