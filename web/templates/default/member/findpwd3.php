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
<title><?php echo $cfg_webname; ?> - 找回密码</title>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
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
</head>

<body>
<div class="login_top">
	<p>找回密码</p>
</div>

<div class="login_box">

	<?php
	if($a == 'quesfind')
	{
	?>
	<form method="post" action="?c=login" onsubmit="return CheckNewPwd();">
    	<div class="login">
    	<div class="login01"><p>设置密码：</p><div class="log_in01 fl">
       <input type="password" name="password" id="password"  /><span class="note">密码长度为6~16位字符，可以为“数字/字母/中划线/下划线”组成</span>
        </div></div>
        
        <div class="login01" style="margin-top:2px;">
            <p>确认密码：</p>
            <div class="log_in01"><input type="password" name="repassword" id="repassword"  /></div>
            
        </div>
        
   <input type="submit" value="完成" class="sub" />
     <input type="hidden" name="uname" value="<?php echo $uname; ?>">
		<input type="hidden" name="a" value="setnewpwd">
      
   
    </div>
  
    </form>
    <? }?>
</div>

 <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
