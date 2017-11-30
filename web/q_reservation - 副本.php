<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 12 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<title>快速预定</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->
<div class="yd c">
    <div class="yd_main">
	    <div class="yd_main_top l"><img src="images/39.jpg" /></div>
        
        <form action="reservation_save.php" method="post" name="myform" id="myform">
         <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
		<div class="yd_main_main">
		    <div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">工　　种：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" style=" margin-top:15px;" >
              <input name="gz" id="gz1" type="radio" value="月嫂" checked="checked" />月嫂
               <input name="gz" id="gz2" type="radio" value="育婴师" />育婴师
             <input name="gz" id="gz3" type="radio" value="保姆" />保姆 
          <input name="gz" id="gz4" type="radio" value="催乳师" />催乳师 
        
                
                </div>
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">薪资范围：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" style=" margin-top:15px;">
                    <input name="xinzi" id="xinzi1" type="radio" value="3000-4000" checked="checked" />3000-4000
               <input name="xinzi" id="xinzi2" type="radio" value="4000-5000" />4000-5000 
              <input name="xinzi" id="xinzi3" type="radio" value="5000-6000" />5000-6000
    
                    
                    
                    </div>
				
					
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">从业经验：</div>
				<div class="yd_main_main_main_right fr">
				    <div class="yd_main_main_main_right1 fl" style=" margin-top:15px;">
                    <input name="jingyan" id="jingyan1" type="radio" value="一年到两年" checked="checked" />一年到两年 
                 <input name="jingyan" id="jingyan2" type="radio" value="两年到三年" />两年到三年 
            <input name="jingyan" id="jingyan3" type="radio" value="三年以上" />三年以上 
    
                    
                    </div>
				
                
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">服务时间：</div>
				<div class="yd_main_main_main_right fr l">
                
                <input class="Wdate" id="date" name="date" type="text" onClick="WdatePicker()" size="22" style="width:184px; height:23px; margin-top:10px; margin-left:15px;"> 
				
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">所在地区：</div>
				<div class="yd_main_main_main_right fr">
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
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">联系电话：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="mobile" id="mobile" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" />
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">姓　　名：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="name" id="name" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" />
				</div>
			</div>
			<div class="yd_main_main_main">
			    <div class="yd_main_main_main_left fl zt10">额外需求：</div>
				<div class="yd_main_main_main_right fr l">
				<input name="ewxq" id="ewxq" type="text" size="22" style="width:240px; height:23px; margin-top:10px; margin-left:15px;" />
				</div>
			</div>
		</div>
        </form>
		<div class="yd_main_bottom l">
		    <div class="yd_main_bottom_top"><img style="cursor:pointer;" onclick="q_reservation()" src="images/41.jpg" /></div>
			<a href="contact-49-1.html"><div class="yd_main_bottom_bottom zt10 c">《阳光阿姨用户协议》</div></a>
		</div>
	</div>
</div>
<script type="text/javascript">
function q_reservation(){
	 var username = document.getElementById("username").value;
	  var date = document.getElementById("date").value;
	   var province = document.getElementById("province").value;
	    var city = document.getElementById("city").value;
		 var area = document.getElementById("area").value;
		  var name = document.getElementById("name").value;
		   var mobile = document.getElementById("mobile").value;
		    var gz = $("input[name='gz']:checked").val();
			 var jingyan = $("input[name='jingyan']:checked").val();
			  var xinzi = $("input[name='xinzi']:checked").val();
			   var ewxq = document.getElementById("ewxq").value;
		   
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
xmlhttp.open("GET","reservation_save.php?name="+name+"&mobile="+mobile+"&province="+province+"&city="+city+"&area="+area+"&gz="+gz+"&date="+date+"&xinzi="+xinzi+"&jingyan="+jingyan+"&ewxq="+ewxq+"&username="+username,true);
xmlhttp.send();
	}
	
	
	  function close_f(){
						   document.getElementById('light').style.display='none';
						   document.getElementById('fade').style.display='none';
						   window.location.href=window.location.href;
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
