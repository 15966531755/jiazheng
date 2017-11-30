<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodsorder'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找工作管理</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/forms.func.js"></script>
</head>
<body>
<div class="topToolbar"> <span class="title">找工作管理</span> <a href="javascript:location.reload();" class="reload">刷新</a></div>
<div class="toolbarTab">
	<ul>

	</ul>
	<div class="search">
		<form name="forms" id="forms" method="get" action="">
			<span class="s">
			<input name="keyword" id="keyword" type="text" title="输入用户名进行搜索" value="" />
			</span> <span class="b"><a href="javascript:;" onclick="forms.submit();"></a></span>
		</form>
	</div>
</div>
<form name="form" id="form" method="post" action="">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
		<tr align="left" class="head">
			<td width="5%" height="36" class="firstCol"><input type="checkbox" name="checkid" id="checkid" onclick="CheckAll(this.checked);"></td>
			<td width="5%">ID</td>
			<td width="10%">工种</td>
		
			<td width="10%">所在地区</td>
			<td width="6%">联系电话</td>
            <td width="8%">姓名</td>
         
			<td width="12%" class="endCol">操作</td>
		</tr>
		<?php
		$sql = "SELECT * FROM `#@__zgz` ";	
	
		


		$dopage->GetPage($sql);
		while($row = $dosql->GetArray())
		{	
		if($row['city']){
		$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE `cityid`=".$row['city']);
		}
		if($row['area']){
$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE `areaid`=".$row['area']);	
		}
		?>
		<tr align="left" class="dataTr">
			<td height="36" class="firstCol"><input type="checkbox" name="checkid[]" id="checkid[]" value="<?php echo $row['id']; ?>" /></td>
            <td><? echo $row['id'];?>
          
            </td>
			<td><? echo $row['gz'];?></td>
          
            <td><? if($row['city']){ echo $row_c['city'];}?><? if($row['area']){ echo $row_a['area'];}?></td>
            <td><? echo $row['mobile'];?></td>
            <td><? echo $row['name'];?></td>
       
            
			<td class="action endCol"> <span class="nb"><a href="goodszgz_save.php?action=del2&id=<?php echo $row['id']; ?>" onclick="return ConfDel(0)">删除</a></span></td>
		</tr>
		<?php
		}	
	?>
	</table>
</form>
<?php

//判断无记录样式
if($dosql->GetTotalRow() == 0)
{
	echo '<div class="dataEmpty">暂时没有相关的记录</div>';
}
?>
<div class="bottomToolbar"> <span class="selArea"><span>选择：</span> <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> - <a href="javascript:DelAllNone('goodszgz_save.php');" onclick="return ConfDelAll(0);">删除</a></span> </div>
<div class="page"> <?php echo $dopage->GetList(); ?> </div>
<?php

//判断是否启用快捷工具栏
if($cfg_quicktool == 'Y')
{
?>
<div class="quickToolbar">
	<div class="qiuckWarp">
		<div class="quickArea"> <span class="selArea"><span>选择：</span> <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> - <a href="javascript:DelAllNone('goodszgz_save.php');" onclick="return ConfDelAll(0);">删除</a></span> <span class="pageSmall">
			<div class="pageText"><?php echo $dopage->GetList(); ?></div>
			</span></div>
		<div class="quickAreaBg"></div>
	</div>
</div>
<?php
}
?>
</body>
</html>