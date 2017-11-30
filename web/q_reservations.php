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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<link rel="stylesheet"  href="templates/default/style/css.css" type="text/css"><title>快速预定</title>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script type='text/javascript' src='js/public.js'></script>
</head>
<body>

 <form action="reservations_save.php" method="post" name="myforms" id="myforms">
    <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
 <input type="hidden" name="goods_id"  id="goods_id" value="<? echo $id; ?>" />
 <input type="hidden" name="classid"  id="classid" value="<? echo $classid; ?>" />
  <input type="hidden" name="bianhao"  id="bianhao" value="<? echo $bianhao; ?>" />
   <input type="hidden" name="gz"  id="gz" value="<? echo $typeid; ?>" />
     <input type="hidden" name="amount" id="amount" value="<? echo $amount;?>" />
    <input type="hidden" name="jingliren"  id="jingliren" value="<? echo $jingliren; ?>" />
<div class="myorder_top">
	<p>快速预约</p>
</div>

<div class="reserve_box">
  <div class="reserve">
     <?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			
		
			$row = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			?>
    	<!--<div class="res01">
            <p>工种：</p>
            <div class="res_se01">
            <select>
            <option>月嫂</option>
            <option>育婴师</option>
            <option>催乳师</option>
            </select>
            </div>
        </div>
        
        <div class="res02">
            <p>工资范围：</p>
            <div class="res_se02">
            <select>
            <option>3000-4000</option>
            <option>4000-5000</option>
            <option>5000以上</option>
            </select>
            </div>
        </div>
        
        <div class="res02">
            <p>从业经验：</p>
            <div class="res_se02">
            <select>
            <option>一年到两年</option>
            <option>两年到三年</option>
            <option>三年以上</option>
            </select>
            </div>
        </div>-->
        <div class="res_pho">
        	<div class="res_img fl"><img src="/<? echo $row['picurl'];?>"></div>
            <div class="res_name fl"><p><? echo $row['title'];?></p></div>
        </div>
        
        <div class="res03">
        	 <p>服务时间：</p>
             <div class="res_in01">
             <input type="date" id="date" name="date" >
             </div>
        </div>
        
        <div class="res04">
        	<p>所在地址：</p>
            <div class="res_se03">
            	<ul>
                
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
			$("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\">请选择区</option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_area.php?cityid="+cityid);
	}
</script>


                <li style="margin-bottom:15px; margin-right:6%;">
                <select id="province" name="province">
                <option>请选择省</option>
               <?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>

                </select>
                </li>
                <li style="margin-bottom:15px; ">
                
                <span id="citySpan">
	<select id="city" name="city" style="width:90px; height:23px; line-height:21px;">
		<option value="0">请选择市</option>
	</select>
</span>

               
                </li>
                <li>
              <span id="areaSpan">
	<select id="area" name="area" style="width:90px; height:23px; line-height:21px;">
		<option value="0">请选择区</option>
	</select>
</span>

                </li>
                </ul>
            </div>
        </div>
        
        <div class="res05">
        	 <p>联系电话：</p>
             <div class="res_in02">
             <input name="mobile" id="mobile" type="text" value="">
             </div>
             <div class="res_star"><img src="web_images/reserve_star.png" height="37"></div>
        </div>
        
        <div class="res05">
        	 <p>姓名：</p>
             <div class="res_in02">
             <input name="name" id="name" type="text" value="">
             </div>
        </div>
        
        <div class="res05">
        	 <p>额外需求：</p>
             <div class="res_in02">
             <input name="ewxq" id="ewxq" type="text" value="">
             </div>
        </div>
        
        <div class="login04"><input type="checkbox" id="xieyi" checked>&nbsp;&nbsp;我已同意<a href="contact.php?cid=49">《阳光阿姨客户使用协议》</a></div>
        <div class="login05"><a style="cursor:pointer;" onclick="q_reservations();">提交预约</a></div>
        
    </div>
 
</div>
   </form>
<script type="text/javascript">
function q_reservations(){
	 var username = document.getElementById("username").value;
	  var date = document.getElementById("date").value;
	   var province = document.getElementById("province").value;
	    var city = document.getElementById("city").value;
		 var area = document.getElementById("area").value;
		  var name = document.getElementById("name").value;
		   var mobile = document.getElementById("mobile").value;
		   // var gz = document.getElementById("gz").value;
			// var jingyan = document.getElementById("jingyan").value;
//			  var xinzi = document.getElementById("xinzi").value;
//			   var ewxq = document.getElementById("ewxq").value;
			   var xieyi = document.getElementById("xieyi").checked;
		   
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
					  
					   if(xieyi == ""){
						  alert("未同意协议！")
						   return false; 
					  }
					  
					document.myforms.submit();

					   }
</script>


<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->

</body>
</html>
