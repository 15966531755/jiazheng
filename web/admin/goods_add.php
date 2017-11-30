<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goods'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加服务信息</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/getuploadify.js"></script>
<script type="text/javascript" src="templates/js/checkf.func.js"></script>
<script type="text/javascript" src="templates/js/getjcrop.js"></script>
<script type="text/javascript" src="templates/js/getinfosrc.js"></script>
<script type="text/javascript" src="plugin/colorpicker/colorpicker.js"></script>
<script type="text/javascript" src="plugin/calendar/calendar.js"></script>
<script type="text/javascript" src="editor/kindeditor-min.js"></script>
<script type="text/javascript" src="editor/lang/zh_CN.js"></script>
<script type="text/javascript">
function GetAttr(tid)
{
	$.ajax({
		url : "ajax_do.php?action=goodsattr&tid="+tid,
		type:'get',
		dataType:'html',
		beforeSend:function(){
			$("#getattr").html('<div class="loading" style="width:140px;margin:0 auto;">自定义属性读取中...</div>');
		},
		success:function(data){
			$('#getattr').html(data);
		}
	});
}
</script>
</head>
<body>
<div class="formHeader"> <span class="title">添加服务信息</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="goods_save.php" onsubmit="return cfm_goods();">
	<input type="hidden" name="username" id="username" value="<? echo $_SESSION['admin'];?>"/>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
		<tr>
			<td width="25%" height="40" align="right">栏　目：</td>
			<td width="75%"><select name="classid" id="classid">
					<option value="-1">请选择所属栏目</option>
					<?php CategoryType(4); ?>
				</select>
				<span class="maroon">*</span><span class="cnote">带<span class="maroon">*</span>号表示为必填项</span></td>
		</tr>
        
        <tr>
			<td height="40" align="right">服务分类：</td>
			<td><select name="typeid" id="typeid" onchange="GetAttr(this.value)">
					<option value="-1">请选择所属分类</option>
					<?php GetAllType('#@__goodstype','#@__goods','typeid'); ?>
				</select></td>
		</tr>
        
		<tr>
			<td height="40" align="right">其他服务分类：</td>
            
            <td class="attrArea"><?php
			$dosql->Execute("SELECT * FROM `#@__goodstype` ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="type[]" id="type[]" value="'.$row['id'].'" />'.$row['classname'].'</span>';
			}
			?></td>
            
           
            
            
            
			
		</tr>
		<tr>
			<td height="40" align="right">服务范围：</td>
			<td>
            
            
            <?php 
	$dosql->Execute("select * from province");
	
	while($row = $dosql->GetArray()){
		$province[]=$row;
	}
?>
<script src='jquery.js'></script>
<script>
	$(document).ready(function(){
		$("#province").change(function(){
			var provinceid=$(this).val();
			$("#citySpan").load("index_city.php?provinceid="+provinceid);
			$("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\">请选则区</option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_area.php?cityid="+cityid);
	}
</script>

<select id="province" name="province">
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
	<select id="city" name="city">
		<option value="0">请选择市</option>
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area">
		<option value="0">请选择区</option>
	</select>
</span>

            </td>
		</tr>
		<tr>
			<td height="40" align="right">姓名：</td>
			<td><input type="text" name="title" id="title" class="input" />
				<span class="maroon">*</span>
				<div class="titlePanel">
					<input type="hidden" name="colorval" id="colorval" />
					<input type="hidden" name="boldval" id="boldval" />
					<span onclick="colorpicker('colorpanel','colorval','title');" class="color" title="标题颜色"> </span> <span id="colorpanel"></span> <span onclick="blodpicker('boldval','title');" class="blod" title="标题加粗"> </span> <span onclick="clearpicker()" class="clear" title="清除属性">[#]</span> &nbsp; </div></td>
		</tr>
        
        <tr class="nb">
			<td height="40" align="right">属　性：</td>
			<td class="attrArea"><?php
			$dosql->Execute("SELECT * FROM `#@__goodsflag` ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="flag[]" id="flag[]" value="'.$row['flag'].'" />'.$row['flagname'].'['.$row['flag'].']</span>';
			}
			?></td>
		</tr>
        
        
        <tr>
			<td height="40" align="right">缩略图片：</td>
			<td><input type="text" name="picurl" id="picurl" class="input" />
				<span class="cnote"><span class="grayBtn" onclick="GetUploadify('uploadify','缩略图上传','image','image',1,<?php echo $cfg_max_file_size; ?>,'picurl')">上 传</span>   </span></td>
		</tr>
        
        
        <tr class="nb">
			<td height="124" align="right">组　图：</td>
			<td><fieldset class="picarr">
					<legend>列表</legend>
					<div>最多可以上传<strong>50</strong>张图片<span onclick="GetUploadify('uploadify2','组图上传','image','image',50,<?php echo $cfg_max_file_size; ?>,'picarr','picarr_area')">开始上传</span></div>
					<ul id="picarr_area">
					</ul>
				</fieldset></td>
		</tr>
        
        
        <tr>
			<td height="40" align="right">生日：</td>
			<td><input type="text" name="birthday" id="birthday" class="inputms" value="" readonly="readonly" />
				<span class="maroon">*</span>
                	<script type="text/javascript">
				date = new Date();
				Calendar.setup({
					inputField     :    "birthday",
					ifFormat       :    "%Y-%m-%d",
					showsTime      :    true,
					timeFormat     :    "24"
				});
				</script>
				</td>
                
              
		</tr>
        
          <tr>
			<td height="40" align="right">年龄：</td>
			<td><input type="text" name="nianling" id="nianling" class="input" />岁
				<span class="maroon">*</span>
				</td>
		</tr>
        
        
          <tr>
			<td height="40" align="right">编号：</td>
			<td><input type="text" name="bianhao" id="bianhao" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
        
         <tr>
			<td height="40" align="right">民族：</td>
			<td><input type="text" name="minzu" id="minzu" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
        
         <tr>
			<td height="40" align="right">健康状况：</td>
			<td><input type="text" name="jkzk" id="jkzk" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
         <tr>
			<td height="40" align="right">身高：</td>
			<td><input type="text" name="height" id="height" class="input" />cm
				<span class="maroon">*</span>
				</td>
		</tr>
        
         <tr>
			<td height="40" align="right">求职意向：</td>
			<td><input type="text" name="qzyx" id="qzyx" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
          <tr>
			<td height="40" align="right">最低薪酬：</td>
			<td><input type="text" name="xinchou" id="xinchou" class="input" />元/月
				<span class="maroon">*</span>
				</td>
		</tr>
        
         <tr>
			<td height="40" align="right">学历：</td>
			<td>
             <select name="xueli" id="xueli">
            <option value="1">本科</option>
             <option value="2">大专</option>
              <option value="3">中专</option>
               <option value="4">高中</option>
                <option value="5">初中</option>
                 <option value="6">小学</option>
            
            </select>
				<span class="maroon">*</span>
				</td>
		</tr>
        
         <tr>
			<td height="40" align="right">从业经验：</td>
			<td><input type="text" name="cyjy" id="cyjy" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
          <tr>
			<td height="40" align="right">工作时间：</td>
			<td><input type="text" name="gzsj" id="gzsj" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
          <tr>
			<td height="40" align="right">工作状态：</td>
			<td>
            <label><input type="radio" name="gzzt" id="gzzt"  value="0" checked="checked"/>待聘</label>
            <label><input type="radio" name="gzzt" id="gzzt"  value="1"/>已聘</label>
				<span class="maroon">*</span>
				</td>
		</tr>
        
        
         <tr>
			<td height="40" align="right">籍贯所属地区：</td>
			<td>
            <select name="jiguan" id="jiguan">
            <option value="1">东北</option>
             <option value="2">华北</option>
              <option value="3">华东</option>
               <option value="4">西南</option>
                <option value="5">西北</option>
                 <option value="6">南方</option>
            
            </select>
            
       

				<span class="maroon">*</span>
				</td>
		</tr>
        
        <tr>
			<td height="40" align="right">籍贯：</td>
			<td><input type="text" name="jg" id="jg" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
         <tr>
			<td height="40" align="right">现居住地址：</td>
			<td><input type="text" name="jzdz" id="jzdz" class="input" />
				<span class="maroon">*</span>
				</td>
		</tr>
        
		
		
		<tr>
			<td height="40" align="right">身份证：</td>
			<td><input type="text" name="sfz" id="sfz" class="input" />
				<span class="grayBtn" onclick="GetUploadify('uploadify','缩略图上传','image','image',1,<?php echo $cfg_max_file_size; ?>,'sfz')">上 传</span> </td>
		</tr>
        
        <tr>
			<td height="40" align="right">健康证：</td>
			<td><input type="text" name="jkz" id="jkz" class="input" />
				<span class="grayBtn" onclick="GetUploadify('uploadify','缩略图上传','image','image',1,<?php echo $cfg_max_file_size; ?>,'jkz')">上 传</span> </td>
		</tr>
        
        
        <tr class="nb">
			<td height="124" align="right">技能证书：</td>
			<td><fieldset class="picarr">
					<legend>列表</legend>
					<div>最多可以上传<strong>50</strong>张图片<span onclick="GetUploadify('uploadify2','组图上传','image','image',50,<?php echo $cfg_max_file_size; ?>,'picarrs','picarr_areas')">开始上传</span></div>
					<ul id="picarr_areas">
					</ul>
				</fieldset></td>
		</tr>
		
		<tr>
			<td height="104" align="right">摘　要：</td>
			<td><textarea name="description" id="description" class="textdesc"></textarea>
				<div class="hr_5"> </div>
				最多能输入 <strong>255</strong> 个字符</td>
		</tr>
		
		<tr>
			<td height="340" align="right">掌握技能：</td>
         
			<td class="attrArea">
			  母婴护理:<br />
			<?php
			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=1 ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="jineng1[]" id="jineng1[]" value="'.$row['jineng'].'" />'.$row['jinengname'].'['.$row['jineng'].']</span>';
			}
			?>
            <br />
            婴幼儿护理：<br />
            <?php
			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=2 ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="jineng2[]" id="jineng2[]" value="'.$row['jineng'].'" />'.$row['jinengname'].'['.$row['jineng'].']</span>';
			}
			?>
            <br />
            乳房护理：<br />
            <?php
			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=3 ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="jineng3[]" id="jineng3[]" value="'.$row['jineng'].'" />'.$row['jinengname'].'['.$row['jineng'].']</span>';
			}
			?>
            <br />
            家政服务：<br />
            <?php
			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=4 ORDER BY orderid ASC");
			while($row = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="jineng4[]" id="jineng4[]" value="'.$row['jineng'].'" />'.$row['jinengname'].'['.$row['jineng'].']</span>';
			}
			?>
            </td>
		</tr>
        
        
        <tr>
			<td height="340" align="right">客户评价：</td>
			<td><textarea name="zwpj" id="zwpj" class="kindeditor"></textarea>
				<script>
				var editor;
				KindEditor.ready(function(K) {
					editor = K.create('textarea[name="zwpj"]', {
						allowFileManager : true,
						width:'667px',
						height:'280px',
						extraFileUploadParams : {
							sessionid :  '<?php echo session_id(); ?>'
						}
					});
				});
				</script>
				</td>
		</tr>
        
        
        <tr>
			<td height="340" align="right">工作履历：</td>
			<td><textarea name="gzll" id="gzll" class="kindeditor"></textarea>
				<script>
				var editor;
				KindEditor.ready(function(K) {
					editor = K.create('textarea[name="gzll"]', {
						allowFileManager : true,
						width:'667px',
						height:'280px',
						extraFileUploadParams : {
							sessionid :  '<?php echo session_id(); ?>'
						}
					});
				});
				</script>
				</td>
		</tr>
        
        
	
		
		<tr class="nb">
			<td colspan="2" height="26"><div class="line"> </div></td>
		</tr>
		<tr>
			<td height="40" align="right">点击次数：</td>
			<td><input type="text" name="hits" id="hits" class="inputos" value="<?php echo mt_rand(50, 200); ?>" /></td>
		</tr>
		<tr>
			<td height="40" align="right">排列排序：</td>
			<td><input type="text" name="orderid" id="orderid" class="inputos" value="<?php echo GetOrderID('#@__goods'); ?>" /></td>
		</tr>
		<tr>
			<td height="40" align="right">更新时间：</td>
			<td><input name="posttime" type="text" id="posttime" class="inputms" value="<?php echo GetDateTime(time()); ?>" readonly="readonly" />
				<script type="text/javascript">
				date = new Date();
				Calendar.setup({
					inputField     :    "posttime",
					ifFormat       :    "%Y-%m-%d %H:%M:%S",
					showsTime      :    true,
					timeFormat     :    "24"
				});
				</script></td>
		</tr>
		<tr class="nb">
			<td height="40" align="right">审　核：</td>
			<td><input type="radio" name="checkinfo" value="true" checked="checked"  />
				是 &nbsp;
				<input type="radio" name="checkinfo" value="false" />
				否<span class="cnote">选择“否”则该信息暂时不显示在前台</span></td>
		</tr>
	</table>
	<div class="formSubBtn">
		<input type="submit" class="submit" value="提交" />
		<input type="button" class="back" value="返回" onclick="history.go(-1);" />
		<input type="hidden" name="action" id="action" value="add" />
		<input type="hidden" name="cid" id="cid" value="<?php echo ($cid = isset($cid) ? $cid : ''); ?>" />
	</div>
</form>
</body>
</html>