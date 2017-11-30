<?php if(!defined('IN_MEMBER')) exit('Request Error!');

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
<title><?php echo $cfg_webname; ?> - 会员中心 - 编辑头像</title>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>

 <style>
            .error {
                font-size: 18px;
                font-weight: bold;
                color: red;
                margin:10px 0
            }
            label{width:60px;display: inline-block}
            .info li{margin:10px 0}
            
        </style>
<script>
function fileSelectHandler() {

    // get selected file
    var oFile = $('#image_file')[0].files[0];

    // hide all errors
    $('.error').hide();
  
 $('.error').html(oFile).show();
    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png|image\/jpg)$/i;
    if (!rFilter.test(oFile.type)) {
        $('.error').html('请选择jpg、jpeg或png格式的图片').show();
        return false;
    }

    // check for file size
    else if (oFile.size > 200 * 1024) {
        $('.error').html('上传图片大于200KB').show();
        return false;
    }
	
	else{
		document.myform.submit();
		}
}
</script>
</head>

<body>
<div class="myorder_top">
	<p>上传头像</p>
</div>

<div class="set_box">
 <?php $_irand=mt_rand(0,1000000); $_SESSION['file']=$_irand; ?>
 <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php?up=up&irand=<?php echo $_irand; ?>" onSubmit="return checkForm()" name="myform">
                 	 <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		
                    	<input type="hidden" name="id" id="id" value="<?php echo $r_user['id']; ?>" />
	<div class="set">
    
    	<div class="set_img">
        	<div class="set_pho fl"><img src="/<? echo $r_user['thumb'];?>"></div>
          
        </div>
        
       
    	<div class="set01">
       	<p>选择文件：</p>
        <input type="file" name="image_file" id="image_file"/>
        </div>
       
       <div class="error">注意：请上传小于200kb图片</div>
        
      <!--  <div class="set01">
       	<p>文件大小：</p>
        <div class="set_in1"><input type="text" id="filesize" name="filesize" /></div>
        </div>
        
        <div class="set01">
       	<p>类型：</p>
        <div class="set_in1"><input type="text" id="filetype" name="filetype" /></div>
        </div>
        
        <div class="set01">
       	<p>图像尺寸：</p>
        <div class="set_in1"><input type="text" id="filedim" name="filedim" /></div>
        </div>
        
        <div class="set01">
       	<p>宽度：</p>
        <div class="set_in1"><input type="text" id="w" name="w" /></div>
        </div>
        
         <div class="set01">
       	<p>高度：</p>
     <div class="set_in1"><input type="text" id="h" name="h" /></div>
        </div>-->
                       
        
        
        
     
          <input type="button" name="send" value=" 点击上传 " id="send" class="btn" onClick="fileSelectHandler();"/>
       <!-- <input type="submit" class="btn" value="上传" />-->
        
    </div>
    
    </form>
</div>



	
	<div class="cl"></div>
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->

</body>
</html>
