<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
@session_start();

      if ($_GET['up'] == "up") {
		  if ($_SESSION['file']==$_GET['irand']) {
			  $_size=200*1024;                    //设置限制文件大小
			  $_dir='../phone/';                   //文件保存目录
			  function size($_size) {
				  //判断文件大小是否大于1024bit 如果大于，则将大小取值为KB
				  if ($_size>1024*1024) {
					  return round($_size/1024/1024,2).' MB';
				  }else if ($_size>1024) {
					  $_size=$_size/1024;
					  return ceil($_size).'KB';
				  }else {
					  return $_size.' bit';
				  }
			  }
			  //设置上传图片的类型,设置图片上传大小
			    if ($_FILES['image_file']['size']>$_size) {
				  exit('上传文件不能超过：'.size($_size));
			  }
			
			  $_upfiles = array('image/jpeg','image/jpg','image/pjpeg','image/png','image/x-png','image/gif');
			  if (is_array($_upfiles)) {
				  if (!in_array($_FILES['image_file']['type'],$_upfiles)) {
					  exit('请上传格式为：jpg,png,gif的文件<br /><a href="upload.php">返回</a>');
				  }
			  }
			
			  if ($_FILES['image_file']['error']>0) {
				  switch ($_FILES['userfile']['error']) {
					 case 1: echo '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
						 break;
					 case 2: echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值'; 
						 break;
					 case 3: echo '文件只有部分被上传';
						 break;
					 case 4: echo '没有文件被上传';
						 break;
					 case 6: echo '找不到临时文件夹';
						 break;
					 case 7: echo '文件写入失败';
						 break;
				  }
				  exit;
			  }
			  //获取文件扩展名
			  if (!is_dir($_dir)) {
				 mkdir($_dir,0700); 
			  }
			  $_rand=mt_rand(0,100000);
			  $_n=explode('.',$_FILES['image_file']['name']);  //将文件名分割
			  $_file_len=count($_n);         //返回数组长度
			  $_name=$_dir.time().'_'.$_rand.'.'.$_n[$_file_len-1];
			  
			  if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
				 if (!@move_uploaded_file($_FILES['image_file']['tmp_name'],$_name)) {
					 exit('文件移动失败');
				 }else {
					// echo '文件上传成功<br />';
//					 echo '文件路径：'.$_name.'<br />';
//					 echo '文件大小：'.size(filesize($_name));
//					 echo '<br /><a href="upload.php">返回继续上传</a>';
					$sql = "UPDATE `#@__member` SET thumb='".$_name."' WHERE id=".$_POST['id'];
	
				  if($dosql->ExecNoneQuery($sql))
		{
			ShowMsg('头像更新成功！','http://www.ygayi.com/web/member.php?c=edit');
			exit();
		}

				 } 
			  }else {
				 exit('上传的临时文件不存在，无法将文件移动到指定文件夹'); 
			  }
			  //销毁session变量,有几种方法
			  //第一种，销毁所有session变量：session_destroy();
			  //第二种：销毁单个如：$_SESSION['file']=''
			  session_destroy();
			  exit;
		  }else {
			 exit('您已经提交过了，不能重复提交<br /><a href="upload.php">返回</a>'); 
		  }
      }

	
	

//echo '<img src="'.$sImage.'" />';
?>