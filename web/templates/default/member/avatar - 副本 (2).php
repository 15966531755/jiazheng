<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_webname; ?> - 会员中心 - 编辑头像</title>
<link href="<?php echo $cfg_webpath; ?>/templates/default/style/member.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $cfg_webpath; ?>/templates/default/js/member.js"></script>

	<link rel="stylesheet" href="scripts/css/jquery.jcrop.css" type="text/css"/>
	<script src="scripts/jquery.js" type="text/javascript"></script>
	<script src="scripts/jquery.ajaxfileupload.js" type="text/javascript"></script>
	<script src="scripts/jquery.jcrop.js" type="text/javascript"></script>
	<script src="scripts/avatarCutter.js" type="text/javascript"></script>
	<script type="text/javascript">
        $(function () {
			
			function getFileSize(fileName) {
				var byteSize = 0;
				//console.log($("#" + fileName).val());
				if($("#" + fileName)[0].files) {
					var byteSize  = $("#" + fileName)[0].files[0].size;
				}else {
					//var file = document.getElementById(fileName);
					//var img = new Image();
					//file.select();
					//alert(document.selection.createRange().text);
					//img.src = file.value;
					//img.style.display="none";
					
					//alert(img.readyState);return 0;
					//if(img.readyState=="complete"){//已经load完毕，直接打印文件大小
					//	alert(img.fileSize);//ie获取文件大小
					//}else {
					//	img.onreadystatechange=function(){
					//		if(img.readyState=='complete')//当图片load完毕
					//			alert(img.fileSize);//ie获取文件大小
					//	}
					//}
					//byteSize = img.fileSize;
					//byteSize = img.fileSize;
				}
				//alert(byteSize);
				byteSize = Math.ceil(byteSize / 1024) //KB
				return byteSize;//KB
			}
            $("#btnUpload").click(function () {
				var allowImgageType = ['jpg', 'jpeg', 'png', 'gif'];
				var file = $("#file1").val();
				//获取大小
				var byteSize = getFileSize('file1');
				//获取后缀
                if (file.length > 0) {
					if(byteSize > 2048) {
						alert("上传的附件文件不能超过2M");
						return;
					}
					var pos = file.lastIndexOf(".");
					//截取点之后的字符串
					var ext = file.substring(pos + 1).toLowerCase();
					//console.log(ext);
					if($.inArray(ext, allowImgageType) != -1) {
						ajaxFileUpload();
					}else {
						alert("请选择jpg,jpeg,png,gif类型的图片");
					}
                }
                else {
                    alert("请选择jpg,jpeg,png,gif类型的图片");
                }
            });
			function ajaxFileUpload() {
				$.ajaxFileUpload({
                    url: 'action.php', //用于文件上传的服务器端请求地址
                    secureuri: false, //一般设置为false
                    fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file" name="file" />
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data, status)  //服务器成功响应处理函数
                    {
						//var json = eval('(' + data + ')');
                        //alert(data);
                        $("#picture_original>img").attr({src: data.src, width: data.width, height: data.height});
						$('#imgsrc').val(data.path);
						//alert(data.msg);

						//同时启动裁剪操作，触发裁剪框显示，让用户选择图片区域
						var cutter = new jQuery.UtrialAvatarCutter({
								//主图片所在容器ID
								content : "picture_original",
								//缩略图配置,ID:所在容器ID;width,height:缩略图大小
								purviews : [{id:"picture_200",width:200,height:200},{id:"picture_50",width:50,height:50},{id:"picture_30",width:30,height:30}],
								//选择器默认大小
								selector : {width:200,height:200},
								showCoords : function(c) { //当裁剪框变动时，将左上角相对图片的X坐标与Y坐标 宽度以及高度
									$("#x1").val(c.x);
									$("#y1").val(c.y);
									$("#cw").val(c.w);
									$("#ch").val(c.h);
								},
								cropattrs : {boxWidth: 500, boxHeight: 500}
							}
						);
                        cutter.reload(data.src);
						//var purviews = [{id:"picture_200",width:200,height:200},{id:"picture_50",width:50,height:50},{id:"picture_30",width:30,height:30}];
						//$("#img1").Jcrop({
                        //    bgColor: 'black',
                        //    bgOpacity: .4,
                        //    setSelect: [100, 100, 150,150],  //设定4个角的初始位置
                        //    aspectRatio: 1 / 1,
                         //   onChange: showCoords,   //当裁剪框变动时执行的函数
                         //   onSelect: showCoords,   //当选择完成时执行的函数
						//	boxWidth: 500, 
						//	boxHeight: 500

                        //});
						$('#div_avatar').show();
                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
				})
				return false;
			}
			
			$('#btnCrop').click(function() {
				$.getJSON('action2.php', {x: $('#x1').val(), y: $('#y1').val(), w: $('#cw').val(), h: $('#ch').val(), src: $('#imgsrc').val()}, function(data) {
					alert(data.msg);
				});
				return false;
			});
        });

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
		<h3 class="subtitle">我的头像</h3>
		<div style="display:none;overflow:hidden" id="div_avatar">
		<div style="width:500px;height:500px;overflow:hidden;float:left;" id="picture_original"><img alt="" src="" /></div>
		<div id="picture_200" style="float:left;margin-left:20px"></div>
		<div id="picture_50" style="float:left;margin-left:20px"></div>
		<div id="picture_30" style="float:left;margin-left:20px"></div>
		<input type="hidden" id="x1" name="x1" value="0" />
        <input type="hidden" id="y1" name="y1" value="0" />
        <input type="hidden" id="cw" name="cw" value="0" />
        <input type="hidden" id="ch" name="ch" value="0" />
		<input type="hidden" id="imgsrc" name="imgsrc" />
		<input type="button" value="裁剪上传" id="btnCrop"/>
	</div>
		<h3 class="subtitle">上传头像</h3>
		<div class="upavatar">
<p><input type="file" id="file1" name="file1" /></p>
    <input type="button" value="上传" id="btnUpload"/>
    		</div>
	</div>
	<div class="cl"></div>
</div>
<div class="footer"><?php echo $cfg_copyright; ?></div>
<script type="text/javascript">
function updateavatar() {
window.location.reload();
}
</script>
</body>
</html>
