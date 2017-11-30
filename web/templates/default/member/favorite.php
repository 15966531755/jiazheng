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
<title><?php echo $cfg_webname; ?> - 会员中心 - 我的收藏</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="store_top">
	<p>我的收藏</p>
</div>
<div class="store_list">
	<div class="store_li">
    	<?php
	
		$dopage->GetPage("SELECT * FROM `#@__userfavorite` WHERE uname='$c_uname' and molds=4 ORDER BY id DESC",6);
		if($dosql->GetTotalRow() > 0)
		{
		?>
		<form name="form" id="form" method="post">
    	<ul>
        	<?php
			while($row = $dosql->GetArray())
			{
				if($row['molds'] == 1)
					$tbname = 'infolist';
				else if($row['molds'] == 2)
					$tbname = 'infoimg';
				else if($row['molds'] == 3)
					$tbname = 'soft';
				else if($row['molds'] == 4)
					$tbname = 'goods';
				else
					$tbname = '';

				$r = $dosql->GetOne("SELECT * FROM `#@__$tbname` WHERE id=".$row['aid']." AND delstate=''");
				if(isset($r) && is_array($r))
				{
			?>
            
            <li><h3><input type="checkbox" name="checkid[]" id="checkid[]" value="<?php echo $row['id']; ?>" />&nbsp;&nbsp;<a href="<?php echo $row['link']; ?>"><?php echo $r['title']; ?></a></h3><span><?php echo GetDateTime($row['time']); ?></span><p><a href="javascript:DelAllNone('?a=delfavorite');" onclick="return ConfDelAll(0);">删除</a></p></li>
			
			<?php
				}
				else
				{
					echo '<li><input type="checkbox" name="checkid[]" id="checkid[]" value="'.$row['id'].'" />&nbsp;&nbsp;此条收藏的信息已不存在！(ID:'.$row['id'].')</li>';
				}
			}
			
			?>
            
            
         
            
        </ul>
        </form>
        
        	<div class="options_b">选择： <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> - <a href="javascript:DelAllNone('?a=delfavorite');" onclick="return ConfDelAll(0);">删除</a></div>
	
    <? echo $dopage->GetList_web();?>
    <div style="margin-bottom:10px;"></div>
		<?php
		}
		else
		{
		?>
		<div class="nonelist">您还没有收藏哦！</div>
		<?php
		}
		?>
    </div>
</div>

   <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
