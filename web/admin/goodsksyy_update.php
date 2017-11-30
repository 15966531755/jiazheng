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
<script language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
function q_reservation(){
	
	document.myform.submit();
	}
</script>
</head>
<body>
<?php
$row = $dosql->GetOne("SELECT * FROM `#@__ksyy` WHERE `id`=$id");
$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE `cityid`=".$row['city']);
$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE `areaid`=".$row['area']);

?>
<div class="formHeader"> <span class="title">编辑内容</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form action="goodsksyy_save.php" method="post" name="myform" id="myform">
		<div class="yd_main_main">
		    <div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">工　　种：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl"  >
                    
                     <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id asc");
	
	while($rows = $dosql->GetArray()){
		

?>
              <input name="gz" type="radio" value="<? echo $rows['classname'];?>"  <? if($row['gz'] == $rows['classname']){?>checked="checked" <? }?> /><? echo $rows['classname'];?>
           
        
                <? }?>
                </div>
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">薪资范围：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" >
                    <input name="xinzi" type="radio" value="2000-3000"  <? if($row['xinzi'] == "2000-3000"){?>checked="checked" <? }?>/>3000-4000
               <input name="xinzi" type="radio" value="3000-4000"  <? if($row['xinzi'] == "3000-4000"){?>checked="checked" <? }?>/>4000-5000 
              <input name="xinzi" type="radio" value="4000-5000" <? if($row['xinzi'] == "4000-5000"){?>checked="checked" <? }?>/>5000-6000
    
                    
                    
                    </div>
				
					
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">从业经验：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" >
                    <input name="jingyan" type="radio" value="一年到两年" <? if($row['jingyan'] == "一年到两年"){?>checked="checked" <? }?> />一年到两年 
                 <input name="jingyan" type="radio" value="两年到三年" <? if($row['jingyan'] == "两年到三年"){?>checked="checked" <? }?>/>两年到三年 
            <input name="jingyan" type="radio" value="三年以上" <? if($row['jingyan'] == "三年以上"){?>checked="checked" <? }?>/>三年以上 
    
                    
                    </div>
				
                
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">服务时间：</div>
				<div class="yd_main_main_main_right fr l">
                
                <input class="Wdate" name="date" type="text" onClick="WdatePicker()" size="22" style="width:184px; height:23px;  margin-left:15px;" value="<? echo $row['date'];?>"> 
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">所在地区：</div>
				<div class="yd_main_main_main_right fr">
				    <div style="float:left;" >
					   <?php 
	$dosql->Execute("select * from province");
	
	while($rows = $dosql->GetArray()){
		$province[]=$rows;
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
<option value='<?php echo $v['provinceid']?>' <? if ($row['province']==$v['provinceid']){?> selected="selected"<? }?>><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
<span id="citySpan">
	<select id="city" name="city">
		<option value="0">请选择市</option>
          <? if ($row['city']){?><option value="<? echo $row['city'];?>" selected="selected"><? echo $row_c['city'];?> </option><? }?>
    
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area">
		<option value="0">请选择区</option>
         <? if ($row['area']){?><option value="<? echo $row['area'];?>" selected="selected"><? echo $row_a['area'];?> </option><? }?>
	</select>
</span>
</div>
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">联系电话：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="mobile" type="text" size="22" style="width:240px; height:23px;  margin-left:15px;" value="<? echo $row['mobile'];?>" />
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">姓　　名：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="name" type="text" size="22" style="width:240px; height:23px; margin-left:15px;" value="<? echo $row['name'];?>"/>
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">额外需求：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="ewxq" type="text" size="22" style="width:240px; height:23px;  margin-left:15px;" value="<? echo $row['ewxq'];?>"/>
				</div>
			</div>
		</div>
        <table>
        <tr>
			<td height="40" align="right">排列排序：</td>
			<td><input type="text" name="orderid" id="orderid" class="inputos" value="<?php echo $row['orderid']; ?>" /></td>
		</tr>
        </table>
        <table>
    <tr class="nb">
			<td height="40" align="right">属　性：</td>
			<td class="attrArea"><?php
			$flagarr = explode(',',$row['flag']);

			$dosql->Execute("SELECT * FROM `#@__goodsflag` ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				echo '<span><input type="checkbox" name="flag[]" id="flag[]" value="'.$r['flag'].'"';

				if(in_array($r['flag'],$flagarr))
				{
					echo 'checked="checked"';
				}

				echo ' />'.$r['flagname'].'['.$r['flag'].']</span>';
			}
			?></td>
		</tr>
        </table>
        	<input type="hidden" name="action" id="action" value="update" />
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        </form>
        
        <div class="yd_main_bottom l">
		    <div class="yd_main_bottom_top"><img style="cursor:pointer;" onclick="q_reservation()" src="../images/41.jpg" /></div>
			
		</div>
</body>
</html>