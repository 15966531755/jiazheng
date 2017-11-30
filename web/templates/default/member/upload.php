<?php
	//include("../function/conn.php"); 
	//include("../function/function.php"); 
if($_FILES['filename'])
{
          if(is_uploaded_file($_FILES['filename']['tmp_name']))
           {


            $ext = end(explode(".",$_FILES['filename']['name']));


            if($ext !='jpeg' &&  $ext!='jpg' &&  $ext!='png' &&  $ext!='bmp')
			{


                return false;


            }
			else
			{
				$name=date('YmdHis')."_".rand(100,999).'.'.$ext;
				//$fileOld="../upload/userpic/".$name;
				$file = 'upload/userpic/'.$name;
                $bRs = move_uploaded_file($_FILES['filename']['tmp_name'],'../upload/userpic/'.$name);
				if($bRs==1)
				{
					$sql="update user set headPic = '".$name."' where id=".$_SESSION['userid'];
					mysql_query($sql);
				}
                           
            }


           }
}
$pic ="http://some.test.com/".$file;
echo $pic;
?>