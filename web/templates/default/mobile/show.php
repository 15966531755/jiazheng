<?php	if(!defined('IN_MOBILE')) exit('Request Error!'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<?php echo GetHeader(1,$cid,$id); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="HandheldFriendly"content="true"/>
<meta name="format-detection"content="telephone=no">
<meta http-equiv="x-rim-auto-match"content="none"/>
<link href="templates/default/style/css.css" rel="stylesheet" type="text/css">
<link href="templates/default/style/mobile.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script>
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
<link href="search/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="search/js/jquery.min.js"></script>
<script type="text/javascript" src="search/js/vivo-common.js"></script>

</head>
<body>
<? if ($cid != 21){?>

<div class="content">
		
		<!-- 栏目内容 -->
		<?php
		$row = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		if(!empty($row['id']))
		{
		?>
		<div class="pubBox">
			<div class="hd">
				<h2><?php echo $row['classname']; ?></h2>
			</div>
			<div class="ft">
            	<div class="subCont">
				<?php
				switch($row['infotype'])
				{
					case 1:
						$tbname = '#@__infolist';
					break;
					case 2:
						$tbname = '#@__infoimg';
					break;
				
					
				}
				//增加一次点击量
				$dosql->ExecNoneQuery("UPDATE `$tbname` SET hits=hits+1 WHERE `id`=$id");
				$row = $dosql->GetOne("SELECT * from `$tbname` WHERE `id`=$id");
				?>
				
					<h1 class="title"><?php echo $row['title']; ?></h1>
				
				<div class="continfo"><span>更新时间：</span><?php echo GetDateTime($row['posttime']); ?></div>
				<?php
				if($tbname == '#@__infoimg' &&
				   $row['picurl'] != '')
				{
				?>
					<div class="contimg"><a href="<?php echo $row['picurl']; ?>" target="_blank"><img src="<?php echo $row['picurl']; ?>" onerror="this.src='images/nofoundpic.gif'" /></a></div>
				<?php
				}
				?>
                <div class="conttxt">
				<?php
				if($row['content'] != '')
					echo GetContPage(str_replace('height','',str_replace('width','',$row['content'])));
				else
					echo '网站资料更新中...';
				?>
                </div>
                </div>
			</div>
		</div>
		<?php
		}
		?>
	</div>

<? }else{?>

<div id="vivo-head">
	<div class="vivo-search">
		<div class="search-box">
			<form name="search" id="search" method="post" action="http://www.ygayi.com/web/goods.php">
				<input type="text" placeholder="" name="keywords" id="keywords" class='data_q' autocomplete="off"><button>搜索</button>
			</form>
		</div>
	</div>
    
	<?php
		$row = $dosql->GetOne("SELECT * FROM `#@__infoclass` WHERE id = $cid AND checkinfo = 'true' ORDER BY orderid ASC");
		if(!empty($row['id']))
		{
		?>
<div class="detail_top">

	<p class="fl"><?php echo $row['classname']; ?></p>
    
    
    <div class="sear01 fr">
    <div class="vivo-nav cl">
		<div class="search-user">
    <a href="#" class="search"><img src="web_images/index-search.png"></a>
    </div></div>
    </div>
</div>
    

</div>


<div class="detail_box">

		<?php
				switch($row['infotype'])
				{
					case 1:
						$tbname = '#@__infolist';
					break;
					case 2:
						$tbname = '#@__infoimg';
					break;
						case 4:
						$tbname = '#@__goods';
					break;
				}
				//增加一次点击量
				$dosql->ExecNoneQuery("UPDATE `$tbname` SET hits=hits+1 WHERE `id`=$id");
				$row = $dosql->GetOne("SELECT * from `$tbname` WHERE `id`=$id");
				$counts = $dosql->GetOne("SELECT sum(total) as count FROM `#@__userfavorite` WHERE aid=".$id);
					if($counts['count']){
					$count = $counts['count'];
					}else{
						$count = 0;
						}
				?>
				
                  <form action="q_reservations.php" method="post" name="myforms" id="myforms">
                 <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
        <input type="hidden" name="goods_id" id="goods_id" value="<? echo $id;?>" />
        <input type="hidden" name="classid"  id="classid" value="<? echo $row['classid']; ?>" />
         <input type="hidden" name="bianhao" id="bianhao" value="<? echo $row['bianhao'];?>" />
          <input type="hidden" name="typeid" id="typeid" value="<? echo $row['typeid'];?>" />
           <input type="hidden" name="amount" id="amount" value="<? echo $row['xinchou'];?>" />
        <input type="hidden" name="jingliren" id="jingliren" value="<? echo $row['brandpstr'];?>" />
        </form>
	<div class="detail">
        <div class="de_id">
            <div class="id_img_box fl"><div class="id_img"><img src="/<? echo $row['picurl']?>"></div></div>
            <div class="id_ab fr">
           	  <div class="id01"><p><? echo $row['title'];?></p><img src="web_images/aytj_level.png"></div>
              <div class="id02"><p>工作经验</p><? echo $row['cyjy'];?></div>
              <div class="id03"><ul><li style="color:#ff6600;"><? echo $row['typename'];?></li></ul></div>
                <div class="id04">期待薪资<? echo $row['xinchou'];?>元/月</div>
                
                   <div class="id05_right" style="margin-bottom:5px;">
                    	<a style="cursor:pointer;" onclick="login()">预约</a>
                    </div>
                    
                <div class="id05">
                	<div class="id05_left fl" style="width:100%;">
                		<div class="id05_coll"> <a href="javascript:;" onclick="<? if(isset($_COOKIE['username'])){?>AddUserFavorite(<? echo $row['id'];?>,<? echo $row['classid'];?>,<? echo $row['typeid'];?>) <? }else{?> AddFavorite()<? }?>">收藏</a>(<? echo $count;?>)</div>
                        <div class="id05_fx"><p>分享:</p>
                        <!-- JiaThis Button BEGIN -->
<div class="jiathis_style" style="">
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
        </div>
        
        <div class="de_dangan"><p><? echo $row['description'];?></p><h2><a href="product.php?keyword=<? echo $row['bianhao']?>" target="_blank">查看诚信档案 >></a></h2></div>

		<div class="infor">
        	<div class="infor_tlt"><h3>基本信息</h3></div>
            <div class="infor_con">
            	<div class="incon_left fl">
                	<ul>
                    	<li><span>姓名</span><? echo $row['title'];?></li>
                        <li><span>编号</span><? echo $row['bianhao'];?></li>
                        <li><span>年龄</span><? echo $row['nianling'];?></li>
                        <li><span>住址</span><? echo $row['jzdz'];?></li>
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
                <div class="incon_right fl">
                	<ul>
                    	<li title="<? echo $row['qzyx'];?>"><span>求职意向</span><? echo $row['qzyx'];?></li>
                        <li><span>最低薪酬</span><? echo $row['xinchou'];?>元</li>
                        <li><span>工作经验</span><? echo $row['cyjy'];?></li>
                        <li><span>工作时间</span><? echo $row['gzsj'];?></li>
                        <li><span>工作状态</span>
                        	<? 
							if($row['gzzt'] == 0)
							echo "待聘";
							else if($row['gzzt'] == 1)
							echo "已聘";
							?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="skill">
        	<div class="skill_tlt"><h3>掌握技能</h3></div>
            <div class="skill_con">
            	<div class="skill01">
                	<p class="fl">母婴护理：</p>
                    <span class="fl">
                    <?php
			$jineng1arr = explode(',',$row['jineng1']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=1 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng1arr))
				{
					echo $r['jinengname']."&nbsp;";
				}

				
			}
			?>
                    </span>
                </div>
                <div class="skill02">
                	<p class="fl">婴幼儿护理：</p>
                    <span class="fl">
                      <?php
			$jineng2arr = explode(',',$row['jineng2']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=2 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng2arr))
				{
					echo $r['jinengname'].'&nbsp;';
				}

				
			}
			?>
                    </span>
                </div>
                <div class="skill03">
                	<p class="fl">乳房护理：</p>
                    <span class="fl">
                      <?php
			$jineng3arr = explode(',',$row['jineng3']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=3 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng3arr))
				{
					echo $r['jinengname'].'&nbsp;';
				}

				
			}
			?>
                    </span>
                </div>
                <div class="skill04">
                	<p class="fl">家政服务：</p>
                    <span class="fl">
                    
                           <?php
			$jineng4arr = explode(',',$row['jineng4']);

			$dosql->Execute("SELECT * FROM `#@__goodsjn` where parentid=4 ORDER BY orderid ASC");
			while($r = $dosql->GetArray())
			{
				

				if(in_array($r['jineng'],$jineng4arr))
				{
					echo $r['jinengname'].'&nbsp;';
				}

				
			}
			?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="exp">
        	<div class="exp_tlt"><h3>工作履历</h3></div>
           <? echo $row['gzll'];?>
        </div>
    </div>
  
</div>
  <?php
		}}
		?>
<?php require_once('footer.php'); ?>
</html>