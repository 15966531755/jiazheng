<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 12 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="53212523576171116375" />

<?php echo GetHeader(1,$cid,$id); ?>
<link href="style.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="templates/default/style/normalize.css" />
<link rel="stylesheet" type="text/css" href="templates/default/style/star-rating-svg.css">
<link rel="stylesheet" type="text/css" href="templates/default/style/demo.css">

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>


<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jqzoom.js"></script>
<script type="text/javascript" src="js/base.js"></script>

		<script type="text/javascript">
	function AddFavorite(){
	
			alert("加入收藏失败，请登录！");
			window.location.href="member.php?c=login";
	
}

function login(){
	 var username = document.getElementById("username").value;
	 var id = document.getElementById("goods_id").value;
	  var bianhao = document.getElementById("bianhao").value;
	    var typeid = document.getElementById("typeid").value;
	  if(username == ""){
						window.location.href="member.php?c=login";
						   return false;
						   }
						  document.myforms.submit();
	}
		</script>
</head>
<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header--> 
<div class="ayxx v">
    <div class="ayxx_main">
    
    	<?php
			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			
			if(@$r)
			{
			//增加一次点击量
			$dosql->ExecNoneQuery("UPDATE `#@__goods` SET hits=hits+1 WHERE id=$id");
			$row = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			
			//print_r($row);exit;
			?>
               <form action="q_reservations.php" method="post" name="myforms" id="myforms">
	    <div class="ayxx_main_left fl">
     
          <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
        <input type="hidden" name="goods_id" id="goods_id" value="<? echo $id;?>" />
         <input type="hidden" name="bianhao" id="bianhao" value="<? echo $row['bianhao'];?>" />
          <input type="hidden" name="typeid" id="typeid" value="<? echo $row['typeid'];?>" />
           <input type="hidden" name="amount" id="amount" value="<? echo $row['xinchou'];?>" />
        <input type="hidden" name="jingliren" id="jingliren" value="<? echo $row['brandpstr'];?>" />
		    <div class="ayxx_main_left1">
            
            <div class="ayxx_main_left1_left fl">
            
            <div id="preview" class="spec-preview"> <span class="jqzoom"><img onload="javascript:DrawImage(this,'308','292');" jqimg="<? echo $row['picurl'];?>" src="<? echo $row['picurl'];?>" width="308" height="292" /></span> </div>
            <div class="spec-scroll"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
  <div class="items">
    <ul>
      <li class=" "><img  bimg="<? echo $row['picurl'];?>" src="<? echo $row['picurl'];?>" onmousemove="preview(this);" width="50" height="50"></li>
     <? 	if(!empty($row['picarr']))
				{
					$picarr = unserialize($row['picarr']);
					$picarrBig = explode(',',$picarr[0]);
					
					foreach($picarr as $v)
						{
							$picarrSmall = explode(',',$v);
				?>
                
      <li class=" "><img  bimg="<?php echo $picarrSmall[0]; ?>" src="<?php echo $picarrSmall[0]; ?>" onmousemove="preview(this);" width="50" height="50"></li>
      <? }}?>
      
    </ul>
  </div>
</div>
            </div>
			    
                
                
                
				<div class="ayxx_main_left1_right fr">
				    <div class="ayxx_main_left1_right1">
					    <div class="ayxx_main_left1_right1_main">
						    <div class="ayxx_main_left1_right1_main1 fl zt9 l">姓名</div>
							<div class="ayxx_main_left1_right1_main2 fl zt10 l"><? echo $row['title'];?></div>
							<div class="ayxx_main_left1_right1_main3 fl zt9 l">求职意向</div>
							<div class="ayxx_main_left1_right1_main4 fr zt10 l" style="overflow:hidden;" title="<? echo $row['qzyx'];?>"><? echo $row['qzyx'];?></div>
						</div>
						<div class="ayxx_main_left1_right1_main">
						    <div class="ayxx_main_left1_right1_main1 fl zt9 l">编号</div>
							<div class="ayxx_main_left1_right1_main2 fl zt10 l"><? echo $row['bianhao'];?></div>
							<div class="ayxx_main_left1_right1_main3 fl zt9 l">最低薪酬</div>
							<div class="ayxx_main_left1_right1_main4 fr zt10 l"><? echo $row['xinchou'];?></div>
						</div>
						<div class="ayxx_main_left1_right1_main">
						    <div class="ayxx_main_left1_right1_main1 fl zt9 l">年龄</div>
							<div class="ayxx_main_left1_right1_main2 fl zt10 l"><? echo $row['nianling'];?></div>
							<div class="ayxx_main_left1_right1_main3 fl zt9 l">工作经验</div>
							<div class="ayxx_main_left1_right1_main4 fr zt10 l"><? echo $row['cyjy'];?></div>
						</div>
						<div class="ayxx_main_left1_right1_main">
						    <div class="ayxx_main_left1_right1_main1 fl zt9 l">住址</div>
							<div class="ayxx_main_left1_right1_main2 fl zt10 l"><? echo $row['jzdz'];?></div>
							<div class="ayxx_main_left1_right1_main3 fl zt9 l">工作时间</div>
							<div class="ayxx_main_left1_right1_main4 fr zt10 l"><? echo $row['gzsj'];?></div>
						</div>
						<div class="ayxx_main_left1_right1_main">
						    <div class="ayxx_main_left1_right1_main1 fl zt9 l">学历</div>
							<div class="ayxx_main_left1_right1_main2 fl zt10 l">
							
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
                            
                            </div>
							<div class="ayxx_main_left1_right1_main3 fl zt9 l">工作状态</div>
							<div class="ayxx_main_left1_right1_main4 fr zt10 l">
							<? 
							if($row['gzzt'] == 0)
							echo "待聘";
							else if($row['gzzt'] == 1)
							echo "已聘";
							?>
                            
                            </div>
						</div>
					</div>
					<div class="ayxx_main_left1_right2 l zt9" style="overflow:hidden;" title="<? echo $row['description'];?>"><? echo $row['description'];?></div>
					<div class="ayxx_main_left1_right3">
					    <div class="ayxx_main_left1_right3_left fl"><a style="cursor:pointer;" onclick="login()" ><img src="images/58.jpg" /></a></div>
						<div class="ayxx_main_left1_right3_right fr"><a href="product.php?keyword=<? echo $row['bianhao']?>" target="_blank"><img src="images/59.jpg" /></a></div>
					</div>
					<div class="ayxx_main_left1_right4">
					    <div class="ayxx_main_left1_right4_left fl">
                        <a href="javascript:;" onclick="<? if(isset($_COOKIE['username'])){?>AddUserFavorite(<? echo $row['id'];?>,<? echo $row['classid'];?>,<? echo $row['typeid'];?>) <? }else{?> AddFavorite()<? }?>">
                        <img src="images/60.jpg" />
                        </a>
                        </div>
						<div class="ayxx_main_left1_right4_right fr">
						    <div class="ayxx_main_left1_right4_right_left fl">分享：</div>
							<!-- JiaThis Button BEGIN -->
<div class="jiathis_style" style="margin-top:10px;">
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_weixin"></a>
	<a class="jiathis_button_renren"></a>
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
	<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
						</div>
					</div>
				</div>
			</div>
			<div class="ayxx_main_left2" style="height:auto; float:left;">
			    <div class="ayxx_main_left2_top l" style="float:left;">掌握技能</div>
				<div class="ayxx_main_left2_bottom" style="float:left;">
				    <!-- 母婴护理-->
				<div class="ayxx_main_left2_main">
					    <div class="ayxx_main_left2_main_left fl r zt9" style="text-align:left; height:32px;">母婴护理：</div>
						<div class="ayxx_main_left2_main_right fr l">
                        
                           <?php
			$jineng1arr = explode(',',$row['jineng1']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=1 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng1arr))
				{
					echo '  <div class="ayxx_main_left2_main_right_logo fl c"><img src="images/71.jpg" style="margin-top:9px;"/></div>
					
					<div class="ayxx_main_left2_main_right_main fl zt10" style="line-height:30px;">'.$r['jinengname'].'</div>
					
					';
				}

				
			}
			?>
						</div>
					</div>
                     <!-- 母婴护理-->
                    
                    <!--婴幼儿护理-->
                    <div class="ayxx_main_left2_main">
					    <div class="ayxx_main_left2_main_left fl r zt9" style="text-align:left;height:32px;">婴幼儿护理：</div>
						<div class="ayxx_main_left2_main_right fr l">
                        
                           <?php
			$jineng2arr = explode(',',$row['jineng2']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=2 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng2arr))
				{
					echo '  <div class="ayxx_main_left2_main_right_logo fl c"><img src="images/71.jpg" style="margin-top:9px;"/></div>
					
					<div class="ayxx_main_left2_main_right_main fl zt10" style="line-height:30px;">'.$r['jinengname'].'</div>
					
					';
				}

				
			}
			?>
						</div>
					</div>
                      <!--婴幼儿护理-->
                    
                    <div class="ayxx_main_left2_main">
					    <div class="ayxx_main_left2_main_left fl r zt9" style="text-align:left;height:32px;">乳房护理：</div>
						<div class="ayxx_main_left2_main_right fr l">
                        
                           <?php
			$jineng3arr = explode(',',$row['jineng3']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=3 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng3arr))
				{
					echo '  <div class="ayxx_main_left2_main_right_logo fl c"><img src="images/71.jpg" style="margin-top:9px;"/></div>
					
					<div class="ayxx_main_left2_main_right_main fl zt10" style="line-height:30px;">'.$r['jinengname'].'</div>
					
					';
				}

				
			}
			?>
						</div>
					</div>
                    
                    
                    
                    <div class="ayxx_main_left2_main">
					    <div class="ayxx_main_left2_main_left fl r zt9" style="text-align:left;height:32px;">家政服务：</div>
						<div class="ayxx_main_left2_main_right fr l">
                        
                           <?php
			$jineng4arr = explode(',',$row['jineng4']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=4 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng4arr))
				{
					echo '  <div class="ayxx_main_left2_main_right_logo fl c"><img src="images/71.jpg" style="margin-top:9px;"/></div>
					
					<div class="ayxx_main_left2_main_right_main fl zt10" style="line-height:30px;">'.$r['jinengname'].'</div>
					
					';
				}

				
			}
			?>
						</div>
					</div>
                    
                    
                    
                    
                    
					
				</div>
			</div>
			<!--<div class="ayxx_main_left3">
			    <div class="ayxx_main_left3_top l">自我评价</div>
				<div class="ayxx_main_left3_bottom l" style="overflow:hidden;" >
                <? echo $row['zwpj'];?>
                
                </div>
			</div>-->
			<div class="ayxx_main_left4">
			    <div class="ayxx_main_left4_top l" style="float:left;">工作履历</div>
				<div class="ayxx_main_left4_bottom" style="overflow:hidden; float:left;">
					<? echo $row['gzll'];?>
				</div>
				<div class="ayxx_main_left4_evaluate_me" style="overflow:hidden; float:left;">
					<div class="my-rating jq-stars" style="margin-left: 110px;margin-top: 7px;"></div>
					<form name="form" id="form" action="" method="post">
						<div class="msg" style="margin-top: 7px;">
							<textarea name="comment" id="comment" style="width: 40%;height: 70px;max-height: 70px;max-width: 90%;min-width: 40%;min-height: 70px;margin-left: 20px;">说点什么吧...</textarea>
						</div>
						<div class="toolbar">
							<button class="button" type="button" style="margin-left: 65px;">发 布</button>
						</div>
					</form>
				</div>
		 	</div>
	    </div>
        </form>
        <? }?>
		<div class="ayxx_main_right fr">
		    <div class="ayxx_main_right_top"><img src="images/66.jpg" width="108" height="19" /></div>
			<div class="ayxx_main_right_bottom">
			    
  <? $sql = "SELECT * FROM `#@__goods` WHERE   delstate='' AND checkinfo=true and flag like '%a%'";
  $dopage->GetPage($sql,3);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
  
  ?>
				
				<div class="ayxx_main_right_bottom_main">
				<div id="bfb2"><img src="images/9.png" /></div>
				<a href="<? echo $gourl;?>"><img src="<? echo $row['picurl'];?>" width="110" height="139" /></a>
				</div>
				<? }?>
                
                
			</div>
		</div>
	</div>
</div>
<script src="templates/default/js/jquery.star-rating-svg.js"></script>
<script>
	$(function(){
		$(".my-rating").starRating({
	        initialRating: 4,
	        starSize: 25
    	});
    	$(".button").click(function(){
    		
    	})
	})
</script>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>