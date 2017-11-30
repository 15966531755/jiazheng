<?php if(!defined('IN_MEMBER')) exit('Request Error!');

//初始化参数检测正确性
$id  = empty($id) ? 0 : intval($id);
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
<title><?php echo $cfg_webname; ?> - 会员中心 - 订单详情</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="myorder_top">
	<p>订单详情</p>
</div>

<div class="order_detail">

<?php
		$row = $dosql->GetOne("SELECT * FROM `#@__yuyue` WHERE `username`='$c_uname' and `id`=$id");
		if(isset($row) && is_array($row))
		{
		?>
		<form name="form" id="form" method="post" action="goodsorder_save.php" onsubmit="return cfm_goodsorder();">
        
        
	<div class="order_box">
	<div class="orde_dl">
    	<dl class="orde_dl01">
        <dd><span>阿姨编号</span></dd>
        <dd><span>阿姨名字</span></dd>
    
        <dd><span>价格</span></dd>
        </dl>
        
        	<?php
					
							//初始化参数
							$totalprice = '';
							//$shoppingcart = unserialize($row['attrstr']);
					
							//显示订单列表
						//	foreach($shoppingcart as $k=>$goods)
//							{
								//获取数据库中服务信息
								$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE `id`=".$row['goods_id']." AND delstate=''");
								if(isset($r) && is_array($r))
								{
										$totalprice = $r['xinchou'];
							?>
                            
        <dl class="orde_dl02">
        <dd><span><?php echo $r['bianhao']; ?></span></dd>
        <dd><span><a href="goodsshow.php?cid=<? echo $r['classid'];?>&tid=<? echo $r['typeid'];?>&id=<? echo $r['id'];?>"><? echo $r['title'];?></a></span></dd>
      
        <dd><span>
		
		<?php echo $r['xinchou']; ?>
        
        </span></dd>
        </dl>
        <?php
								}
								else
								{
									echo '<tr><td>&nbsp;</td><td height="30" colspan="3">订单中的此服务已不存在！</td></tr>';
								}
							}
							?>
    </div>
    <div class="orde_ul">
    	<ul class="orde_ul01 fl">
        <li>订单状态：</li>
        <li>订单操作：</li>
        <li>支付方式：</li>
        <li>订单金额：</li>
        <li>订单时间：</li>
        </ul>
        <ul class="orde_ul02 fl">
        <li>	<?php

					$checkinfo = explode(',',$row['checkinfo']);
					
					if($row['paymode'] == 1)
					{
						if(!in_array('applyreturn',  $checkinfo) &&
						   !in_array('agreedreturn',  $checkinfo) &&
						   !in_array('goodsback',   $checkinfo) &&
						   !in_array('moneyback', $checkinfo) &&
						   !in_array('overorder',    $checkinfo))
						{
							if($row['checkinfo'] == '' or
							   !in_array('confirm', $checkinfo))
								echo '等待商家确认订单';
			
							else if(!in_array('payment', $checkinfo))
								echo '已确认，等待付款';
			
							else if(!in_array('postgoods', $checkinfo))
								echo '已付款，等待发货';
			
							else if(!in_array('getgoods', $checkinfo))
								echo '已发货，等待收货';
			
							else if(!in_array('overorder', $checkinfo))
								echo '已收货，等待订单归档';
			
							else
								echo '参数错误，没有获取到订单状态';
						}
						else
						{
							if(in_array('overorder', $checkinfo))
								echo '订单已归档';
							
							else if(in_array('moneyback', $checkinfo))
								echo '已退款，等待归档';
			
							else if(in_array('goodsback', $checkinfo))
								echo '已收到返货，等待退款';
			
							else if(in_array('agreedreturn', $checkinfo))
								echo '同意退货，等待收返货';
			
							else if(in_array('applyreturn', $checkinfo))
								echo '申请退货，等待退货';
			
							else
								echo '参数错误，没有获取到订单状态';
						}
					}
					else if($row['paymode'] == 2)
					{
						if(!in_array('applyreturn',  $checkinfo) &&
						   !in_array('agreedreturn',  $checkinfo) &&
						   !in_array('goodsback',   $checkinfo) &&
						   !in_array('moneyback', $checkinfo) &&
						   !in_array('overorder',    $checkinfo))
						{
							if($row['checkinfo'] == '' or
							   !in_array('confirm', $checkinfo))
								echo '等待商家确认订单';
			
							else if(!in_array('postgoods', $checkinfo))
								echo '已付款，等待发货';
			
							else if(!in_array('getgoods', $checkinfo))
								echo '已发货，等待收货';
							
							else if(!in_array('payment', $checkinfo))
								echo '已收货，等待付款';
			
							else if(!in_array('overorder', $checkinfo))
								echo '已付款，等待订单归档';
			
							else
								echo '参数错误，没有获取到订单状态';
						}
						else
						{
							if(in_array('overorder', $checkinfo))
								echo '订单已归档';
							
							else if(in_array('moneyback', $checkinfo))
								echo '已退款，等待归档';
			
							else if(in_array('goodsback', $checkinfo))
								echo '已收到返货，等待退款';
			
							else if(in_array('agreedreturn', $checkinfo))
								echo '同意退货，等待收返货';
			
							else if(in_array('applyreturn', $checkinfo))
								echo '申请退货，等待退货';
			
							else
								echo '参数错误，没有获取到订单状态';
						}
					}
					?>
                    </li>
                    
        <li>	
		<?php

						if(in_array('confirm', $checkinfo) &&
						   !in_array('payment', $checkinfo) &&
						   !in_array('postgoods', $checkinfo) &&
						   !in_array('getgoods', $checkinfo) &&
						   !in_array('overorder', $checkinfo) &&
						   !in_array('moneyback', $checkinfo) &&
						   !in_array('goodsback', $checkinfo) &&
						   !in_array('agreedreturn', $checkinfo) &&
						   !in_array('applyreturn', $checkinfo))
							echo '<a href="orderpay.php?id='.$row['id'].'">付款</a>';

						else if(in_array('postgoods', $checkinfo) &&
						   !in_array('getgoods', $checkinfo))
							echo '<a href="?a=getgoods&id='.$row['id'].'">确认收货</a>';

						//else if(in_array('getgoods', $checkinfo) &&
//						        !in_array('applyreturn', $checkinfo))
//							echo '<a href="?a=applyreturn&id='.$row['id'].'">申请退货</a>';

						else
							echo '暂无操作';

						?>
                        </li>
        <li>
        	<?php
					$r = $dosql->GetOne("SELECT `classname` FROM `#@__paymode` WHERE `id`=".$row['paymode']);
					echo $r['classname'];
					?>
        </li>
        <li>
        <?php echo $totalprice; ?>元
        </li>
        <li>
        <?php echo $row['time']; ?>
        </li>
        </ul>
    </div>
      <div>
				<input type="button" class="btn" value="返 回" onclick="history.go(-1)" />
			</div>
    </div>
  
    </form>
</div>

 <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
