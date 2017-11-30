<?php 
require_once(dirname(__FILE__).'/include/config.inc.php'); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="17425007736171116375" />
<title>烟台月嫂培训|育婴师|催乳师培训|烟台小儿推拿师|小儿推拿|母婴护理加盟|烟台家政-阳光阿姨</title>

<meta name="keywords" content="烟台月嫂培训,烟台育婴师,烟台催乳师培训,烟台小儿推拿,烟台小儿推拿师,母婴护理加盟,烟台家政,烟台月嫂" />
<meta name="description" content="阳光阿姨(ygayi.com)是提供烟台月嫂,烟台育婴师,烟台催乳师培训,烟台小儿推拿等烟台家政服务,以及烟台月嫂培训,烟台催乳师培训,烟台小儿推拿师培训和母婴护理加盟服务的家政服务平台,我们将线上的雇佣查询、预定、合同管理、雇佣评价与线下的经纪人主导的面试撮合、背景调查、雇后服务相结合,让雇主真正实现放心找阿姨、有事找经纪." />

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="on_index.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
<script src="js/bplayer.js" type="text/javascript"></script>
<SCRIPT language=javascript src="js/Designer.js"></SCRIPT>
<script type="text/javascript" src="templates/default/js/top_xuanfu.js"></script>
<link href="zzsc.css" type="text/css" rel="stylesheet" />
<script src="js/zzsc.js" type="text/javascript"></script>


<style type="text/css">
/*.nav{width:1000px;background:#fff;margin:20px auto 0;border:solid 1px #ccc;zoom:1;border-radius:5px;box-shadow:0 1px 6px rgba(0,0,0,0.1);color:#D74452;}*/
.nav_scroll{position:fixed;width:100%;margin:0 auto;left:0;top:0;z-index:999;height: 47px;background: url(images/1.png) left repeat-x;}
.nav:after{content:"";display:block;height:0;clear:both;visibility:hidden;}


</style>
<script type="text/javascript">
$(document).ready(function(){
 var topMain=$("#myjQuery").height()+130//是头部的高度加头部与nav导航之间的距离
 var nav=$(".dh_w");
 $(window).scroll(function(){
  if ($(window).scrollTop()>topMain){//如果滚动条顶部的距离大于topMain则就nav导航就添加类.nav_scroll，否则就移除
   nav.addClass("nav_scroll");
   
  }else{
   nav.removeClass("nav_scroll");
  }
 });
})
</script>



</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header--> 

<div class="index c">
    <div class="banner">
	    <div id="dh">
        <div class="dh_w" style="width:100%;">
		    <div class="dh_main c">
			    <ul>
					  <? 
				  $dosql->Execute("SELECT * FROM `#@__nav` WHERE parentid=1 AND checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		if($cfg_isreurl != 'Y')
			$gourl = $row['linkurl'];
		else
			$gourl = $row['relinkurl'];
		
			$classname = $row['classname'];
       if($row['id'] == 2){
				  ?>
					<li><a class="nav" href="<? echo $gourl;?>"><? echo $classname;?></a></li>
                    
                    <? }else{?>
						
						<li><a  href="<? echo $gourl;?>"><? echo $classname;?></a></li>
					<?	}}?>
				</ul>
			</div>
            </div>
		</div>
        
        
	
        
        <div id="myjQuery">
    <div id="myjQueryContent">
    <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=57 and orderid=1 AND delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,10");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
             <div><a ><img src="<?php echo $row['picurl']; ?>" style=" width:100%; height:606px;" /></a></div>
					<?php
			}
			?>
     
       <?php
			$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=57 and orderid!=1 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC LIMIT 0,10");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl'] != '')$gourl = $row['linkurl'];
				else $gourl = 'javascript:;';
			?>
              <div class="smask"><img src="<?php echo $row['picurl']; ?>" style="width:100%; height:606px;" /></div>
          
					<?php
			}
			?>
  
    </div>
    <!--<ul id="myjQueryNav">
      <li class="current"></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>-->
  </div>
  
  
  
	</div>
	<div class="fenlei">
	    <div class="fenlei_main zt5">
        
       
     <? 
				  $dosql->Execute("SELECT * FROM `#@__nav` WHERE parentid=1 AND id in (28,29,30,31,15)  and  checkinfo=true ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
		if($cfg_isreurl != 'Y')
			$gourl = $row['linkurl'];
		else
			$gourl = $row['relinkurl'];
		
			$classname = $row['classname'];
			?>
    		    
			<div class="fenlei_main2 fl">
			    <div class="fenlei_main1_top"><a href="<? echo $gourl;?>"><img src="<? echo $row['picurl'];?>" width="138" height="138" /></a></div>
				<div class="fenlei_main1_bottom"><a href="<? echo $gourl;?>"><? echo $classname;?></a></div>
			</div>
			
            
            <? }?>
            
		</div>
	</div>
	
    
   <div id="zzsc">
<a class="pre"></a>
<div id="wai_box">
<div class="zzsc_box">
<ul>
<? 
				$dosql->Execute("SELECT * FROM `#@__goods` WHERE  delstate='' AND checkinfo=true and flag like '%c%' ORDER BY orderid ASC limit 0,12");
				
				while($row = $dosql->GetArray())
				{
					
						if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
					?>
				<li><div class="aylb fl">
                      <div class="aylb_top"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" width="157" height="210" alt=""></a></div>
					<div class="aylb_main">
					    <div class="aylb_main_left fl"><a href="<? echo $gourl;?>"><? echo $row['title'];?></a></div>
						<div class="aylb_main_main fl"><img src="images/8.jpg" width="21" height="21" /></div>
						<div class="aylb_main_right fr r"><? echo $row['nianling'];?>岁</div>
					</div>
					<div class="aylb_bottom"><? echo $row['typename'];?></div>
				</div>
				</li>
				<? }?>


</ul>
<ul>
<? 
				$dosql->Execute("SELECT * FROM `#@__goods` WHERE  delstate='' AND checkinfo=true and flag like '%c%' ORDER BY orderid ASC limit 13,12");
				
				while($row = $dosql->GetArray())
				{
					
						if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
					?>
				<li><div class="aylb fl">
                      <div class="aylb_top"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" width="157" height="210" alt=""></a></div>
					<div class="aylb_main">
					    <div class="aylb_main_left fl"><a href="<? echo $gourl;?>"><? echo $row['title'];?></a></div>
						<div class="aylb_main_main fl"><img src="images/8.jpg" width="21" height="21" /></div>
						<div class="aylb_main_right fr r"><? echo $row['nianling'];?>岁</div>
					</div>
					<div class="aylb_bottom"><? echo $row['typename'];?></div>
				</div>
				</li>
				<? }?>
</ul>
<ul>
               <? 
				$dosql->Execute("SELECT * FROM `#@__goods` WHERE  delstate='' AND checkinfo=true and flag like '%c%' ORDER BY orderid ASC limit 25,12");
				
				while($row = $dosql->GetArray())
				{
					
						if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
					?>
				<li><div class="aylb fl">
                      <div class="aylb_top"><a href="<? echo $gourl;?>"><img src="<? echo $picurl;?>" width="157" height="210" alt=""></a></div>
					<div class="aylb_main">
					    <div class="aylb_main_left fl"><a href="<? echo $gourl;?>"><? echo $row['title'];?></a></div>
						<div class="aylb_main_main fl"><img src="images/8.jpg" width="21" height="21" /></div>
						<div class="aylb_main_right fr r"><? echo $row['nianling'];?>岁</div>
					</div>
					<div class="aylb_bottom"><? echo $row['typename'];?></div>
				</div>
				</li>
				<? }?>


</ul>
</div>
</div>
<a class="next"></a>
	<div class="nav" style="display:none;">
	<a class="now"></a>
	<a ></a>
	<a ></a>
	</div>
</div>


	<div class="gongxu">
  
	    <div class="gongxu_top l"><img src="images/index_63.jpg" width="354" height="60" alt=""></div>
		<div class="gongxu_bottom">
        
      
          <form name="xu" id="xu" method="post" action="xu.php"/>
            <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
		    <div class="gongxu_bottom_left fl l">
			    <div class="gongxu_bottom_left1">
				    <div class="gongxu_bottom_left1_left fl">姓　名：</div>
					<div class="gongxu_bottom_left1_right fl"><input value="" type="text" name="name_x" id="name_x" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/></div>
				</div>
				<div class="gongxu_bottom_left2">
				    <div class="gongxu_bottom_left1_left fl">手机号：</div>
					<div class="gongxu_bottom_left1_right fl"><input value="" type="text" name="mobile_x" id="mobile_x" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/></div>
				</div>
				<div class="gongxu_bottom_left3">
				    <div class="gongxu_bottom_left1_left fl">地　区：</div>
                    					
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

<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:112px; padding-left:0px;">
                        <select id="province" class="province" name="province">
<option value='0' >请选择省</option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>

<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:112px; padding-left:0px;">
                        <span id="citySpan">
	<select id="city" name="city" class="province">
		<option value="0">请选择市</option>
	</select>
</span>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>


<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:112px; padding-left:0px;">
                        <span id="areaSpan">
	<select id="area" name="area" class="province">
		<option value="0">请选择区</option>
	</select>
</span>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>
                    
                      <style>
		   .province { 


width: 135px; 
height: 30px; 
line-height: 20px; 
background:  url(images/11.jpg) no-repeat ; 
text-indent: 20px; border:none;
outline:none; text-align:center;
} 
		   </style>  
           <script type="text/javascript">
		   function gz_xu(){
			   document.getElementById("gz_xu").style.display="block";
			   }
			   
			   function gz_close_xu(a){
				   document.getElementById("gz_x").value=a;
				   document.getElementById("gz_xu").style.display="none";
				   }
				   
				   
				   
				   function s_x(){
					   
					   var username = document.getElementById("username").value;
					     var name = document.getElementById("name_x").value;
						 var province = document.getElementById("province").value;
						 var city = document.getElementById("city").value;
						 var area = document.getElementById("area").value;
						    var gz = document.getElementById("gz_x").value;
					   	var mobilephone = document.getElementById("mobile_x").value;
						
						
						
						
						var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;

					 if(username == "" || username == "guest"){
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
xmlhttp.open("GET","xu.php?name_x="+name+"&mobile_x="+mobilephone+"&province="+province+"&city="+city+"&area="+area+"&gz_x="+gz+"&username="+username,true);
xmlhttp.send();
					

					   }
					   
					   
					    function gz_gong(){
			   document.getElementById("gz_gong").style.display="block";
			   }
			   
			   function gz_close_gong(a){
				   document.getElementById("gz_g").value=a;
				   document.getElementById("gz_gong").style.display="none";
				   }
				   
				 
				   
				   function s_g(){
					    var username = document.getElementById("usernames").value;
						  var names = document.getElementById("name_g").value;
						    var gzs = document.getElementById("gz_g").value;
							 var provinces = document.getElementById("provinces").value;
						 var citys = document.getElementById("citys").value;
						 var areas = document.getElementById("areas").value;
							
						var mobilephones = document.getElementById("mobile_g").value;
						
						var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
					  // if(username == ""){
//						   alert("请登录！")
//						   return false;
//						   }
						  if(names.replace(/\s/g,'')==''){    
					    alert("姓名不能为空！")
						   return false;
					   } 
					   
					     if(mobilephones == ""){    
					    alert("手机号不能为空！")
						   return false;
					   } 
					   
					   if(!reg.test(mobilephones)){    
					    alert("手机号不正确！")
						   return false;
					   }
					   
					    if(provinces == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					   if(citys == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					   if(areas == 0){
						  alert("请选择地区！")
						   return false; 
					  }
					  
					   if(gzs.replace(/\s/g,'')==''){
						  alert("工种不能为空！")
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
xmlhttp.open("GET","gong.php?name_g="+names+"&mobile_g="+mobilephones+"&provinces="+provinces+"&citys="+citys+"&areas="+areas+"&gz_g="+gzs+"&username="+username,true);
xmlhttp.send();
						   
					   }
					   
					   
					   function close_f(){
						   document.getElementById('light').style.display='none';
						   document.getElementById('fade').style.display='none';
						   window.location.href=window.location.href;
						   }
		   </script>       


         
                    
				</div>
				<div class="gongxu_bottom_left4">
				    <div class="gongxu_bottom_left1_left fl">工　种：</div>
					<div class="gongxu_bottom_left1_right fl">
                    <input value=""  onfocus="gz_xu()"  type="text" name="gz_x" id="gz_x" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/>
                    
                    </div>
                    <div  id="gz_xu"  class="pop_bra2"  style="position: absolute;
border: 1px solid #0BA762;display:none;margin-left:78px; *margin-left:-185px;margin-top:30px;width:170px;background: #fff;" >
              <ul >
              <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id");
	
	while($row = $dosql->GetArray()){
		

?>
               <li style="cursor:pointer;" onclick="gz_close_xu('<? echo $row['classname'];?>')"><? echo $row['classname'];?></li>
            <? }?>
               </ul>
             </div>
				</div>
				<div class="gongxu_bottom_left5"><img  style="cursor:pointer;" onclick="s_x()" src="images/index_81.jpg" width="114" height="35" /></div>
			</div>
            </form>
            
            
            
            
            
             <form name="gong" id="gong" method="post" action="gong.php"/>
               <input type="hidden" name="usernames" id="usernames" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
			<div class="gongxu_bottom_left21 fr l">
			    <div class="gongxu_bottom_left1">
				    <div class="gongxu_bottom_left1_left fl">姓　名：</div>
					<div class="gongxu_bottom_left1_right fl"><input type="text" name="name_g" id="name_g" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/></div>
				</div>
				<div class="gongxu_bottom_left2">
				    <div class="gongxu_bottom_left1_left fl">手机号：</div>
					<div class="gongxu_bottom_left1_right fl"><input type="text" name="mobile_g" id="mobile_g" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/></div>
				</div>
				<div class="gongxu_bottom_left3">
				    <div class="gongxu_bottom_left1_left fl">地　区：</div>
					
                    
                    
                    
                    
										 <?php 
	$dosql->Execute("select * from province");
	
	while($row = $dosql->GetArray()){
		$province[]=$row;
	}
?>
<script src='jquerys.js'></script>
<script>
	$(document).ready(function(){
		$("#provinces").change(function(){
			var provinceid=$(this).val();
			$("#citySpans").load("index_citys.php?provinceid="+provinceid);
			$("#areaSpans").html("<select id=\"areas\" class=\"province\" name=\"area\"><option value=\"0\">请选择区</option></select>");
		});
	})
	function selectAreas(){
		var cityid=$("#citys").val();
		$("#areaSpans").load("index_areas.php?cityid="+cityid);
	}
</script>

<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:115px; padding-left:0px;">
                        <select id="provinces" class="province" name="provinces">
<option value='0' >请选择省</option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>

<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:115px; padding-left:0px;">
                        <span id="citySpans">
	<select id="citys" name="citys" class="province">
		<option value="0">请选择市</option>
	</select>
</span>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>


<div class="gongxu_bottom_left1_main fl" style="width:112px;">
					    <div class="gongxu_bottom_left1_main_left fl" style="overflow:hidden; background:none; width:115px; padding-left:0px;">
                        <span id="areaSpans">
	<select id="areas" name="areas" class="province">
		<option value="0">请选择区</option>
	</select>
</span>
                        </div>
						<!--<div class="gongxu_bottom_left1_main_right fr"><img src="images/10.jpg" width="29" height="29" /></div>-->
					</div>
                    
                      <style>
		   .province { 


width: 135px; 
height: 30px; 
line-height: 20px; 
background:  url(images/index_pca.jpg) no-repeat ; 
text-indent: 20px; border:none;
outline:none; text-align:center;
} 
		   </style>         
                    
                    
                    
                    
				</div>
				<div class="gongxu_bottom_left4">
				    <div class="gongxu_bottom_left1_left fl">工　种：</div>
					<div class="gongxu_bottom_left1_right fl">
                    <input onfocus="gz_gong()"  type="text" name="gz_g" id="gz_g" style=" margin-top:1px;width:165px; height:26px;outline:none; border:none;"/>
                    
                    </div>
                    <div   id="gz_gong"  class="pop_bra2"  style="position: absolute;
border: 1px solid #0BA762;display:none;margin-left:78px; *margin-left:-185px;margin-top:30px;width:170px;background: #fff;" >
              <ul >
              <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id");
	
	while($row = $dosql->GetArray()){
		

?>
               <li style="cursor:pointer;" onclick="gz_close_gong('<? echo $row['classname'];?>')"><? echo $row['classname'];?></li>
            <? }?>
               </ul>
             </div>
				</div>
				<div class="gongxu_bottom_left5"><img onclick="s_g()" style="cursor:pointer;" src="images/index_81.jpg" width="114" height="35" /></div>
			</div>
            
            </form>
            
            
		</div>
	</div>
	<div class="huodong">
	    <div class="huodong_top">
		    <div class="huodong_top_left fl"><img src="images/index_85.jpg" width="245" height="60" alt=""></div>
            <?php
			if($cfg_isreurl!='Y') $gourl = 'huodong.php?cid=25';
			else $gourl = 'huodong-25-1.html';
			?>
			<div class="huodong_top_right fr"><a href="<?php echo $gourl;?>"><img src="images/index_88.jpg" width="51" height="15" alt="" style="margin-top:20px;"></a></div>
		</div>
		<div class="huodong_bottom">
        
        <?php
				$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE (classid=25 OR parentstr LIKE '%,25,%') AND flag LIKE '%h,a%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC limit 1");
				if(isset($row['id']))
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					//获取缩略图地址
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
		    <div class="huodong_bottom_left fl">
			    <div class="huodong_bottom_left_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="165" height="180" alt=""></a></div>
				<div class="huodong_bottom_left_right fr">
				    <div class="huodong_bottom_left_right_top l zt6" style="overflow:hidden;"><a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></div>
					<div class="huodong_bottom_left_right_bottom l" style=" height:140px;overflow:hidden;"><?php echo strip_tags($row['content']); ?></div>
				</div>
			</div>
            	<?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				?>
            
			<div class="huodong_bottom_right fr">
		      
				  <?php
				$dosql->Execute("SELECT * FROM `#@__infolist` WHERE (classid=25 OR parentstr LIKE '%,25,%') AND flag LIKE '%h%' AND delstate='' AND checkinfo=true ORDER BY orderid ASC limit 4");
				while($row = $dosql->GetArray())
				{
				if(isset($row['id']))
				{
					//获取链接地址
					if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'huodongshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'huodongshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];

					//获取缩略图地址
					if($row['picurl']!='')
						$picurl = $row['picurl'];
					else
						$picurl = 'templates/default/images/nofoundpic.gif';
				?>
				<div class="huodong_bottom_right_main fl">
				    <div class="huodong_bottom_right_main_left fl"><a href="<?php echo $gourl; ?>"><img src="<?php echo $picurl; ?>" width="97" height="80" alt=""></a></div>
					<div class="huodong_bottom_right_main_right fr">
					    <div class="huodong_bottom_right_main_right_top l zt6" style="overflow:hidden;"><a href="<?php echo $gourl; ?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></div>
						<div class="huodong_bottom_right_main_right_bottom l" style="overflow:hidden;"><?php echo strip_tags($row['content']); ?></div>
					</div>
				</div>
				<?php
				}
				else
				{
					echo '网站资料更新中...';
				}
				}
				?>
                
                
			</div>
            
            
            
            
		</div>
	</div>
	<div class="pingjia">
	    <div class="pingjia_top">
		    <div class="pingjia_top_left fl"><img src="images/index_106.jpg" width="272" height="60" alt=""></div>
			<div class="pingjia_top_right fr"><a href="message_user.php"><img src="images/index_88.jpg" width="51" height="15" alt="" style="margin-top:20px;"></a></div>
		</div>
        
        
        
        
		<div class="pingjia_bottom">
		    <div class="pingjia_bottom1 fl">
              <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=1 or orderid=2) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
			    <div class="pingjia_bottom1_main"><img src="<? echo $row['picurl'];?>" width="104" height="104" alt=""></div>
				
				<? }?>
			</div>
            
            
			<div class="pingjia_bottom2 fl" style="margin-left:40px;">
			      <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=1 or orderid=2) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
				<div class="pingjia_bottom2_main">
				    <div class="pingjia_bottom2_main_top l zt6"><? echo $row['nickname']; echo "&nbsp;"; echo $row['contact'];?>说：</div>
					<div class="pingjia_bottom2_main_main l" style="overflow:hidden;">
                    <? echo $row['content'];?>
                    </div>
					<div class="pingjia_bottom2_main_bottom">
					    <div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
					</div>
				</div>
                <? }?>
                
			</div>
            
            
            
			<div class="pingjia_bottom3 fl">
             <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=3 or orderid=4) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
            <div class="pingjia_bottom1_main"><img src="<? echo $row['picurl'];?>" width="104" height="104" alt=""></div>
				<? }?>
            </div>
			<div class="pingjia_bottom4 fl" style="margin-left:5px;">
			      <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=3 or orderid=4) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
				<div class="pingjia_bottom2_main">
				    <div class="pingjia_bottom2_main_top l zt6"><? echo $row['nickname']; echo "&nbsp;"; echo $row['contact'];?>说：</div>
					<div class="pingjia_bottom2_main_main l" style="overflow:hidden;"> <? echo $row['content'];?></div>
					<div class="pingjia_bottom2_main_bottom">
					    <div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
					</div>
				</div>
                
                <? }?>
			</div>
			<div class="pingjia_bottom5 fl">
              <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=5 or orderid=6) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
			    <div class="pingjia_bottom1_main"><img src="<? echo $row['picurl'];?>" width="104" height="104" alt=""></div>
				<? }?>
			</div>
			<div class="pingjia_bottom6 fr">
			     <?php
				$dosql->Execute("SELECT * FROM `#@__message` WHERE (orderid=5 or orderid=6) ORDER BY orderid ASC limit 2");
				while($row = $dosql->GetArray())
				{?>
				<div class="pingjia_bottom2_main">
				    <div class="pingjia_bottom2_main_top l zt6"><? echo $row['nickname']; echo "&nbsp;"; echo $row['contact'];?>说：</div>
					<div class="pingjia_bottom2_main_main l" style="overflow:hidden;"><? echo $row['content'];?></div>
					<div class="pingjia_bottom2_main_bottom">
					    <div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
						<div class="pingjia_bottom2_main_bottom_main fr"><img src="images/index_117.jpg" width="11" height="11" alt=""></div>
					</div>
				</div>
                <? }?>
			</div>
		</div>
	</div>
	<div class="guzhu">
	    <div class="guzhu_top">
		    <div class="guzhu_top_left fl"><img src="images/index_121.jpg" width="314" height="60" alt=""></div>
			<div class="guzhu_top_right fr"><A HREF="guzhu_list.php"><img src="images/index_88.jpg" width="51" height="15" alt="" style="margin-top:20px;"></A></div>
		</div>
		<div class="guzhu_bottom">
		    <div class="guzhu_bottom_top">
			    
				 <?php
				$dosql->Execute("SELECT * FROM `#@__ksyy` WHERE flag like '%c%' ORDER BY orderid ASC limit 6");
				while($row = $dosql->GetArray())
				{?>
				
				<div class="guzhu_bottom_top_main fl">
				    <div class="guzhu_bottom_top_main_top l">
				      <p><? echo $row['name'];?>  <? echo $row['gz'];?></p>
                      <?  $row_c = $dosql->GetOne("SELECT * FROM `city` WHERE cityid=".$row['city']); ?>
				      <p>所在地：<? echo $row_c['city'];?>				        </p>
				      <p>可接受工资：<? echo $row['xinzi'];?></p>
			      </div>
					<div class="guzhu_bottom_top_main_bottom">
					    <div class="guzhu_bottom_top_main_bottom_right fr"><a href="guzhu-<? echo $row['id'];?>.html">查看</a></div>
						<div class="guzhu_bottom_top_main_bottom_left fr"><img src="images/3.png" /></div>
					</div>
				</div>
				<? }?>
                
                
			</div>
			<div class="guzhu_bottom_bottom"></div>
		</div>
	</div>
    
    <div class="chengnuo">
	    <div class="chengnuo_top">
		    <div class="chengnuo_top_left fl l"><img src="images/73.jpg" alt=""></div>
			<div class="chengnuo_top_right fr"><a href="media-54-1.html"><img src="images/index_88.jpg" width="51" height="15" alt="" style="margin-top:20px;"></a></div>
		</div>
		<div class="chengnuo_bottom2">
		    
			
			
            <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=54 OR parentstr LIKE '%,54,%') AND delstate='' and flag like '%c%' AND checkinfo=true ORDER BY orderid ASC",6);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'mediashow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'mediashow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'media.php?cid='.$row['classid'];
					else $gourl2 = 'media-'.$row['classid'].'-1.html';
					
					$date = date('Y-m-d',$row['posttime']);
				?>
			
			<div class="chengnuo_bottom2_main fl" style="height:72px;">
			    <div class="chengnuo_bottom2_main_left fl"><a href="<?php echo $gourl; ?>"><img onload="DrawImage(this,'60','60');" src="<?php echo $row['picurl']; ?>" style="*width:60px; *height:60px;" alt=""></a></div>
				<div class="chengnuo_bottom2_main_right fr">
				    <div class="chengnuo_bottom2_main_right_top">
					    <div class="chengnuo_bottom2_main_right_top_left fl" style="font-weight:bold;" title="<? echo $row['title'];?>"><a href="<?php echo $gourl; ?>"><?php echo mb_substr($row['title'],0,14,'utf-8'); ?></a></div>
						<div class="chengnuo_bottom2_main_right_top_right fr"><?php echo $date; ?></div>
					</div>
					<div class="chengnuo_bottom2_main_right_bottom l" style="overflow:hidden;">　<a href="<?php echo $gourl; ?>">　<? echo strip_tags($row['description']);?></a></div>
				</div>
			</div>
            
            <? }?>
            
		</div>
	</div>
    
	<div class="chengnuo">
	    <div class="chengnuo_top">
		    <div class="chengnuo_top_left fl"><img src="images/index_128.jpg" width="290" height="60" alt=""></div>
			<div class="chengnuo_top_right fr"><a href="contact-24-1.html"><img src="images/index_88.jpg" width="51" height="15" alt="" style="margin-top:20px;"></a></div>
		</div>
		<div class="chengnuo_bottom"><img src="images/index_132.jpg" width="1041" height="153" alt=""></div>
	</div>
    
    
    
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
    
</div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>
