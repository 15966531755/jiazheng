<?php if(!defined('IN_MEMBER')) exit('Request Error!'); 
//获取用户信息
$r_user = $dosql->GetOne("SELECT * FROM `#@__member` WHERE username='$c_uname'");

//当记录出现错误，强制跳转登陆页
if(!isset($r_user) or !is_array($r_user))
	header('location:?c=login');

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
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="mem_top"><img src="web_images/mem01.png" width="100%">
	<div class="mem_pic_box">
    <div class="mem_pic">
    <img src="/<? echo $r_user['thumb'];?>">
    
    </div>
  
    <div style="width:100%; height:30px;"><a href="<?php echo $cfg_webpath; ?>/web/">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?a=logout">退出</a></div>
    
    </div>
    <div class="mem_pos"><a href="member.php?c=edit"><img src="web_images/mem02.png" width="35" height="35"></a></div>
    <div class="mem_id">
    <div class="usertxt">
		<?php
		if($r_user['enteruser'] == 1)
			echo '<span class="userenter" title="认证用户">'.$c_uname.'</span>';
		else
			echo '<span class="username">'.$c_uname.'</span>';
		?>
		<span class="usergroup">
		<?php
		$usergroup = '';
		$dosql->Execute("SELECT * FROM `#@__usergroup`");
		while($row = $dosql->GetArray())
		{
			if($r_user['expval'] >= $row['expvala'] and
			   $r_user['expval'] <= $row['expvalb'])
			{
				$usergroup = '<span style="color:'.$row['color'].'">'.$row['groupname'].'</span>';
			}
		}
		if($usergroup == '')
		{
			//系统不允许使用子查询
			$r = $dosql->GetOne("SELECT MAX(expvalb) as expvalb FROM `#@__usergroup`");
			
			if($r_user['expval'] > $r['expvalb'])
			{
				$r2 = $dosql->GetOne("SELECT `groupname` FROM `#@__usergroup` WHERE expvalb=".$r['expvalb']);
				$usergroup = '<span style="color:'.$row['color'].'">'.$r2['groupname'].'</span>';
			}
			else
			{
				$usergroup = '参数获取失败';
			}
		}
		
		echo $usergroup
		?>
		</span>
		<?php
		if($r_user['qqid'] != '')
			echo '<span title="QQ账号绑定" class="oqqico"></span>';
		if($r_user['weiboid'] != '')
			echo '<span title="微博账号绑定" class="oweiboico"></span>';
		?>
		
	</div>
    </div>
</div>

<div class="mem_con">
	<div class="mem_single_box"><a href="member.php?c=default"><div class="mem_single">个人中心</div></a></div>
    <div class="mem_coll_box"><div class="mem_coll"><span>
    	<?php
		$dosql->Execute("SELECT * FROM `#@__userfavorite` WHERE uname='$c_uname' and molds=4 ");
		if($dosql->GetTotalRow() > 0)
		{
		?>
        <? echo $dosql->GetTotalRow();?>
        <?
		}else
		{
		?>
		您还没有收藏哦！
		<?php
		}
		?>
  
    
    </span><a href="?c=favorite">我的收藏</a></div></div>
    <div class="mem_order_box"><div class="mem_order"><span>
    <?php
		$dosql->Execute("SELECT * FROM `#@__yuyue` WHERE `username`='$c_uname' ORDER BY id DESC");
		if($dosql->GetTotalRow() > 0)
		{
		?>
        <? echo $dosql->GetTotalRow();?>
        <? }else{?> 
    您还没有订单奥！
    <? }?>
    </span><a href="?c=order">我的订单</a></div></div>
    <div class="mem_req_box"><div class="mem_req"><!--<span>您还没有发布奥！</span>--><a href="xu_add.php">我要找阿姨</a> &nbsp; <a href="gong_add.php">阿姨找工作</a></div></div>
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
