<?php 
if(!defined('IN_MEMBER')) exit('Request Error!'); 
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_webname; ?> - 经理人注册</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
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

</head>

<body>
<div class="header">
	<div class="area">
	<!--	<div class="logo"><a href="<?php echo $cfg_webpath; ?>/"></a></div>-->
		<div class="retxt"><a href="<?php echo $cfg_webpath; ?>/">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?c=login">登陆</a></div>
	</div>
</div>


<div class="mainbody">
	<div class="top">
   <h2>经理人注册账户</h2>
		<div class="txt">欢迎您注册<?php echo $cfg_webname; ?>会员，如果您已拥有账户，则可在此 <a href="admin">登录</a></div>
	</div>
	<form id="form" method="post" action="?a=manager" onsubmit="return CheckReg();">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="80" height="50">手机号：</td>
					<td><input type="text" name="username" id="username" class="input" />
					<span class="note">长度为11位手机号</span></td>
				</tr>
                <tr>
					<td height="50">手机验证码：</td>
					<td><input type="text" name="mobile_code" id="mobile_code" class="input" /> <input onClick="get_mobile_codes();" type="button" class="sub" value="获取手机验证码"/></td>
				</tr>
				<tr>
					<td height="50">设置密码：</td>
					<td><input type="password" name="password" id="password" class="input" />
						<span class="note">长度为6~16位字符，可以为“数字/字母/中划线/下划线”组成</span></td>
				</tr>
				<tr>
					<td height="50">确认密码：</td>
					<td><input type="password" name="repassword" id="repassword" class="input" /></td>
				</tr>
                
                	
                
                <tr>
					<td height="50">真实姓名：</td>
					<td><input type="text" name="t_name" id="t_name" class="input" /></td>
				</tr>
                
                <tr>
					<td height="50">身份证号：</td>
					<td><input type="text" name="card" id="card" class="input" /></td>
				</tr>
                
                
                <tr>
					<td height="50">所在地：</td>
					<td>
                      <?php 
	$dosql->Execute("select * from province");
	
	while($row = $dosql->GetArray()){
		$province[]=$row;
	}
?>
<script src='jquery.js'></script>
<style type="text/css">
.inputs{

height: 35px;
margin-right: 10px;

line-height: 30px;
border: 0;
background-image: url(templates/default/images/userlog_input_bg.png);
font-size: 14px;
font-family: Verdana;}

</style>
<script>
	$(document).ready(function(){
		$("#province").change(function(){
			var provinceid=$(this).val();
			$("#citySpan").load("index_cityss.php?provinceid="+provinceid);
			$("#areaSpan").html("<select id=\"area\" class=\"inputs\" name=\"area\"><option value=\"0\">请选择区</option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_areass.php?cityid="+cityid);
	}
</script>

<select id="province" name="province" class="inputs">
<option value='0' >请选择省</option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
<span id="citySpan">
	<select id="city" name="city" class="inputs">
		<option value="0">请选择市</option>
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area" class="inputs">
		<option value="0">请选择区</option>
	</select>
</span>

                    
                    </td>
				</tr>
                
                
				
				<tr>
					<td height="50">验证码：</td>
					<td><input type="text" name="validate" id="validate" class="input" maxlength="4" />
						<span><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></span><br /></td>
				</tr>
                <tr>
					<td height="20"> </td>
					<td>
                    <label> 
<input type="checkbox" id="checkbox"  checked="checked" value="1"> 我已同意
<a href="contact-53-1.html"><<阳光阿姨经理人使用协议>> </a>
</label> 
                    </td>
                    
				</tr>
				<tr>
					<td height="70"> </td>
					<td><input type="submit" value="立即注册" class="sub" /><a style="margin-left:60px;" href="?c=reg"><input type="button" value="客户注册" class="sub" /></a></td>
                    
                  
				</tr>
			</tbody>
		</table>
	</form>
	<div class="cl"></div>
</div>



<div class="footer"><?php echo $cfg_copyright; ?></div>
</body>
</html>
