<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 5 : intval($cid);
$tid = empty($tid) ? 5 : intval($tid);
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
<?php echo GetHeader(1,$cid); ?>

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>
<script type="text/javascript" src="templates/default/js/jquery.1.4.2-min.js"></script>
    <script src="templates/default/js/mz-packed.js" type="text/javascript"></script>
     <link rel="stylesheet" href="MagicZoom.css" type="text/css" media="screen" />

<script type="text/javascript">
$(function(){
    $(".product_list li img").LoadImage({width:220,height:150});
});


function tijiao(){
	document.search.submit();
	
	}
	
	function login(){
	 var username = document.getElementById("username").value;
	
	  if(username == ""){
						window.location.href="member.php?c=login&url=q_reservation.php";
						   return false;
						   }
						   window.location.href="q_reservation.php";
	}
</script>
</head>
<body>
<div class="register_top">
	<p>诚信档案</p>
</div>

<div class="integ_box">
	<div class="integ">
    	<div class="integ01">
        	<p>输入阿姨姓名或者编号，查询阿姨档案</p>
        </div>
        
        <form name="searchs" id="searchs" method="get" action="product.php">
        <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
        <div class="integ02">
        	<input type="text" name="keyword" id="keyword">
            
           
        	<div class="integ_img fr"> <button type="submit" id="search_btn"  style=" background-image:url(web_images/integrity_search_03.png); background-repeat:no-repeat; background-size: 37px; float:right;width:60%; height:34px;  border:none; cursor:pointer;"></button></div>
        </div>
        </form>
        
        
        
        
        
        
        
        
        
        
          <?php
				if(!empty($keyword))
				{
					$keyword = htmlspecialchars($keyword);

					$dopage->GetPage("SELECT * FROM `#@__goods` WHERE  (title='".$keyword."' or bianhao ='".$keyword."') AND delstate='' AND checkinfo=true");
				}
				

				
				while($row = $dosql->GetArray())
				{
					
				?>
        
        
        <div class="record_box">
	<div class="record">
    	<div class="record_pho">
        	<div class="record_pic fl"><div class="record_p"><img src="/<? echo $row['picurl'];?>"></div></div>
            <div class="rz fl"><img src="web_images/integrity_records_01.png"></div>
        </div>
        
        <div class="rec_info">
        	<div class="info01">
            	<div class="info01_l fl">
                <ul>
                <li><span>姓名</span><? echo $row['title'];?></li>
                <li><span>民族</span><? echo $row['minzu'];?></li>
                <li><span>身高</span><? echo $row['height'];?>cm</li>
                <li><span>学历</span>
                	<?
							 if($row['xueli'] == 1)
							 echo "本科";
							 else if($row['xueli'] == 2)
							 echo "大专";
							  else if($row['xueli'] == 3)
							 echo "中专";
							  else if($row['xueli'] == 4)
							 echo "高中";
							  else if($row['xueli'] == 5)
							 echo "初中";
							  else
							 echo "小学";
								 
								 ?>
                </li>
                </ul>
                </div>
                <div class="info01_r fl">
                <ul>
                <li><span>出生日期</span><? echo $row['birthday'];?></li>
                <li><span>健康状况</span><? echo $row['jkzk'];?></li>
               
                <li><span>从业经验</span><? echo $row['cyjy'];?></li>
                </ul>
                </div>
            </div>
            
              <div class="info02"><span>求职意向</span><? echo $row['qzyx'];?></div>
            <div class="info02"><span>籍贯</span><? echo $row['jg'];?></div>
            <div class="info03"><span>居住地址</span><? echo $row['jzdz'];?></div>
            
        </div>
        
        <div class="rec_file">
        	<!--<div class="rec_tlt">
            	<ul><li>证件和证书</li><li>客户评价</li></ul><div id="blank">&nbsp;&nbsp;</div>
            </div>-->
            
            <div class="file01">
            	<div class="f1_l fl"><img src="web_images/integrity_records_02.png"></div>
                <div class="f1_r fr"><img src="/<?php echo $row['sfz']; ?>"></div>
            </div>
            
            <div class="file02">
            	<div class="f2_l fl"><img src="web_images/integrity_records_04.png"></div>
                <div class="f2_r fr"><img src="/images/72.jpg"></div>
            </div>
            
            <div class="file03">
            	<div class="f3_l fl"><img src="web_images/integrity_records_06.png"></div>
                <div class="f3_r fr">
                 <?php
		
					if($row['picarrs'] != '')
					{
						$picarrs = unserialize($row['picarrs']);
						foreach($picarrs as $v)
						{
							$v = explode(',', $v);
							?>
						<img src="/<? echo $v[0];?>"/>
						<?
                        }
					}
				
					?>
                </div>
            </div>
            
            <div class="file04">
            	<div class="f4_l fl"><img src="web_images/integrity_record08_03.png"></div>
                <div class="f4_r fr">
                 <marquee onMouseOver=this.stop() 
onMouseOut=this.start() scrollamount=2 
scrolldelay=2 direction=up width=100% 
height=180> <? echo $row['zwpj'];?> 
</marquee>
                </div>
            </div>
        </div>
        
    </div>
</div>

    	<?php
				}
				?>
  

<div class="integ03" style="margin-top:20px; margin-bottom:20px;">
        	<div class="integ_img1 fl"><img src="web_images/integrity_search_time.png"></div>
        	<div class="integ_fr fl">
        		<p>我要找阿姨</p>
        		<span>为了节省您的时间您可以直接填写预订信息</span>
       	 	</div>
        </div>

        
        <div class="integ04" style="margin-bottom:20px;"><a style="cursor:pointer;" onclick="login()">快速预订</a></div>
        
    </div>
</div>


<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>