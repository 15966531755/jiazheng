<?php
require_once(dirname(__FILE__).'/include/config.inc.php');
//Download by http://www.codefans.net
function uploadImageFile() { // Note: GD library is required for this function

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$iWidth = $iHeight = 200; // desired image result dimensions
$iJpgQuality = 90;

if ($_FILES) {

// if no errors and size less than 250kb
if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

// new unique filename
$sTempFileName = '../data/avatar/000/00/00/' . md5(time().rand());

// move uploaded file into cache folder
move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);

// change file permission to 644
@chmod($sTempFileName, 0644);

if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
$aSize = getimagesize($sTempFileName); // try to obtain image info
if (!$aSize) {
@unlink($sTempFileName);
return;
}

// check for image type
switch($aSize[2]) {
case IMAGETYPE_JPEG:
$sExt = '.jpg';

// create a new image from file
$vImg = @imagecreatefromjpeg($sTempFileName);
break;
case IMAGETYPE_PNG:
$sExt = '.png';

// create a new image from file
$vImg = @imagecreatefrompng($sTempFileName);
break;
default:
@unlink($sTempFileName);
return;
}

// create a new true color image
$vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

// copy and resize part of an image with resampling
imagecopyresampled($vDstImg, $vImg, 0, 0, 200, 200, $iWidth, $iHeight, 200, 200);

// define a result image filename
$sResultFileName = $sTempFileName . $sExt;

// output image to file
imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
@unlink($sTempFileName);

return $sResultFileName;
}
}
}
}
}
}

$sImage = uploadImageFile();


$sql = "UPDATE `#@__member` SET thumb='".$sImage."' WHERE id=".$_POST['id'];

	if($dosql->ExecNoneQuery($sql))
	{
		ShowMsg('头像更新成功！','http://www.ygayi.com/web/member.php?c=edit');
		exit();
	}
	
	

//echo '<img src="'.$sImage.'" />';
?>