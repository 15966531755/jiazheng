<?php require_once('condb.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039)http://www.58.com/ershouche/changecity/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>地区分类</title>
<style>
body {text-align:center;font-size:14px;font-family:Arial, "宋体", sans-serif;line-height:200%;background:#F9F9F9;}
body, ul, h1, h2, form, p, dl, dt, dd, p {margin:0;padding:0;list-style:none}
img {border:none}
a{color:#00c;margin: 0 3px;text-decoration:none}
a:hover {color:#E40000;}
.c6 {color:#585858}
#header{width:100%;border-bottom:2px solid #ff7200;background:#fff;}
#headerinside {position:relative;width:990px;margin:0 auto; padding:12px 0 12px 0;z-index:1000}
.gray {color:#565656;}
.lr {color: #f00;text-decoration: underline}
.ml {margin-left:50px}
.c {clear: both}
.co16 {clear:#0000cc;font-size:16px}
.index_bo{width:990px;margin:0 auto;text-align:left;overflow:hidden}
.topcity {width:100%;margin-top:1px;}
.topcity .index_bo{padding:28px 0 20px;width:970px;padding-right:0;line-height:28px;text-align:center;}
.topcity a{margin-right:8px;color:#000;}
.topcity a:hover {color:#E40000;}
#citysear select,#citysear input{vertical-align:middle}
#clist {width:990px;margin:0 auto;padding:0 0 20px;clear:both;overflow:hidden;zoom:1}
#clist dt{color:#545454;width: 50px;font-family: Arial, Helvetica, sans-serif; font-size: 12px;clear: both;font-weight: bold;margin: 0;padding:3px 0 3px 4px;}
#clist dd {float: left;width: 35px;margin-left:100px;padding: 3px 0;}
#clist dd a {font-size:12px;margin-right:12px;white-space:nowrap}
.footer {width:990px;margin:0 auto;border-top: 1px solid #ccc;padding: 15px 0px;font-size: 12px;line-height: 180%;overflow:hidden;}
.footer a {font-size: 12px;color: #666;text-decoration: underline}
#t,#cs{float:left}
#t{padding-left:20px}
#cs{border-left:solid 1px #e6e6e6;padding:0 0 0 15px;margin:10px 0 0 10px;height:42px;text-align:left;line-height:2;overflow:hidden}
#cs h1{color:#4d4d4d;line-height:1.1; font:20px/1 '微软雅黑',aril }
#cs p{color:#565656;}
.set a{background:url(http://pic2.58.com/ui6/www/bgenter2.gif) no-repeat 0 0;margin:0;font-size:18px; line-height:40px;text-align:center;color:#fff;display:inline-block; margin:0 auto 10px; font-weight:normal; padding-left:20px;cursor:pointer;}
.set a b{background:url(http://pic2.58.com/ui6/www/bgenter2.gif) no-repeat right -41px; padding:0 25px 0 5px; display: inline-block;}
.set a:hover{background-position:0 -42px; color:#fff;background:url(http://pic2.58.com/ui6/www/bgenter2.gif) no-repeat 0 -82px;}
.set a:hover b{background:url(http://pic2.58.com/ui6/www/bgenter2.gif) no-repeat right -123px;}
#citysear{clear:both;font-size:12px;padding:15px 0 0 0;white-space:nowrap;height:22px;display:none;}
#changcityForm{display:inline}
#_cityinput{width:167px}
.tooltip{border:1px solid #ccc;background:#fff;margin:-2px 0 0 1px;margin:-3px 0 0 0\0;_margin:-3px 0 0 -1px}
.tooltip li{padding:0 5px;overflow:hidden;zoom:1}
.tooltip li a{color:#666;text-decoration:none}
.tooltip li a b{color:#002cad}.tooltip li .tool_r{float:right;color:#090;font-size:11px}
.tooltip li.selected a b,.tooltip li.selected a,.tooltip li.selected .tool_r{color:#fff}
.tooltip li.selected,.tag_options li.open_hover{background:#FD7A0E;color:#FFF}
#tooltipdiv2{width:170px;font-size:12px;text-align:left}
<!--.dot{background:url(http://pic2.58.com/ui6/www/line_dot.gif) repeat-x left bottom;}-->
#around{display:none;}
</style>

   <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js" type="text/ecmascript"></script>
    <script type="text/javascript">
        function getIpPlace() {

       // alert(remote_ip_info["province"] + "省" + ',' + remote_ip_info["city"] + "市")
      document.getElementById("ipcity").innerHTML="进入&nbsp;"+ remote_ip_info["city"] + "市&nbsp;二手车"
	  $pname = remote_ip_info["city"];
	
	   document.getElementById("ipid").value=remote_ip_info["city"];
	//  window.location.href="index.php?diqu="+$pname;
        } 
   function get_city(){
	   
	   document.myforms.submit();
	   }
        
        </script>

</head>
<body onload="getIpPlace()">
      					<?php
function GetIP() {
    if ($_SERVER["HTTP_X_FORWARDED_FOR"])
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else if ($_SERVER["HTTP_CLIENT_IP"])
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    else if ($_SERVER["REMOTE_ADDR"])
        $ip = $_SERVER["REMOTE_ADDR"];
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "Unknown";
    return $ip;
}
?>
<?php
$ip=GetIP();
//$ip="222.23.43.23";

$url='http://www.ip138.com/ips138.asp?ip='.$ip.'&action=2';
//echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//设置URL，可以放入curl_init参数中
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");
//设置UA
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。 如果不加，即使没有echo,也会自动输出
$content = curl_exec($ch);
//执行
curl_close($ch);
//关闭
//echo $content;
//<li>本站主数据：湖南省常德市 电信</li>

preg_match('/本站主数据：(?<mess>(.*))市(.*)<\/li><li>/',$content,$arr);
//查询注意事项
if(strripos($arr['mess'],"省")>0)
$city=substr($arr['mess'],strripos($arr['mess'],"省")+2,100);
else
$city=$arr['mess'];

?>
     
<div class="topcity">
  <div class="index_bo dot">
    <span id="set" class="set">
   
      <span class="bgSet"><a href="index.php?diqu=<?=$city;?>"><b >进入&nbsp;

      <?=$city;?>
      
      &nbsp;二手车</b></a></span>
    
    </span></br>
     <span class="bgSet"><a href="index.php?diqu=%C8%AB%B9%FA"><b >全国二手车</b></a></span>
   
    </div>
</div>
<div class="index_bo">
  <table >
    <tr ><td><strong>热门</strong></td>
    <td width="55" >
     <?php 
				
						  $sql="select * from  pro_class where tj = 1 order by id asc";
												  $recordset=Mysql_query($sql);
						  while($rs=Mysql_fetch_array($recordset)){
						  ?>
    <a href="index.php?diqu=<?php echo $rs[pname];?>"><?php echo $rs[pname];?></a>
    <?php }?>
   </td></tr></table>
    <table>
       <?php 
				
						  $sql="select * from  pro_class where treeid = 0 and id != 1 and id != 2 and id != 3 order by id asc";
												  $recordset=Mysql_query($sql);
						  while($rs=Mysql_fetch_array($recordset)){
						  ?>
    <tr><td><strong><?php echo $rs[shengfen];?></strong></td>
   
    
      <?php 
 $sqls="select * from pro_class where treeid =".$rs[id]." order by id asc";
 
 $recordsets=Mysql_query($sqls);
while($rss=Mysql_fetch_array($recordsets))
{?>

    <td >
    <a href="index.php?diqu=<?php echo $rss[pname];?>" ><?php echo $rss[pname];?></a>
   </td>
   
   <?php }?>
    
   <?php }?>
   </tr>
</table>
</div>


</body></html>