<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑订单</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/checkf.func.js"></script>
<script type="text/javascript" src="templates/js/getarea.js"></script>
</head>
<body>
<?php
$row = $dosql->GetOne("SELECT * FROM `#@__yuyue` WHERE `id`=$id");
?>
<div class="formHeader"> <span class="title">编辑订单</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="goodsorder_save.php" onsubmit="return cfm_goodsorder();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
		<tr>
			<td width="25%" height="40" align="right">会员用户名：</td>
			<td width="75%"><strong class="maroon2"><?php echo $row['username']; ?></strong><span class="cnote">带<span class="maroon">*</span>号表示为必填项</span></td>
		</tr>
		<tr>
			<td height="120" align="right">服务列表：</td>
			<td><div class="orderList">
					<table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
						<tr class="head">
							<td width="40" height="25">ID</td>
							<td>阿姨名称</td>
						
							<td width="80">价格</td>
							<td width="80">阿姨编号</td>
						</tr>
						<?php

						//初始化参数
						$totalprice = '';
					//	$shoppingcart = unserialize($row['attrstr']);
//				
//						//显示订单列表
//						foreach($shoppingcart as $k=>$goods)
//						{
						?>
						<tr class="listItem nb">
							<td height="30"><?php echo $row['goods_id']; ?></td>
							<td><?php
				
							//获取数据库中服务信息
							$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE `id`=".$row['goods_id']);
				
							//计算订单总价
							$totalprice += $r['xinchou'];
				
							//输出服务名称
							echo '<a href="../goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'].'" target="_blank">'.$r['title'].'</a>'; 
				
							//输出选中属性
							//foreach($goods[2] as $v)
//							{
//								echo '<span class="attrStr">'.$v.'</span>';
//							}
							?></td>
						
							<td><?php echo $r['xinchou']; ?></td>
							<td><?php echo $r['bianhao']; ?></td>
						</tr>
						<?php
						//}
						?>
					</table>
				</div></td>
		</tr>
		<tr>
			<td height="40" align="right">订单状态：</td>
			<td class="blue"><?php

			$checkinfo = explode(',',$row['checkinfo']);
			
			if($row['paymode'] == 1)
			{
				if(!in_array('applyreturn',  $checkinfo) &&
				   !in_array('agreedreturn', $checkinfo) &&
				   !in_array('goodsback',    $checkinfo) &&
				   !in_array('moneyback',    $checkinfo) &&
				   !in_array('overorder',    $checkinfo))
				{
					if($row['checkinfo'] == '' or
					   !in_array('confirm',        $checkinfo))
						echo '等待确认';
	
					else if(!in_array('payment',   $checkinfo))
						echo '等待付款';
	
					else if(!in_array('postgoods', $checkinfo))
						echo '等待发货';
	
					else if(!in_array('getgoods',  $checkinfo))
						echo '等待收货';
	
					else if(!in_array('overorder', $checkinfo))
						echo '等待归档';
	
					else
						echo '参数错误，没有获取到订单状态';
				}
				else
				{
					if(in_array('overorder',         $checkinfo))
						echo '已归档';
					
					else if(in_array('moneyback',    $checkinfo))
						echo '等待归档';
	
					else if(in_array('goodsback',    $checkinfo))
						echo '等待退款';
	
					else if(in_array('agreedreturn', $checkinfo))
						echo '等待返货';
	
					else if(in_array('applyreturn',  $checkinfo))
						echo '申请退货';
	
					else
						echo '参数错误，没有获取到订单状态';
				}
			}

			else if($row['paymode'] == 2)
			{
				if(!in_array('applyreturn',  $checkinfo) &&
				   !in_array('agreedreturn', $checkinfo) &&
				   !in_array('goodsback',    $checkinfo) &&
				   !in_array('moneyback',    $checkinfo) &&
				   !in_array('overorder',    $checkinfo))
				{
					if($row['checkinfo'] == '' or
					   !in_array('confirm', $checkinfo))
						echo '等待确认';

					else if(!in_array('postgoods', $checkinfo))
						echo '等待发货';
	
					else if(!in_array('getgoods',  $checkinfo))
						echo '等待收货';
					
					else if(!in_array('payment',   $checkinfo))
						echo '等待付款';
	
					else if(!in_array('overorder', $checkinfo))
						echo '等待归档';
	
					else
						echo '参数错误，没有获取到订单状态';
				}
				else
				{
					if(in_array('overorder',         $checkinfo))
						echo '已归档';
					
					else if(in_array('moneyback',    $checkinfo))
						echo '等待归档';
	
					else if(in_array('goodsback',    $checkinfo))
						echo '等待退款';
	
					else if(in_array('agreedreturn', $checkinfo))
						echo '等待返货';
	
					else if(in_array('applyreturn', $checkinfo))
						echo '申请退货';
	
					else
						echo '参数错误，没有获取到订单状态';
				}
			}
			?></td>
		</tr>
		<tr class="nb">
			<td height="80" align="right">订单操作：</td>
			<td style="line-height:22px;"><?php $checkinfo = explode(',',$row['checkinfo']); ?>
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="confirm" <?php if(in_array('confirm', $checkinfo)) echo 'checked="checked"'; ?> />
				确认订单&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="payment" <?php if(in_array('payment', $checkinfo)) echo 'checked="checked"'; ?> />
				确认付款&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="postgoods" <?php if(in_array('postgoods', $checkinfo)) echo 'checked="checked"'; ?> />
				服务发货&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="getgoods" <?php if(in_array('getgoods', $checkinfo)) echo 'checked="checked"'; ?> />
				已收货 <br />
				<!--<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="applyreturn" <?php if(in_array('applyreturn', $checkinfo)) echo 'checked="checked"'; ?> />
				申请退货&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="agreedreturn" <?php if(in_array('agreedreturn', $checkinfo)) echo 'checked="checked"'; ?> />
				同意退货&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="goodsback" <?php if(in_array('goodsback', $checkinfo)) echo 'checked="checked"'; ?> />
				收到返货&nbsp;
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="moneyback" <?php if(in_array('moneyback', $checkinfo)) echo 'checked="checked"'; ?> />
				已退款 <br />-->
				<input name="checkinfo[]" type="checkbox" id="checkinfo[]" value="overorder" <?php if(in_array('overorder', $checkinfo)) echo 'checked="checked"'; ?> />
				已归档 <span class="maroon">*</span></td>
		</tr>
		
		<tr>
			<td height="40" align="right">订单时间：</td>
			<td><input name="posttime" type="text" id="posttime" class="inputms" value="<?php echo $row['time']; ?>" readonly="readonly" />
				<script type="text/javascript" src="plugin/calendar/calendar.js"></script> 
				<script type="text/javascript">
				Calendar.setup({
					inputField     :    "posttime",
					ifFormat       :    "%Y-%m-%d %H:%M:%S",
					showsTime      :    true,
					timeFormat     :    "24"
				});
				</script></td>
		</tr>
		
	</table>
	<div class="formSubBtn">
		<input type="submit" class="submit" value="提交" />
		<input type="button" class="back" value="返回" onclick="history.go(-1);" />
		<input type="hidden" name="action" id="action" value="update" />
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
	</div>
</form>
</body>
</html>