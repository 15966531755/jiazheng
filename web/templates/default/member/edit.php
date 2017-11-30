<?php if(!defined('IN_MEMBER')) exit('Request Error!'); 
//获取用户信息
$r_user = $dosql->GetOne("SELECT * FROM `#@__member` WHERE username='$c_uname'");

//当记录出现错误，强制跳转登陆页
if(!isset($r_user) or !is_array($r_user))
	header('location:?c=login');
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
<title><?php echo $cfg_webname; ?> - 会员中心 - 编辑资料</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>
</head>

<body>
<div class="myorder_top">
	<p>会员设置</p>
</div>

<div class="set_box">

<form name="form" id="form" method="post" action="?a=saveedit" onSubmit="return cfm_upmember();">
	<div class="set">
    
    	<div class="set_img">
        	<div class="set_pho fl"><img src="/<? echo $r_user['thumb'];?>"></div>
            <div class="set_ph fl"><a href="?c=avatar">修改头像</a></div>
        </div>
        
        
       <div class="pece01"><p>·&nbsp;账号设置</p></div>
        
        <div  style="background: #fff;padding: 0 5%;padding-top: 15px;">
    	<div class="set01">
        	<p>账号：</p>
          	<div class="set_in1"><input type="text"  value="<? echo $c_uname;?>"></div>
        </div>
        
        <div class="set01">
        	<p>邮箱：</p>
          	<div class="set_in1"> <input type="text" name="email" id="email" value="<?php echo $r_user['email']; ?>" /></div>
        </div>
       
        
        <div class="set01">
        	<p>旧密码：</p>
          	<div class="set_in1"><input  name="oldpassword" type="password" id="oldpassword"></div>
        </div>
        
        <div class="set01">
        	<p>新密码：</p>
          	<div class="set_in1"><input  name="password" type="password" id="password"></div>
        </div>
        
        <div class="set01">
        	<p>确认：</p>
          	<div class="set_in1"><input name="repassword" type="password" id="repassword"></div>
        </div>
        
         
        
         <div class="set01">
        	<p>提问：</p>
          	<div class="set_in1">
            
            <select name="question" id="question" style="width: 120%;font-family: '微软雅黑';font-size: 14px;margin: 0px;padding: 0px;border: none;background: none;outline: none;color: #666;" >
						<?php
						$dosql->Execute("SELECT * FROM `#@__cascadedata` WHERE `datagroup`='question' AND level=0 ORDER BY orderid ASC, datavalue ASC");
						while($row = $dosql->GetArray())
						{
							if($r_user['question'] == $row['datavalue'])
								$selected = 'selected="selected"';
							else
								$selected = '';
		
							echo '<option value="'.$row['datavalue'].'" '.$selected.'>'.$row['dataname'].'</option>';
						}
						?>
						</select>
            </div>
        </div>
        
        
        <div class="set01">
        	<p>回答：</p>
          	<div class="set_in1">
            <input type="text" name="answer" id="answer"  value="<?php echo $r_user['answer']; ?>" />
            </div>
        </div>
        
        	
        </div>
        
      
         
         <div class="pece_box">
	<div class="pece01"><p>·&nbsp;个人资料</p></div>
	<div class="pece">
    	<div class="pece02"><p>姓名：</p><div class="pece_in02 fl"><input type="text" name="cnname" id="cnname" value="<?php echo $r_user['cnname']; ?>"></div></div>
        <div class="pece03">
        	<p>性别：</p>
            <div class="pece_se01">
            <input name="sex" type="radio" value="0" <?php if($r_user['sex'] == '0') echo 'checked="checked"'; ?> />
						男&nbsp;
						<input name="sex" type="radio" value="1" <?php if($r_user['sex'] == '1') echo 'checked="checked"'; ?> />
						女
            </div>
        </div>
        <div class="pece04">
        	<p>地址：</p>
            <div class="pece_se02">
            	<ul>
                <li style="width:37%; margin-bottom:15px; margin-right:5%;" class="curA">
                <select name="address_prov" id="address_prov" onChange="SelProv(this.value,'address');">
            <option value="-1">请选择</option>
							<?php
							$dosql->Execute("SELECT * FROM `#@__cascadedata` WHERE `datagroup`='area' AND level=0 ORDER BY orderid ASC, datavalue ASC");
							while($row = $dosql->GetArray())
							{
								if($r_user['address_prov'] === $row['datavalue'])
									$selected = 'selected="selected"';
								else
									$selected = '';
		
								echo '<option value="'.$row['datavalue'].'" '.$selected.'>'.$row['dataname'].'</option>';
							}
							?>
                </select>
                </li>
                <li style="width:37%; margin-bottom:15px;" class="curA">
                <select name="address_city" id="address_city" onChange="SelCity(this.value,'address');">
           <option value="-1">--</option>
							<?php
							$dosql->Execute("SELECT * FROM `#@__cascadedata` WHERE `datagroup`='area' AND level=1 AND datavalue>".$r_user['address_prov']." AND datavalue<".($r_user['address_prov'] + 500)." ORDER BY orderid ASC, datavalue ASC");
							while($row = $dosql->GetArray())
							{
								if($r_user['address_city'] === $row['datavalue'])
									$selected = 'selected="selected"';
								else
									$selected = '';
		
								echo '<option value="'.$row['datavalue'].'" '.$selected.'>'.$row['dataname'].'</option>';
							}
							?>
                </select>
                </li>
                <li style="width:37%; margin-bottom:15px; margin-right:5%;" class="curA">
                <select name="address_country" id="address_country">
             	<option value="-1">--</option>
							<?php
							$dosql->Execute("SELECT * FROM `#@__cascadedata` WHERE `datagroup`='area' AND level=2 AND datavalue LIKE '".$r_user['address_city'].".%%%' ORDER BY orderid ASC, datavalue ASC");
							while($row = $dosql->GetArray())
							{
								if($r_user['address_country'] === $row['datavalue'])
									$selected = 'selected="selected"';
								else
									$selected = '';
		
								echo '<option value="'.$row['datavalue'].'" '.$selected.'>'.$row['dataname'].'</option>';
							}
							?>
                </select>
                </li>
                <li style="width:50%;" class="curB"><input name="address" id="address" type="text" value="<?php echo $r_user['address']; ?>"></li>
                </ul>
            </div>
        </div>
        
        <div class="pece02"><p>手机号：</p><div class="pece_in02 fl"><input type="text" name="mobile" id="mobile"  value="<?php echo $r_user['mobile']; ?>"></div></div>
        
       
    </div>
</div>

         
        
       <input type="submit" class="btn" value="确认保存" />
        
    </div>
    <input type="hidden" name="action" id="action" value="update" />
				<input type="hidden" name="id" id="id" value="<?php echo $r_user['id']; ?>" />
   </form>
</div>

<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->

</body>
</html>