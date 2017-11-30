<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<link rel="stylesheet"  href="templates/default/style/css.css" type="text/css">
<title><?php echo $cfg_webname; ?> - 会员登陆</title>
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/member.js"></script>
<style>
.sub{ border:none; font-family:"微软雅黑";
color:#FFF;
font-size: 16px;
background: #26A035;

text-align: center;
cursor: pointer;

height: 36px;
line-height: 36px;
border-radius: 18px;
margin-top: 20px;
margin: 20px auto;
width: 100%;
}
.subon{ border:none; font-family:"微软雅黑";
color:#FFF;
font-size: 16px;
background: #26A035;

text-align: center;
cursor: pointer;
height: 36px;
line-height: 36px;
border-radius: 18px;
margin-top: 20px;
margin: 20px auto;
width: 100%;
}

.subdown{ border:none; font-family:"微软雅黑";
color:#FFF;
font-size: 16px;
background: #26A035;

text-align: center;
cursor: pointer;
height: 36px;
line-height: 36px;
border-radius: 18px;
margin-top: 20px;
margin: 20px auto;
width: 100%;
}


</style>


<!--<script type="text/javascript" 
src="http://qzonestyle.gtimg.cn/qzone/openapi/qc.js#appId=101216639"
charset="UTF-8">
</script>-->


</head>

<body>
<div class="login_top">
	<p>会员登录</p>
</div>
	<form id="form" name="form" method="post" action="?a=login" onSubmit="return CheckLog();">
   
     
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
<div class="login_box">
	<div class="login">
    	<div class="login01"><p>用户名：</p><div class="log_in01 fl"><input type="text" name="username" id="username" value=""></div></div>
        <div class="login02"><p>密码：</p><div class="log_in02 fl"><input type="text" name="password" id="password" value=""></div></div>
        <div class="login03">
            <p>验证码：</p>
            <div class="log_in03 fl"><input type="text" name="validate" id="validate"></div>
            <div class="log_in03_img"><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></span><br /></div>
        </div>
        <div class="login04"><input type="checkbox" title="两周内自动登录" name="autologin" id="autologin" value="1" />&nbsp;&nbsp;<label for="autologin" title="为了您的信息安全，请不要在网吧或公用电脑上使用此功能！"> 两周内自动登录</label></div>
       <input type="submit" value="立即登陆" class="sub" />
        <div class="login06">
        	<p><a href="data/api/oauth/connect.php?method=qq_token">QQ登录</a> </p>
        <!--    <p style="background: url(/images/2.jpg) no-repeat 0 0;"> <a href="data/api/oauth/connect.php?method=weixin_token" class="owx">微信登陆</a></p>-->
            <a href="?c=findpwd">忘记密码？</a>
        </div>
        <div class="login07">还没有注册阳光阿姨？赶紧<a href="member.php?c=reg">注册</a>吧！</div>
    </div>
</div>
	</form>
    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
