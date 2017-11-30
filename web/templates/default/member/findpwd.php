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
<form id="form" method="post" action="?c=findpwd2" onsubmit="return CheckFind();">
	<div class="login">
    	<div class="login01"><p>用户名：</p><div class="log_in01 fl"><input type="text" name="username" id="username"></div></div>
        
        <div class="login03">
            <p>验证码：</p>
            <div class="log_in03 fl"><input type="text" name="validate" id="validate"></div>
            <div class="log_in03_img"><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></div>
        </div>
        
       <input type="submit" value="下一步" class="sub" />
      
   
    </div>
    <input type="hidden" name="a" value="findpwd2" />
    </form>
</div>

 <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
