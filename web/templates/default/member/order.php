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

<title><?php echo $cfg_webname; ?> - 会员中心 - 我的订单</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="myorder_top">
	<p>我的订单</p>
</div>
<div class="myorder_list">
	<div class="my_order_li">
    	<dl>
        	<dd style="width:15%;">编号</dd><dd style="width:25%;">服务名称</dd><dd style="width:25%;">阿姨编号</dd><dd style="width:35%;">服务时间</dd>
        </dl>
      
      <?php
		$dopage->GetPage("SELECT * FROM `#@__yuyue` WHERE `username`='$c_uname' ORDER BY id DESC",6);
		if($dosql->GetTotalRow() > 0)
		{
		?>
        <form name="form" id="form" method="post">
        <?php
			while($row = $dosql->GetArray())
			{
				$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE `id`=".$row['goods_id']." AND delstate=''");
				$rr = $dosql->GetOne("SELECT * FROM `#@__goodstype` WHERE `id`=".$r['typeid']." ");
				
				//if($cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'];
//					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$r['classid'].'-'.$r['typeid'].'-'.$r['id'].'-1.html';

			?>
        
         <div class="m_li">
        	<div class="mli_t">
        	<ul>
            	<li style="width:8%;"><input type="checkbox" name="checkid[]" id="checkid[]" value="<?php echo $row['id']; ?>" /></li><li style="width:13%;">62</li><li style="width:23%;"><?php echo $rr['classname']; ?></li><li style="width:23%;"><?php echo $row['bianhao']; ?></li><li style="width:33%;"><?php echo $row['date']; ?></li>
            </ul>
            </div>
            <div class="mli_b"><p><a href="javascript:DelAllNone('?a=delorder');" onclick="return ConfDelAll(0);">删除</a></p><span><a href="?c=ordershow&id=<?php echo $row['id']; ?>">查看详情</a></span></div>
        </div>
        	<?php
			}
			?>
   
        </form>
		<div class="options_b">选择： <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> - <a href="javascript:DelAllNone('?a=delorder');" onclick="return ConfDelAll(0);">删除</a></div>
	 <? echo $dopage->GetList_web();?>
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
</div>

   <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->

</body>
</html>
