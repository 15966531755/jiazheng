<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 5 : intval($cid);
$tid = empty($tid) ? 5 : intval($tid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="light" class="white_content" style="display:block;"></div> 
        <div id="fade" class="black_overlay" style="display:block;">

<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none';window.location.href='./'"><img class="dialog_close" src="images/dialog_close.png"/></a>
 
<div class="tjcg c">
    <div class="tjcg_top">
	    <div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
		<div class="tjcg_top_main fl">
		    <div class="tjcg_top_main_left fl"><img src="images/75.jpg" /></div>
			<div class="tjcg_top_main_right fr">
			    <div class="tjcg_top_main_right_top l">
				    <div class="tjcg_top_main_right_top_left fl">赵红霞</div>
					<div class="tjcg_top_main_right_top_right fl"><img src="images/76.jpg" style="margin-left:5px; margin-top:5px;" /></div>
				</div>
				<div class="tjcg_top_main_right_main l">工作地址：白石村附近</div>
				<div class="tjcg_top_main_right_bottom l">
				    <div class="tjcg_top_main_right_bottom_left fl">参考工资：</div>
					<div class="tjcg_top_main_right_bottom_right fl">5000元/月</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tjcg_bottom">查看更多</div>
</div>


        </div> 
        
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




</body>
</html>