<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 


$aid = empty($aid) ? "" : $aid;
$tid = empty($tid) ? 200 : $tid;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找工作</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script>

	  function gz_xu(){
			   document.getElementById("gz_xu").style.display="block";
			   }
			   
			   function gz_close_xu(a){
				   document.getElementById("Craft").value=a;
				   document.getElementById("gz_xu").style.display="none";
				   }
				   
				   
				
</script>
</head>

<body>
<!-- header-->
<?php require_once('header_inner.php'); ?>
<!-- /header-->


<div id="page" style="padding-bottom:30px;">
<h1 style="color: #249428;font-weight: bold;font-size: 1.8em;margin: 15px 0 20px 10px;">找工作</h1>


<?
 $row = $dosql->GetOne("SELECT * FROM `#@__ksyy` WHERE id=$aid");

?>

<div class="textbox" style="padding:30px 50px;">

<form name="myform" action="job_save.php" method="post" novalidate="novalidate"> 
       
        <div class="form_field">
            <label>申请工作：</label>
            <div class="input">
                <input type="hidden" name="OrderID" id="OrderID" value="<? echo $row['id'];?>">
                  <input type="hidden" name="gongzuo" id="gongzuo" value="<? echo $row['name'];?><? echo "&nbsp;";?><? echo $row['gz'];?>">
                    <input type="hidden" name="username" id="username" value="<? if(isset($_COOKIE['username'])){echo AuthCode($_COOKIE['username']);}?>"/>
                <ul id="persons">
                    <li>
                    <a href="guzhu.php?id=<? echo $row['id'];?>" target="_blank"><? echo $row['name'];?><? echo "&nbsp;";?><? echo $row['gz'];?></a>
                    <img data-value="1a38be55-1c30-4f76-adda-710a22488bc1" src="images/alert_close.png" width="11" height="11" alt="移除" title="移除" style="cursor:pointer">
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
            <input onclick="gz_xu()" class="text readonly"  id="Craft" maxlength="50" name="Craft" readonly="readonly" type="text" value="">
            

            <span class="field-validation-valid" data-valmsg-for="Craft" data-valmsg-replace="true"></span>
        </div> 
        
        <div  id="gz_xu"  class="pop_bra2"  style="position: absolute;
border: 1px solid #0BA762;display:none;margin-left:105px; *margin-left:-185px;margin-top:-4px;width:286px;background: #fff;" >
              <ul >
              <?php 
	$dosql->Execute("select * from `#@__goodstype` order by id");
	
	while($row = $dosql->GetArray()){
		

?>
               <li style="cursor:pointer; width:284px;" onclick="gz_close_xu('<? echo $row['classname'];?>')"><? echo $row['classname'];?></li>
            <? }?>
               </ul>
             </div>      
        <div class="under_helper">请选择您想要从事的工种。</div>
    </div>
    <div class="form_field">
        <label for="Salary">期望工资：</label>
        <div class="input">
            <span>￥</span>
            <input class="text" id="Salary" name="Salary" style="width:80px;" type="text" value="0">
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
    <div class="form_field">
        <div class="input">
                <input type="button" onclick="tijiao()" class="button" value="同意用户协议并提交">
                &nbsp; &nbsp; <a href="contact-49-1.html" target="_blank">《阳光阿姨用户协议》</a>        </div>
    </div>
</form>
</div>







    </div>
        <!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>