<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_webname; ?> - 会员中心 - 我的订单</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="header">
	<?php require_once(dirname(__FILE__).'/header.php'); ?>
</div>
<div class="mainbody">
	<div class="leftarea">
		<?php require_once(dirname(__FILE__).'/lefter.php'); ?>
	</div>
	<div class="rightarea">
		<h3 class="subtitle">我的订单</h3>
		<?php
		$dopage->GetPage("SELECT * FROM `#@__yuyue` WHERE `username`='$c_uname' ORDER BY id DESC",10);
		if($dosql->GetTotalRow() > 0)
		{
		?>
		<form name="form" id="form" method="post">
		<ul class="msglist">
			<?php
			while($row = $dosql->GetArray())
			{
				$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE `id`=".$row['goods_id']." AND delstate=''");
				$rr = $dosql->GetOne("SELECT * FROM `#@__goodstype` WHERE `id`=".$r['typeid']." ");
				
				//if($cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'];
//					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$r['classid'].'-'.$r['typeid'].'-'.$r['id'].'-1.html';

			?>
			<li>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="orderlist">
					<tr class="thead" align="center">
						<td width="5%" height="30" align="left"><input type="checkbox" name="checkid[]" id="checkid[]" value="<?php echo $row['id']; ?>" /></td>
						<td width="5%" align="left">编号</td>
						<td width="10%" align="left">服务名称</td>
						<td width="10%">阿姨编号</td>
						<td width="10%">服务时间</td>
						<td width="8%" align="right">操作</td>
					</tr>
				
					<tr align="center">
						<td height="30" align="center"></td>
						<td align="left"><?php echo $row['id']; ?></td>
						<td align="left">
						<?php echo $rr['classname']; ?>
						</td>
						<td align="center"><?php echo $row['bianhao']; ?></td>
						<td align="center"><?php echo $row['date']; ?></td>
                        
						<td align="right" class="action"><a href="?c=ordershow&id=<?php echo $row['id']; ?>">详情</a></td>
					</tr>
					
					
			</table>
			</li>
			<?php
			}
			?>
		</ul>
		</form>
		<div class="options_b">选择： <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> - <a href="javascript:DelAllNone('?a=delorder');" onclick="return ConfDelAll(0);">删除</a></div>
		<?php echo $dopage->GetList(); ?>
		<?php
		}
		else
		{
		?>
		<div class="nonelist">您还没有订单哦！</div>
		<?php
		}
		?>
	</div>
	<div class="cl"></div>
</div>
<div class="footer"><?php echo $cfg_copyright; ?></div>
</body>
</html>
