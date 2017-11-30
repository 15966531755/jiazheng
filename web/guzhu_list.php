<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 

$tid = empty($tid) ? 0 : intval($tid);
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
<title>雇主发布</title>
<link rel="stylesheet"  href="templates/default/style/css.css" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>



<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

</head>

<body>


<div id="vivo-head">
	<div class="vivo-search">
		<div class="search-box">
			<form name="search" id="search" method="post" action="http://www.ygayi.com/web/goods.php">
				<input type="text" placeholder="" name="keywords" id="keywords" class='data_q' autocomplete="off"><button>搜索</button>
			</form>
		</div>
	</div>
	
    
    <div class="guzhu_top">
	<p class="fl">雇主发布</p>
    <div class="sear01 fr">
    <div class="vivo-nav cl">
		<div class="search-user">
    <a href="#" class="search"><img src="web_images/index-search.png"></a>
    </div></div>
    </div>
</div>

</div>




<div class="guzhu_con_box">
	<div class="guzhu_con">
    	<ul>
        
        <? 

$sql = "SELECT * FROM `#@__ksyy`   ORDER BY id DESC ";



       $dopage->GetPage($sql,8);
				while($row = $dosql->GetArray()){?>

        	<li>
            	<div class="gz01"><span>需求：<a><? echo $row['gz'];?></a></span>雇主：<? echo $row['name'];?> </div>
                
                    <? 
		if($row['city']){
	$row_c = $dosql->GetOne("SELECT * FROM `city` WHERE cityid=".$row['city']);
	}
	if($row['area']){
	$row_a = $dosql->GetOne("SELECT * FROM `area` WHERE areaid=".$row['area']);
	}
	
		$row_t1 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid != 0 and molds = 44");
	$row_t2 = $dosql->GetOne("SELECT total FROM `#@__userfavorite` WHERE aid=".$row['id']." and uid = 0 and molds = 44");
	if($row_t1){
	$total1 = $row_t1['total'];
	}
	else{$total1 = 0;}
	if($row_t2){
	$total2 = $row_t2['total'];
	}else{$total2 = 0;}
	$total = $total1+$total2;
			?>
                <div class="gz02">
                地址：
               
             <? if (!empty($row_c)){ if($row['city'] != "" and $row_c['city'] != ""){echo $row_c['city'];}?><? if( $row['area'] != "" and $row_a['area'] != ""){echo $row_a['area'];}}?>
                
                </div>
                <div class="gz03">可接收工资：<span><? echo $row['xinzi'];?></span></div>
                <div class="gz04"><a href="guzhu.php?id=<? echo $row['id'];?>">查看</a></div>
            </li>
           <? }?>
        </ul>
    </div>
     <? echo $dopage->GetList_web();?>
     <div class="blank"></div>
</div>

    <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>