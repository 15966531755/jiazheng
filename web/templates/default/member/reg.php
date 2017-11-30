<? 
   @session_start();
function random($length = 6 , $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}
$_SESSION['send_code'] = random(6,1);
?>


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
<title><?php echo $cfg_webname; ?> - 会员注册</title>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>jqueryss.js"></script>
<script language="javascript">
	function get_mobile_code(){
        $.post('sms.php', {mobile:jQuery.trim($('#username').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
            alert(jQuery.trim(unescape(msg)));
			if(msg=='发送成功'){
				RemainTime();
			}
        });
	};
	var iTime = 59;
	var Account;
	function RemainTime(){
		document.getElementById('zphone').disabled = true;
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='获取手机验证码';
				iTime = 59;
				document.getElementById('zphone').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('zphone').value = sTime;
	}	
	
	
	
	
</script>

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
<div class="register_top">
	<p>会员注册</p>
</div>


	<form id="form" name="form" method="post" action="?a=reg" onsubmit="return CheckReg();">
<div class="register_box">
	<div class="register">
    	<div class="register01"><p>手机号：</p><div class="register_in01 fl"><input type="text" id="username" name="username" value=""></div><a  style="cursor:pointer;" onClick="get_mobile_codes();">获取验证码</a></div>
        <div class="register02"><p>手机验证码：</p><div class="register_in02 fl"><input type="text" id="mobile_code" name="mobile_code" value=""></div></div>
        <div class="register03"><p>密码：</p><div class="register_in03 fl"><input  type="password" name="password" id="password"></div></div>
        <div class="register03"><p>确认密码：</p><div class="register_in03 fl"><input  type="password" name="repassword" id="repassword"></div></div>
        <div class="login03">
            <p>验证码：</p>
            <div class="log_in03 fl"><input type="text"></div>
            <div class="log_in03_img"><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></span></div>
        </div>
        <div class="login04">

 <label> 
        <input type="checkbox" id="checkbox" name="checkbox" checked="checked"  value="1">&nbsp;&nbsp;我已同意<a href="contact.php?cid=52">《阳光阿姨客户使用协议》</a>
        </label>
        </div>
       <input type="submit" value="立即注册" class="sub" />
      <a href="?c=manager"><input type="button" value="经理人注册" class="sub" /></a>
       
    </div>
</div>

</form>
    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
