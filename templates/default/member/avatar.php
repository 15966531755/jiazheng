<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_webname; ?> - 会员中心 - 编辑头像</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
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
    else if (oFile.size > 2 * 1024 * 1024) {
        $('.error').html('上传图片大于2MB').show();
        return false;
    }
	
	else{
		document.myform.submit();
		}
}
</script>


</head>

<body>
<div class="header">
	<?php require_once(dirname(__FILE__).'/header.php'); ?>
</div>
<div class="mainbody">
	<div class="leftarea">
		<?php require_once(dirname(__FILE__).'/lefter.php'); ?>
	</div>
	<div class="rightarea">
		
		
		<h3 class="subtitle">上传头像</h3>
		  <?php $_irand=mt_rand(0,1000000); $_SESSION['file']=$_irand; ?>
 <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php?up=up&irand=<?php echo $_irand; ?>" onsubmit="return checkForm()" name="myform">
                 	 <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		
                    	<input type="hidden" name="id" id="id" value="<?php echo $r_user['id']; ?>" />
                        	<div class="upavatar">
   <input type="file" name="image_file" id="image_file"/><br />
   </div>
   
     <div class="error">注意：请上传小于2MB图片</div>
   <input type="button" name="send" value=" 点击上传 " id="send" onClick="fileSelectHandler();"/>
  </form>
	</div>
	<div class="cl"></div>
</div>
<div class="footer"><?php echo $cfg_copyright; ?></div>

</body>
</html>
