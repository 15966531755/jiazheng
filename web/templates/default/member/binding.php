<?php if(!defined('IN_MEMBER')) exit('Request Error!'); 
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
<title><?php echo $cfg_webname; ?> - 会员中心</title>
<link href="templates/default/style/member.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="mem_top"><img src="web_images/mem01.png" width="100%">
	<div class="mem_pic_box">
    <div class="mem_pic">
   <img src="<?php echo $cfg_webpath; ?>/data/avatar/index.php?uid=0&size=middle" />
    
    </div>
  
    <div style="width:100%; height:30px;"><a href="<?php echo $cfg_webpath; ?>/web/">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?a=logout">退出</a></div>
    
    </div>
    <div class="mem_pos"><a href="member.php?c=edit"><img src="web_images/mem02.png" width="35" height="35"></a></div>
    <div class="mem_id">
    <div class="usertxt">
	<?php
			if(check_app_login('qq'))
				echo '<span class="ounameqq">'.$_SESSION['app']['qq']['name'].'</span>';
			else if(check_app_login('weibo'))
				echo '<span class="ounameweibo">'.$_SESSION['app']['weibo']['name'].'</span>';
				
			?>
	
		
	</div>
    </div>
</div>
<div class="mainbody">

<div class="mem_con">
	<h3 class="dftitle">绑定账号</h3>
		<form name="form" id="form" method="post" action="?a=binding" onsubmit="return cfm_binding();">
			<div class="set01">
            <p>账　号：</p>
            <div class="set_in1">
					<input name="username" type="text" id="username"  />
			</div>
            </div>
					<div class="set01">
                    <p>密　码：</p>
					 <div class="set_in1"><input name="password" type="password" id="password"  /></div>
				</div>

		
				<input type="submit" class="btn" value="保 存" />
				<input type="button" class="btn" value="取 消" onclick="history.go(-1)"  />
		
		</form>

</div>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
