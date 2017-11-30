<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 12 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$id  = empty($goods_id)  ? 0 : intval($goods_id);
$bianhao  = empty($bianhao)  ? '' : $bianhao;
$amount  = empty($amount)  ? 0 : $amount;
$jingliren  = empty($jingliren)  ? '' : $jingliren;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<title>快速预定</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script type='text/javascript' src='js/public.js'></script>
</head>
<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<div class="yd c">

 <form action="reservations_save.php" method="post" name="myforms" id="myforms">
    <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
 <input type="hidden" name="goods_id"  id="goods_id" value="<? echo $id; ?>" />
  <input type="hidden" name="bianhao"  id="bianhao" value="<? echo $bianhao; ?>" />
   <input type="hidden" name="gz"  id="gz" value="<? echo $typeid; ?>" />
     <input type="hidden" name="amount" id="amount" value="<? echo $amount;?>" />
    <input type="hidden" name="jingliren"  id="jingliren" value="<? echo $jingliren; ?>" />
    <div class="ksyd">
	    <div class="ksyd1 l"><img src="images/39.jpg" /></div>
        
        <?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			if(@$r)
			{
		
			$row = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			?>
		<div class="ksyd2">
		    <div class="ksyd2_left fl"><img src="<? echo $row['picurl'];?>" onload="javascript:DrawImage(this,'89','89');" /></div>
			<div class="ksyd2_right fl l zt8"><? echo $row['title'];?></div>
		</div>
        <? }?>
        
		<div class="ksyd3">
		    <div class="ksyd3_main">
			    <div class="ksyd3_main_left fl zt10">服务时间：</div>
				<div class="ksyd3_main_right fr l">
                 <input class="Wdate" id="date" name="date" type="text" onClick="WdatePicker()" size="22" style="width:184px; height:23px; margin-top:10px; margin-left:15px;"> 
                </div>
			</div>
			<div class="ksyd3_main">
			    <div class="ksyd3_main_left fl zt10">所在地区：</div>
				<div class="ksyd3_main_right fr l">
				    
					<div style="float:left; margin-top:10px;">
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
			<div class="ksyd3_main">
			    <div class="ksyd3_main_left fl zt10">联系电话：</div>
				<div class="ksyd3_main_right fr l">	<input name="mobile" id="mobile" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" /></div>
			</div>
			<div class="ksyd3_main">
			    <div class="ksyd3_main_left fl zt10">姓　　名：</div>
				<div class="ksyd3_main_right fr l"><input name="name" id="name" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" /></div>
			</div>
			<div class="ksyd3_main">
			    <div class="ksyd3_main_left fl zt10">额外需求：</div>
				<div class="ksyd3_main_right fr l"><input name="ewxq" id="ewxq" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" /></div>
			</div>
		</div>
		<div class="yd_main_bottom l">
		    <div class="yd_main_bottom_top"><img style="cursor:pointer;" onclick="q_reservations()" src="images/41.jpg" /></div>
			<a href="contact-49-1.html"><div class="yd_main_bottom_bottom zt10 c">《阳光阿姨用户协议》</div></a>
		</div>
	</div>
    </form>
</div>
<script type="text/javascript">
function q_reservations(){

 var username = document.getElementById("username").value;
	  var date = document.getElementById("date").value;
	   var province = document.getElementById("province").value;
	    var city = document.getElementById("city").value;
		 var area = document.getElementById("area").value;
		  var name = document.getElementById("name").value;
		   var mobile = document.getElementById("mobile").value;
		    var goods_id = document.getElementById("goods_id").value;
			 var bianhao = document.getElementById("bianhao").value;
		   var gz = document.getElementById("gz").value;
			   var ewxq = document.getElementById("ewxq").value;
			      var jingliren = document.getElementById("jingliren").value;
				   var amount = document.getElementById("amount").value;
		   
		   var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	  if(username == ""){
						window.location.href="member.php?c=login";
						   return false;
						   }
						   
						
							   
							     if(date == ""){
						  alert("服务时间不能为空！")
						   return false; 
					  }
							   
							     if(province == 0){
						  alert("地区不能为空！")
						   return false; 
					  }
					    if(city == 0){
						  alert("地区不能为空！")
						   return false; 
					  }
					    if(area == 0){
						  alert("地区不能为空！")
						   return false; 
					  }
					    if(mobile == ""){
						  alert("联系电话不能为空！")
						   return false; 
					  }
					   if(!reg.test(mobile)){    
					    alert("联系电话格式不正确！")
						   return false;
					   }
					  
					    if(name == ""){
						  alert("姓名不能为空！")
						   return false; 
					  }
							  
						   
 var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("float").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","reservations_save.php?name="+name+"&mobile="+mobile+"&province="+province+"&city="+city+"&area="+area+"&gz="+gz+"&date="+date+"&ewxq="+ewxq+"&username="+username+"&goods_id="+goods_id+"&bianhao="+bianhao+"&jingliren="+jingliren+"&amount="+amount,true);
xmlhttp.send();
	}
	
	
	  function close_f(){
						   document.getElementById('light').style.display='none';
						   document.getElementById('fade').style.display='none';
						 history.go(-1);
						   }
</script>


<div id="float"></div>
 <style> 
		   .dialog_close{
			   position: absolute;
top: -20px;
right: -20px;
z-index: 1001;
cursor: pointer;
			   
			   }
        .black_overlay{ 
          position: fixed;
top: 100px;
width: 750px;
height: 635px;

z-index: 1000;

display: none; margin-left:460px;
        } 
        .white_content { 
          position: fixed;
left: 0;
top: 0;
z-index: 999;
width: 100%;
height: 100%;
background-color: black;
opacity: 0.5;
display: none;
filter: alpha(opacity=50);
        } 
    </style> 

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->

</body>
</html>
