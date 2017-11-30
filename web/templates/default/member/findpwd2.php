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
<form method="post" action="?c=findpwd3" onsubmit="return CheckFindQues();">
	<div class="login">
    	<div class="login01"><p>安全问题：</p><div class="log_in01 fl">
        <select name="question" id="question" style="width: 120%;font-family: '微软雅黑';font-size: 14px;margin: 0px;padding: 0px;border: none;background: none;outline: none;color: #666;">
						<option value="-1">选择问题</option>
						<?php
						$dosql->Execute("SELECT * FROM `#@__cascadedata` WHERE `datagroup`='question' ORDER BY orderid ASC, datavalue ASC");
						while($row = $dosql->GetArray())
						{
							echo '<option value="'.$row['datavalue'].'">'.$row['dataname'].'</option>';
						}
						?>
					</select>
        </div></div>
        
        <div class="login03">
            <p>问题答案：</p>
            <div class="log_in03 fl"><input type="text" name="answer" id="answer"  /></div>
            
        </div>
        
      <input type="submit" value="找回密码" class="sub" />
      <input type="hidden" name="uname" value="<?php echo $username; ?>">
	<input type="hidden" name="a" value="quesfind">
      
   
    </div>
  
    </form>
</div>

 <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
