<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goods'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加预约信息</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
function q_reservation(){
	
	document.myform.submit();
	}
</script>

</head>
<body>
<div class="formHeader"> <span class="title">添加服务信息</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form action="reservation_save.php" method="post" name="myform" id="myform">
         <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
		<div class="yd_main_main">
		    <div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">工　　种：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl"  >
              <input name="gz" type="radio" value="月嫂" checked="checked" />月嫂
               <input name="gz" type="radio" value="育婴师" />育婴师
             <input name="gz" type="radio" value="养老陪护" />养老陪护 
          <input name="gz" type="radio" value="催乳师" />催乳师 
        
                
                </div>
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">薪资范围：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" >
                    <input name="xinzi" type="radio" value="2000-3000" checked="checked" />2000-3000
               <input name="xinzi" type="radio" value="3000-4000" />3000-4000 
              <input name="xinzi" type="radio" value="4000-5000" />4000-5000
               <input name="xinzi" type="radio" value="5000-8000" />5000-8000
                <input name="xinzi" type="radio" value="8000-10000" />8000-10000
    
                    
                    
                    </div>
				
					
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">从业经验：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" >
                    <input name="jingyan" type="radio" value="一年到两年" checked="checked" />一年到两年 
                 <input name="jingyan" type="radio" value="两年到三年" />两年到三年 
            <input name="jingyan" type="radio" value="三年以上" />三年以上 
    
                    
                    </div>
				
                
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">服务时间：</div>
				<div class="yd_main_main_main_right fr l">
                
                <input class="Wdate" name="date" type="text" onClick="WdatePicker()" size="22" style="width:184px; height:23px;  margin-left:15px;"> 
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">所在地区：</div>
				<div class="yd_main_main_main_right fr">
				    <div style="float:left;" >
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

<select id="province" name="province" style="width:90px; height:23px; line-height:21px;">
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
	<select id="city" name="city" style="width:90px; height:23px; line-height:21px;">
		<option value="0">请选择市</option>
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area" style="width:90px; height:23px; line-height:21px;">
		<option value="0">请选择区</option>
	</select>
</span>
</div>
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">联系电话：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="mobile" type="text" size="22" style="width:240px; height:23px;  margin-left:15px;" />
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">姓　　名：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="name" type="text" size="22" style="width:240px; height:23px; margin-left:15px;" />
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">额外需求：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="ewxq" type="text" size="22" style="width:240px; height:23px;  margin-left:15px;" />
				</div>
			</div>
		</div>
         <table>
        <tr>
			<td height="40" align="right">排列排序：</td>
			<td><input type="text" name="orderid" id="orderid" class="inputos" value="<?php echo GetOrderID('#@__ksyy'); ?>" /></td>
		</tr>
        </table>
        <table>
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
        </table>
        </form>
        
        <div class="yd_main_bottom l">
		    <div class="yd_main_bottom_top"><img style="cursor:pointer;" onclick="q_reservation()" src="../images/41.jpg" /></div>
			
		</div>
</body>
</html>