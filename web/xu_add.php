<?php 
require_once(dirname(__FILE__).'/include/config.inc.php'); 


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
<title>我要找阿姨</title>
  
</head>
<body>
<div class="require_top">
	<p>我要找阿姨</p>
</div>

          <form name="xu" id="xu" method="post" action="xu.php"/>
            <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>

<div class="require_box">
	<div class="require">
    
 
        
    	<div class="set01">
            <p>姓名：</p>
            <div class="set_in1">
          <input value="" type="text" name="name_x" id="name_x" style="outline:none; border:none;"/>
            </div>
        </div>
        
        <div class="set01">
            <p>手机号：</p>
            <div class="set_in1">
          <input value="" type="text" name="mobile_x" id="mobile_x" style="outline:none; border:none;"/>
            </div>
        </div>
        
        
        
           					
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
			$("#areaSpan").html("<select id=\"area\" class=\"province\" name=\"area\"><option value=\"0\">请选择区</option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_area.php?cityid="+cityid);
	}
</script>

        <div class="pece04">
        	<p>地区：</p>
            <div class="pece_se02">
            	<ul>
                <li style="width:37%; margin-bottom:15px; margin-right:5%;" class="curA">
                <select id="province"  name="province" >
          <option value='0' >请选择省</option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
                </li>
                <li style="width:37%; margin-bottom:15px;" class="curA">
                <span id="citySpan">
	<select id="city" name="city" class="province">
		<option value="0">请选择市</option>
	</select>
</span>
                </li>
                <li style="width:37%; margin-bottom:15px; margin-right:5%;" class="curA">
                 <span id="areaSpan">
	<select id="area" name="area" class="province">
		<option value="0">请选择区</option>
	</select>
    </span>
                </li>
                
                </ul>
            </div>
        </div>
        
        
        <div class="req01">
            <p>工种：</p>
            <div class="req_se01">
            <select name="gz_x" id="gz_x">
           <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id");
	
	while($row = $dosql->GetArray()){
		

?>
            <option value="<? echo $row['classname'];?>"><? echo $row['classname'];?></option>
             
            <? }?>
           
            </select>
            </div>
        </div>
        
        
        
        
      
        <div class="req05">
        	<p><a style=" cursor:pointer;" onclick="s_x();">确认发布</a></p>
        </div>
    </div>
</div>
</form>

 <script type="text/javascript">
		  
				   function s_x(){
					   
					   var username = document.getElementById("username").value;
					     var name = document.getElementById("name_x").value;
						 var province = document.getElementById("province").value;
						 var city = document.getElementById("city").value;
						 var area = document.getElementById("area").value;
						    var gz = document.getElementById("gz_x").value;
					   	var mobilephone = document.getElementById("mobile_x").value;
						
						
						
						
						var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;

					 if(username == ""){
						 window.location.href='member.php?c=login';
						 return false;
						 }
						   
						    if(name.replace(/\s/g,'')==''){    
					    alert("姓名不能为空！")
						   return false;
					   } 
					   
					     if(mobilephone == ""){    
					    alert("手机号不能为空！")
						   return false;
					   } 
						   
					  if(!reg.test(mobilephone)){
						  alert("手机号码不正确！")
						   return false; 
					  }
					  
					    if(province == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					   if(city == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					   if(area == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					  
					   if(gz.replace(/\s/g,'')==''){
						  alert("工种不能为空！")
						   return false; 
					  }
					  

					document.xu.submit();

					   }
					   
					   

					   
				
		   </script>     

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
