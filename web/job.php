<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 


$aid = empty($aid) ? "" : $aid;
$tid = empty($tid) ? 200 : $tid;
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
<link href="style.css" rel="stylesheet" type="text/css" />
<title>找工作</title>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

</head>

<body>

<div class="require_top">
	<p>找工作</p>
</div>

<div id="page" style="padding-bottom:30px;">



<?
 $row = $dosql->GetOne("SELECT * FROM `#@__ksyy` WHERE id=$aid");

?>

<div class="textbox">

<form name="myform" action="job_save.php" method="post" novalidate> 
       
        <div class="form_field">
            <label>申请工作：</label>
            <div class="input">
                <input type="hidden" name="OrderID" id="OrderID" value="<? echo $row['id'];?>">
                  <input type="hidden" name="gongzuo" id="gongzuo" value="<? echo $row['name'];?><? echo "&nbsp;";?><? echo $row['gz'];?>">
                    <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
                <ul id="persons">
                    <li>
                    <a href="guzhu.php?id=<? echo $row['id'];?>" target="_blank"><? echo $row['name'];?><? echo "&nbsp;";?><? echo $row['gz'];?></a>
                    
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    <div class="form_field">
        <label for="Name">真实姓名<span class="required">*</span>：</label>
        <div class="input">
            <input class="text" data-val="true" id="Name"  name="Name" type="text" value="">
            <span class="field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
        </div>
    </div>

<div class="form_field" id="fldMobileVerfiyCode">
    <label for="Mobile">手机号码<span class="required">*</span>：</label>
    <div class="input">
        <input type="text" id="Mobile" name="Mobile" value="" maxlength="20" class="text" data-val="true" >
        <span class="field-validation-valid" data-valmsg-for="Mobile" data-valmsg-replace="true"></span>
    </div>
</div>

  
          


    
    <div class="form_field">
        <label for="Craft">工种<span class="required">*</span>：</label>
        <div class="input">
            <select  name="Craft"  type="text" value="">
               <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id");
	
	while($row = $dosql->GetArray()){
		

?>
            <option value="<? echo $row['classname'];?>"><? echo $row['classname'];?></option>
                <? }?>
            </select>
         
        </div> 
        
              
        <div class="under_helper">请选择您想要从事的工种。</div>
    </div>
    <div class="form_field">
        <label for="Salary">期望工资：</label>
        <div class="input">
            <span>￥</span>
            <input class="text" id="Salary" name="Salary" style="width:40%;" type="text" value="0">
            <span>元&nbsp;/月</span>
            
            <span class="field-validation-valid" data-valmsg-for="Salary" data-valmsg-replace="true"></span>
        </div>
        <div class="under_helper">请填写您能够接受的工资水平。</div>
    </div>
    <div class="form_field">
        <label for="SelfEval">特长：</label>
        <div class="input">
            <textarea cols="20" datamaxsize="200"  id="SelfEval" name="SelfEval" rows="2"></textarea>
            <span class="field-validation-valid" data-valmsg-for="SelfEval" data-valmsg-replace="true"></span>
        </div>    
        <div class="under_helper">请填写您的详细介绍，如:工作经验，技能特长等。还可输入 <strong id="remaincount">200</strong> 个字。</div>
        
    </div>
 
                    <input type="submit" class="btn" value="同意用户协议并提交">
                <div style="margin-left:100px;"><a href="contact.php?cid=49" target="_blank">《阳光阿姨用户协议》</a>  </div>    
</form>
</div>







    </div>
        <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>